<h3>Rzutowanie na tablice</h3>
Dany jest poniższy kod PHP:
<pre><code class="language-php">&lt;?php
class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
      $this->color = $color;
      $this->model = $model;
    }
    public function message() {
      return "My car is a " . $this->color . " " . $this->model . "!";
    }
}
    $a = 5;       // Integer
    $b = 5.34;    // Float
    $c = "hello"; // String
    $d = true;    // Boolean
    $e = NULL;    // NULL
    $f = new Car("red", "Volvo");
?&gt;</code></pre>
<p>Zrzutuj dane do typu Array i wyświetl wartości zmiennych <code>$a</code>, <code>$b</code>, <code>$c</code>, <code>$d</code>, <code>$e</code> i <code>$f</code> po konwersji do tablicy.</p>
<p>Użyj funkcji <code>var_dump()</code>, aby wyświetlić zarówno typ, jak i wartość każdej zmiennej po konwersji. Następnie przeanalizuj wyniki.</p>