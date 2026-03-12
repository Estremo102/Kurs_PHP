window.onload = function() {
    const checks = [
        // Zadanie 1
        () => {
            try {
                let solution = document.querySelector('#zadanie1 .solution-container').innerText;
                return solution.trim() === "Hello world!";
            } catch { return false; }
        },
        // Zadanie 2
        () => {
            try {
                let solution = document.querySelector('#zadanie2 .solution-container').innerText;
                return solution.trim() === "21 = 3 • 7";
            } catch { return false; }
        },
        // Zadanie 3
        () => {
            try {
                let solution = document.querySelector('#zadanie3 .solution-container').innerText;
                return solution.includes("20 2");
            } catch { return false; }
        },
        // Zadanie 4
        () => {
            try {
                let solution = document.querySelector('#zadanie4 .solution-container').innerText;
                return solution.includes('array(5) { [0]=> int(5) [1]=> string(4) "John" [2]=> float(3.14) [3]=> bool(true) [4]=> NULL }');
            } catch { return false; }
        },
        // Zadanie 5
        () => {
            try {
                let solution = document.querySelector('#zadanie5 .solution-container').innerText;
                return solution.includes("Zmienna x wewnątrz funkcji wynosi: 5") && solution.includes("Zmienna x na zewnątrz funkcji wynosi: 3");
            } catch { return false; }
        },
        // Zadanie 6
        () => {
            try {
                let solution = document.querySelector('#zadanie6 .solution-container').innerHTML;
                return solution.trim() === "1<br>3<br>6<br>";
            } catch { return false; }
        }
    ];
    let correct = 0;
    const navLinks = document.querySelectorAll('nav ul li');
    checks.forEach((check, i) => {
        if (check()) {
            navLinks[i].classList.add('done');
            correct++;
        }
    });
    document.querySelector('aside div').innerHTML += `<br><br>Liczba poprawnie wykonanych zadań: ${correct} / 6`;
}