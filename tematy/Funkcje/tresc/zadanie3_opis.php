<h3>Zwracanie wartości</h3>
<p>Słowo kluczowe return nie tylko pozwala na zwrócenie wartości przez funkcje, ale także natychmiast przerywa jej działanie.</p>
<pre><code class="language-php">&lt;?php 
function miejscaZerowe($a, $b, $c) {
    if ($a == 0) {
        return "To nie jest funkcja kwadratowa";
        echo "Ta linijka się nigdy nie wykona";
    }

    $delta = $b*$b - 4*$a*$c;

    if ($delta < 0) {
        return "Brak miejsc zerowych";
        echo "To też się nie wykona";
    }

    if ($delta == 0) {
        $x = -$b / (2*$a);
        return "Jedno miejsce zerowe: {$x}";
    }

    $x1 = (-$b - sqrt($delta)) / (2*$a);
    $x2 = (-$b + sqrt($delta)) / (2*$a);

    return "Dwa miejsca zerowe: {$x1} i {$x2}";
}

echo miejscaZerowe(0, 2, 3);
$wynik = miejscaZerowe(2, 2, -4);
echo '&lt;br>' . $wynik;
?&gt;</code></pre>
<p>rezultat:</p>
<pre><code><?php 
function miejscaZerowe($a, $b, $c) {
    if ($a == 0) {
        return "To nie jest funkcja kwadratowa";
        echo "Ta linijka się nigdy nie wykona";
    }

    $delta = $b*$b - 4*$a*$c;

    if ($delta < 0) {
        return "Brak miejsc zerowych";
    }

    if ($delta == 0) {
        $x = -$b / (2*$a);
        return "Jedno miejsce zerowe: {$x}";
    }

    $x1 = (-$b - sqrt($delta)) / (2*$a);
    $x2 = (-$b + sqrt($delta)) / (2*$a);

    return "Dwa miejsca zerowe: {$x1} i {$x2}";
}

echo miejscaZerowe(0, 2, 3);
$wynik = miejscaZerowe(2, 2, -4);
echo '<br>' . $wynik;
?></code></pre>
<p>Zwróć uwagę, że wartość którą zwraca funkcja można przypisać do zmiennej jak i od razu wykorzystać w innym fragmencie kodu.</p>
<p>
    Twoim zadaniem jest napisanie funkcji która przyjmie trzy argumenty i zwróci obwód trójkąta. Jednak jeśli któryś z parametrów będzie niepoprawny wyświetlisz komunikat "Błędne dane wejściowe" i zwrócisz wartość -1, a jeśli trójkąt jest niemożliwy do zbudowania wyświetlisz komunikat "Z podanych boków nie da się zbudować trójkąta". <br>
    podpowiedź: Trójkąta nie da się zbudować jeśli suma dwóch boków jest mniejsza lub równa trzeciemu.
</p>