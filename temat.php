<?php
    $title = $_GET['title'] ?? null;
    $src = $_GET['src'] ?? null;
?>
        <?php
            for ($i = 1; $i <= 6; $i++) {
                echo "<section id=\"zadanie$i\">
                <h2>Zadanie $i</h2>";
                include __DIR__ . "/tematy/$src/tresc/zadanie${i}_opis.php";
                echo "<button class=\"check-task-btn\" data-task=\"$i\">Sprawdź zadanie</button>";
                echo "<div class=\"solution-container\" id=\"wynik-zad$i\"></div>";
                echo "<br><button class=\"show-code-btn\" data-task=\"$i\">Wyświetl kod</button><span id='code$i'></span>";
                echo '</section>';
            }
        ?>
<script defer>
    const srcPath = new URLSearchParams(window.location.search).get('src');

    function updateProgressBar() {
        const doneCount = document.querySelectorAll('nav ul li.done').length;
        const progressBar = document.querySelector('nav progress');
        if (progressBar) {
            progressBar.value = doneCount;
        }
    }

    function updateLocalStorage() {
        let buttons = document.querySelectorAll('nav ul li');
        for (let i = 0; i < buttons.length; i++) {
            if (buttons[i].classList.contains('done')) {
                if (localStorage.getItem(i + 'exercise') !== 'true') {
                    buttons[i].classList.add('changed');
                }
                localStorage.setItem(i + 'exercise', 'true');
            } else {
                localStorage.setItem(i + 'exercise', 'false');
            }
        }
    }

    async function runSingleTest(taskNumber) {
        if (!srcPath) {
            console.error('Brak parametru src w URL');
            return;
        }

        try {
            const response = await fetch(`test_runner.php?src=${srcPath}&i=${taskNumber}`);
            if (!response.ok) {
                throw new Error(`HTTP error ${response.status}`);
            }
            const text = await response.text();
            let data;
            try {
                data = JSON.parse(text);
            } catch (parseError) {
                throw new Error('invalid JSON from server: ' + text);
            }

            const container = document.getElementById(`wynik-zad${taskNumber}`);
            if (!container) return;

            if (data.komunikaty && data.komunikaty.length > 0) {
                container.innerHTML = data.komunikaty.join('<br>');
            } else {
                container.innerHTML = data.poprawne ? 'Zadanie wykonane poprawnie' : 'Zadanie zawiera błędy';
            }

            if (data.output && data.output.trim() !== "") {
                container.innerHTML += "<br><strong>Output:</strong><br>" + data.output;
            }

            const navButtons = document.querySelectorAll('nav ul li');
            if (navButtons[taskNumber - 1]) {
                if (data.poprawne) {
                    navButtons[taskNumber - 1].classList.add('done');
                } else {
                    navButtons[taskNumber - 1].classList.remove('done');
                }
            }

            updateProgressBar();
            updateLocalStorage();
        } catch (error) {
            console.error(`Błąd przy ładowaniu zadania ${taskNumber}:`, error);
            const container = document.getElementById(`wynik-zad${taskNumber}`);
            if (container) {
                container.innerHTML = 'Błąd przy ładowaniu wyniku<br>';
                let result = await runCode(srcPath, taskNumber);
                container.innerHTML += result;
            }
        }
    }

    async function showCode(taskNumber) { 
        const response = await fetch(`showcode.php?src=${encodeURIComponent(srcPath)}&i=${taskNumber}`);
        const text = await response.text();
        document.querySelector('#code' + taskNumber).innerHTML = text;
    }


    async function runCode(src, i) {
        const response = await fetch(`runcode.php?src=${encodeURIComponent(src)}&i=${i}`);
        const text = await response.text();
        return text;
    }

    async function loadTestResults() {
        if (!srcPath) {
            console.error('Brak parametru src w URL');
            return;
        }

        for (let i = 1; i <= 6; i++) {
            await runSingleTest(i);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.check-task-btn').forEach(button => {
            button.addEventListener('click', function () {
                const taskNumber = parseInt(this.getAttribute('data-task'));
                runSingleTest(taskNumber);
            });
        });
        document.querySelectorAll('.show-code-btn').forEach(button => {
            button.addEventListener('click', function () { 
                const taskNumber = parseInt(this.getAttribute('data-task'));
                showCode(taskNumber);
            });
        });
        const runAllButton = document.getElementById('run-all-tests');
        if (runAllButton) {
            runAllButton.addEventListener('click', loadTestResults);
        }
    });
</script>