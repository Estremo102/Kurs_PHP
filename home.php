<?php
    $tematy = include __DIR__ . '/config/tematy.php';
    $srcList = [];
    foreach ($tematy as $links) {
        foreach ($links as $t) {
            $srcList[] = $t['src'];
        }
    }
    $zadaniaNaTemat = 6;
?>
    <main>
        <section>
            <p>Witaj w kursie programowania w języku PHP.</p>
            <p class="course-progress">
                Twój postęp w kursie:
                <progress id="course-progress" value="0" max="<?= count($srcList) * $zadaniaNaTemat ?>"></progress>
                <span id="course-progress-text"></span>
            </p>
        </section>
    </main>
<script>
    (function () {
        const tematy = <?= json_encode($srcList) ?>;
        const zadaniaNaTemat = <?= $zadaniaNaTemat ?>;
        const total = tematy.length * zadaniaNaTemat;
        let done = 0;
        tematy.forEach(src => {
            for (let i = 1; i <= zadaniaNaTemat; i++) {
                if (localStorage.getItem(`${src}_zadanie${i}`) === 'true') {
                    done++;
                }
            }
        });
        animateProgress(document.getElementById('course-progress'), done);
        const percent = total ? Math.round(done / total * 100) : 0;
        document.getElementById('course-progress-text').textContent = `${done} / ${total} zadań (${percent}%)`;
    })();
</script>
