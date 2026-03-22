<?php declare(strict_types=1);?>
<h3>Funkcje a typy danych</h3>
<p>W powyższych przykładach zauważ, że nie musieliśmy podawać PHP typu danych zmiennej. PHP automatycznie przypisuje typ danych do zmiennej, w zależności od jej wartości. Ponieważ typy danych nie są ustawione, można na przykład dodawać ciąg znaków do liczby całkowitej bez powodowania błędu.</p>
<p>
    Od PHP 7 dodane zostały deklaracje typów. Daje nam to możliwość określenia oczekiwanego typu danych podczas deklarowania funkcji, a dodanie ścisłej deklaracji spowoduje wygenerowanie błędu krytycznego w przypadku niezgodności typu danych. Aby określić tryb ścisły, musimy ustawić deklarację (strict_types=1);. Musi ona znajdować się w pierwszym wierszu pliku PHP. <br>
    W poniższym przykładzie wysyłamy do funkcji zarówno liczbę, jak i ciąg znaków, ale tutaj dodaliśmy ścisłą deklarację:
</p>
<pre><code class="language-php">&lt;?php declare(strict_types=1); // włączenie silnego typowania

function addNumbers(int $a, int $b) {
  return $a + $b;
}
try {
    echo addNumbers(5, "5 days");
} catch(Error $e) {
    echo $e->getMessage();
}
?></code></pre>
<pre><code><?php 
function addNumbers(int $a, int $b) {
  return $a + $b;
}
try {
    echo addNumbers(5, "5 days");
} catch(Error $e) {
    echo $e->getMessage();
}
?></code></pre>
<p>PHP obsługuje również deklaracje typu dla instrukcji return. Aby zadeklarować typ danych dla funkcji return, należy dodać dwukropek ( : ) i typ danych bezpośrednio przed otwierającym nawiasem klamrowym ( { ) podczas deklarowania funkcji. W poniższym przykładzie określamy typ zwracany (float) dla funkcji:</p>
<pre><code class="language-php">&lt;?php declare(strict_types=1); // silne typowanie

function addNumbersFloat(float $a, float $b) : float {
  return $a + $b;
}

function addNumbersInt(float $a, float $b) : int {
  return (int)($a + $b);
}

echo var_dump(addNumbersFloat(1.8, 5.2));
echo addNumbersInt(1.2, 5.2);
?></code></pre>
<p>Rezultat:</p>
<pre><code><?php 
function addNumbersFloat(float $a, float $b) : float {
  return $a + $b;
}

function addNumbersInt(float $a, float $b) : int {
  return (int)($a + $b);
}

echo var_dump(addNumbersFloat(1.8, 5.2));
echo addNumbersInt(1.2, 5.2);
?></code></pre>
<p>Trzeba pamiętać, należy upewnić się, że zwracany typ jest prawidłowego typu.</p>
