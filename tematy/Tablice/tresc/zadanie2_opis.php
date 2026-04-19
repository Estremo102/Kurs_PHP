<h3>Tablice indeksowane</h3>
<p>W tablicach indeksowanych pierwszy element ma numer 0, a każdy kolejny o jeden większy od poprzedniego. Numerujemy więc ekementy od zera tak jak w większości języków programowania. Aby odwołać się do konkretnego elementu, należy podać numer jego indeksu w kwadratowych nawiasach.</p>
<pre><code class="language-php">$cars = array("Volvo", "BMW", "Toyota");
echo $cars[0];</code></pre>
<code><pre><?php
$cars = array("Volvo", "BMW", "Toyota");
echo $cars[0];
?></pre></code>
<p>Aby zmienić wartość w tablicy, należy podać jej numer, a następnie użyć operator przypisania</p>
<pre><code class="language-php">$cars = array("Volvo", "BMW", "Toyota");
$cars[1] = "Ford";
var_dump($cars);</code></pre>
<pre><code><?php
$cars = array("Volvo", "BMW", "Toyota");
$cars[1] = "Ford";
var_dump($cars);
?></code></pre>
<p>Możemy wyświetlić wszystkie elementy tablicy za pomocą pętli. Przykładowo pętla foreach wyglądałaby tak:</p>
<pre><code class="language-php">$cars = array("Volvo", "BMW", "Toyota");
foreach ($cars as $x) {
  echo "$x &lt;br&gt;";
}</code></pre>
<pre><code><?php
$cars = array("Volvo", "BMW", "Toyota");
foreach ($cars as $x) {
  echo "$x <br>";
}
?></code></pre>
<p>Zadanie: masz dostęp do zmiennej $tablica, wypisz jej wszystkie elementy używając do tego pętli for i funkcji poznanej w poprzednim zadaniu.</p>