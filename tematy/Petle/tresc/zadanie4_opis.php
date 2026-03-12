<h3>Pętla foreach</h3>
<p>
    Pętla foreach przechodzi przez blok kodu dla każdego elementu tablicy lub każdej właściwości obiektu. <br>
    Poniższy przykład przechodzi przez wszystkie elementy tablicy indeksowanej:
</p>
<pre><code class="language-php">$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
  echo "$value <br>";
}</code></pre>
<pre><code><?php 
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
  echo "$value <br>";
}?></code></pre>
<h4>Pętla PHP foreach w tablicach asocjacyjnych</h4>
<p>
    Powyższa tablica jest tablicą indeksowaną, gdzie pierwszy element ma klucz 0, drugi klucz 1 itd. Tablice asocjacyjne różnią się od siebie - używają one nazwanych kluczy, a podczas przeglądania ich zawartości warto zachować zarówno nazwę klucza, jak i jego wartość. Można to zrobić, określając zarówno klucz, jak i wartość w pętli foreach, w następujący sposób:
</p>
<pre><code class="language-php">$members = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach ($members as $key => $value) {
  echo "$key : $value <br>";
}</code></pre>
<pre><code><?php 
$members = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach ($members as $key => $value) {
  echo "$key : $value <br>";
}?></code></pre>
<h4>foreach i obiekty</h4>
<p>Pętlę foreach można również wykorzystać do przeglądania właściwości obiektu:</p>
<pre><code class="language-php">class Car {
  public $color;
  public $model;
  public function __construct($color, $model) {
    $this->color = $color;
    $this->model = $model;
  }
}

$myCar = new Car("red", "Volvo");

foreach ($myCar as $x => $y) {
  echo "$x: $y <br>";
}</code></pre>
<pre><code><?php 
class Car {
  public $color;
  public $model;
  public function __construct($color, $model) {
    $this->color = $color;
    $this->model = $model;
  }
}

$myCar = new Car("red", "Volvo");

foreach ($myCar as $x => $y) {
  echo "$x: $y <br>";
}?></code></pre>
<p>Podczas pętli po elementach tablicy, wszelkie zmiany wprowadzone w elemencie tablicy domyślnie NIE będą miały wpływu na oryginalną tablicę:</p>
<pre><code class="language-php">$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
  if ($x == "blue") $x = "pink";
}

var_dump($colors);</code></pre>
<pre><code><?php 
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) {
  if ($x == "blue") $x = "pink";
}

var_dump($colors);?></code></pre>
<p>Jednak używając znaku & w deklaracji foreach, element tablicy jest przypisywany przez odniesienie, co powoduje, że wszelkie zmiany wprowadzone na elemencie tablicy zostaną wprowadzone również na oryginalnej tablicy:</p>
<pre><code class="language-php">$colors = array("red", "green", "blue", "yellow");

foreach ($colors as &$x) {
  if ($x == "blue") $x = "pink";
}

var_dump($colors);</code></pre>
<pre><code><?php 
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as &$x) {
  if ($x == "blue") $x = "pink";
}

var_dump($colors);?></code></pre>
<h4>Alternatywny zapis</h4>
<p>pętle foreach można też zapisać w taki sposób:</p>
<pre><code class="language-php">$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) :
  echo "$x <br>";
endforeach;</code></pre>
<pre><code><?php
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $x) :
  echo "$x <br>";
endforeach;?></code></pre>
<p>Zadanie: W kodzie masz dostęp do zmiennej $input. Wypisz wszystkie elementy jakie się w niej znajdują.</p>