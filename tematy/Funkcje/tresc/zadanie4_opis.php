<h3>Przekazywanie argumentów przez odniesienie</h3>
<p>Argumenty są zazwyczaj przekazywane przez wartość, co oznacza, że w funkcji używana jest kopia wartości, a zmienna przekazana do funkcji nie może zostać zmieniona.</p>
<p>Gdy argument funkcji jest przekazywany przez referencję, zmiany w argumencie zmieniają również przekazaną zmienną. Aby przekształcić argument funkcji w referencję, należy użyć operatora & przed argumentem/parametrem:</p>
<pre><code class="language-php">&lt;?php
function dodajDwa1($liczba) {
    $liczba += 2;
}

function dodajDwa2(&$liczba) {
    $liczba += 2;
}

$x = 2;
echo "$x&lt;br>";
dodajDwa1($x);
echo "$x&lt;br>";
dodajDwa2($x);
echo "$x&lt;br>";
?></code></pre>
<p>Rezultat:</p>
<pre><code><?php
function dodajDwa1($liczba) {
    $liczba += 2;
}

function dodajDwa2(&$liczba) {
    $liczba += 2;
}

$x = 2;
echo "$x<br>";
dodajDwa1($x);
echo "$x<br>";
dodajDwa2($x);
echo "$x<br>";
?></code></pre>
<p>Jak możesz zauważyć, brak znaku & sprawia, że liczba w funkcji to kopia, jednak jeśli użyjemy tego znaku działamy na oryginalnej zmiennej.</p>
<p>
    Twoim zadaniem jest napisanie funkcji oczyscTekst, która przyjmuje jeden parametr i modyfikuje go w następujący sposób: usuwa spacje z początku i końca tekstu, zamienia wiele spacji na jedną, zamienia cały tekst na małe litery. <br>
    Przykładowe rozwiązania: 
    <ol>
        <li>trim + preg_replace (wymaga regex, który dopiero będziemy poznawać w przyszłych lekcjach) + strtolower</li>
        <li>trim + explode + array_filter + implode + strtolower</li>
    </ol>
    co robią powyższe funkcje?
    <ul>
        <li>trim usuwa spacje z początku i końca.</li>
        <li>explode rozbija tekst na fragmenty.</li>
        <li>array_filter usuwa te puste elementy.</li>
        <li>skleja elementy tablicy w jednego stringa.</li>
        <li>normalizuje wielkość liter.</li>
        <li>preg_replace można powiedzieć, że to bardziej rozbudowana wersja str_replace.</li>
    </ul>
</p>