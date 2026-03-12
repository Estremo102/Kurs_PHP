<h3>Skrócony zapis</h3>
<p>Jeśli instrukcja warunkowa wykonuje tylko jedną akcje, można pominąć {} <br> przykład:</p>
<pre><code class="language-php">$a = 5;

if ($a < 10) $b = "Hello";

echo $b;</code></pre>
<p>Do skrócenia instrukcji if...else można użyć poznanego w pierwszym zadaniu operatora trójargumentowego <br> przykład: </p>
<pre><code class="language-php">$a = 13;

$b = $a < 10 ? "Hello" : "Good Bye";

echo $b;</code></pre>
<p>Zadanie: Skróć poniższy kod</p>
<pre><code class="language-php">$a = 10;
$b = 25;
$c = 15;

if ($a + $b == 35) {
    $c++;
}

if ($c <= 15) {
    $a = $b;
} else {
    $a = $c;
}

echo "$a, $b, $c";</code></pre>