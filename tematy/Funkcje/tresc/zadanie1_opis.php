<h3>Tworzenie funkcji</h3>
<p>PHP ma ponad 1000 wbudowanych funkcji, które można wywołać bezpośrednio z poziomu skryptu, aby wykonać określone zadanie. Część z nich poznaliśmy w lekcji Funkcje Matematyczne. Spis wbudowanych funkcji możesz znaleźć <a href="https://www.w3schools.com/php/php_ref_overview.asp">tutaj.</a></p>
<p>Oprócz wbudowanych funkcji możemy tworzyć także własne funkcje. Jest to blok kodu wykonywany podczas wywołania funkcji. Możemy ją także porównać do funkcji z matematyki. Na przykład funkcja kwadratowa f(x)=2x<sup>2</sup>+2x-4 przyjmuje jeden argument: x i po podstawieniu go do wzoru zwraca wynik.</p>
<p>Funkcje mogą przymować różną ilość argumentów, w tym także zero, a także nie każda funkcja musi jawnie zwracać konkretny wynik. Składnia funkcji wygląda nastepująco</p>
<pre><code class="language-php">function nazwaFunkcji($parametr1, $parametr2) {
  // kod do wykonania
  return $value; // opcjonalne
}</code></pre>
<p>Twoim zadaniem jest napisanie funkcji f(x) która obliczy wynik funkcji kwadratowej z powyższego przykładu.</p>