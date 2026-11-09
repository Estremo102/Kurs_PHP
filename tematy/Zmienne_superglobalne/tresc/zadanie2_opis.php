<h3>$GLOBALS</h3>
<p><span class="important">$GLOBALS</span> - Tablica zawierająca odniesienia do wszystkich zmiennych globalnych w danym skrypcie.</p>
<p>Zmienne globalne są dostepne w całym skrypcie. Zmienne tworzone w zewnętrznym zakresie automatycznie są zmiennymi globalnymi. Jednak by uzyskać do nich dostęp wewnątrz funkcji należy użyć słowa kluczowego global lub odwołać się za pomocą $GLOBALS.</p>
<pre><code class="language-php">$x = 75;

function myfunction() {
  echo $GLOBALS['x'];
}

myfunction()</code></pre>
<code><pre><?php
$x = 75;

function myfunction() {
  echo $GLOBALS['x'];
}

myfunction()
?></pre></code>
<pre><code class="language-php">$x = 75;

function myfunction() {
  echo $x;
}

myfunction()</code></pre>
<code><pre><span class="error">Warning: Undefined variable $x ...</span></pre></code>
<p>Zmienne utworzone wewnątrz funkcji należą tylko do tej funkcji, ale można tworzyć zmienne globalne wewnątrz funkcji, korzystając ze składni $GLOBALS.</p>
<pre><code class="language-php">$x = 10;
$y = 20;

function result() {
  $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}

result();
echo $z;</code></pre>
<pre><code><?php 
$x = 10;
$y = 20;

function result() {
  $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}

result();
echo $z;
?></code></pre>
<p><span class="important">Zadanie: </span> W kodzie masz dostęp do zmiennych $a i $b. Napisz funkcję suma() bez parametrów, która za pomocą $GLOBALS utworzy zmienną globalną $wynik równą sumie $a i $b. Nie używaj słowa kluczowego global. Wywołaj funkcję, a następnie wyświetl $wynik.</p>