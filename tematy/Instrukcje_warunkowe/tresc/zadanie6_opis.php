<h3>Zagnieżdżone instrukcje warunkowe</h3>
<p>if, if...else oraz if...elseif...else można w sobie zagnieżdżać. <br> przykład: </p>
<pre><code class="language-php">$a = 13;

if ($a > 10) {
  echo "powyżej 10";
  if ($a > 20) {
    echo " oraz powyżej 20";
  } else {
    echo " ale nie powyżej 20";
  }
}</code></pre>
<p>Podobnie można zagnieżdżać także operatory trójargumentowe</p>
<p>Zadanie: Napisz kod który do zmiennych $a oraz $b przypisze losowe wartości od 5 do 15 następnie jeśli są sobie równe wyświetl napis "Wygrano nagrodę główną", w przeciwnym wypadku przypisz do zmiennej $c losową wartość między 10 a 30, jeśli $a + $b > $c wyświetl napis "Wygrano nagrodę pocieszenia" w przeciwnym wypadku wyświetl napis "Niestety nie tym razem"</p>