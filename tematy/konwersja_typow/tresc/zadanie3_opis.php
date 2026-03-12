<h3>Rzutowanie do Float</h3>
Dany jest poniższy kod PHP:
<pre><code class="language-php">&lt;?php
$a = 5;       // Integer
$b = 5.34;    // Float
$c = "25 km"; // String
$d = "km 25"; // String
$e = "hello"; // String
$f = true;    // Boolean
$g = NULL;    // NULL

$a = (float) $a;
$b = (float) $b;
$c = (float) $c;
$d = (float) $d;
$e = (float) $e;
$f = (float) $f;
$g = (float) $g;
?&gt;</code></pre>
<p>Wyświetl wartości zmiennych <code>$a</code>, <code>$b</code>, <code>$c</code>, <code>$d</code>, <code>$e</code>, <code>$f</code> i <code>$g</code> po konwersji do typu float.</p>
<p>Użyj funkcji <code>var_dump()</code>, aby wyświetlić zarówno typ, jak i wartość każdej zmiennej po konwersji. Następnie przeanalizuj wyniki.</p>