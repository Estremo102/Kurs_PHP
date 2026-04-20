<h3>Tablice asociacyjne</h3>
<p>Tablice asociacyjne to tablice, w których indeksy są ciągami znaków (łańcuchami), a nie liczbami.</p>
<pre><code class="language-php">$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
var_dump($car);</code></pre>
<pre><code><?php 
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
var_dump($car); 
?></code></pre>
<p>Aby uzyskać dostęp do wartości w tablicy asociacyjnej, należy użyć nazwy klucza w nawiasach kwadratowych:</p>
<pre><code class="language-php">echo $car["brand"] . '&lt;br>'; // Wyświetla: Ford
echo $car["model"] . '&lt;br>'; // Wyświetla: Mustang
echo $car["year"] . '&lt;br>'; // Wyświetla: 1964</code></pre>
<pre><code><?php 
echo $car["brand"] . '<br>'; // Wyświetla: Ford
echo $car["model"] . '<br>'; // Wyświetla: Mustang
echo $car["year"] . '<br>'; // Wyświetla: 1964
?></code></pre>
<p>zmiana wartości w tablicy asociacyjnej:</p>
<pre><code class="language-php">$car["year"] = 2020;
echo $car["year"] . '&lt;br>'; // Wyświetla: 2020</code></pre>
<pre><code><?php
$car["year"] = 2020;
echo $car["year"] . '<br>'; // Wyświetla: 2020
?></code></pre>
<p>Dodawanie nowych elementów do tablicy asociacyjnej:</p>
<pre><code class="language-php">$car["color"] = "red";
echo $car["color"] . '&lt;br>'; // Wyświetla: red</code></pre>
<pre><code><?php
$car["color"] = "red";
echo $car["color"] . '<br>'; // Wyświetla: red
?></code></pre>
<p>Pętla foreach może być również używana do iteracji przez tablice asociacyjne:</p>
<pre><code class="language-php">foreach($car as $key => $value) {
    echo $key . ": " . $value . '&lt;br>';
}</code></pre>
<pre><code><?php
foreach($car as $key => $value) {
    echo $key . ": " . $value . '<br>';
}
?></code></pre>
<p>Zadanie: Masz w kodzie dostęp do tablicy asocjacyjnej $tablica. Utwórz nową tablicę asociacyjną $r_tablica i przekopiuj do niej wszystkie elementy z $tablica, zamieniając miejscami klucze i wartości.</p>