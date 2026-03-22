<h3>Zmienna liczba parametrów</h3>
<p>Używając operatora ... przed parametrem funkcji, funkcja akceptuje nieznaną liczbę parametrów. Nazywa się to również funkcją o zmiennej liczbie parametrów.</p>
<p>Argument funkcji o zmiennej liczbie parametrów staje się tablicą. Przykład:</p>
<pre><code class="language-php">&lt;?php
function sumMyNumbers(...$x) {
  $n = 0;
  $len = count($x);
  for($i = 0; $i < $len; $i++) {
    $n += $x[$i];
  }
  return $n;
}

$a = sumMyNumbers(5, 2, 6, 2, 7, 7);
echo $a;
?></code></pre>
<p>Rezultat:</p>
<pre><code><?php
function sumMyNumbers(...$x) {
  $n = 0;
  $len = count($x);
  for($i = 0; $i < $len; $i++) {
    $n += $x[$i];
  }
  return $n;
}

$a = sumMyNumbers(5, 2, 6, 2, 7, 7);
echo $a;
?></code></pre>
<p>Powyższy kod przyjmuje nieokreśloną ilość parametrówm a następnie wszystkie ze sobą sumuje i zwraca wynik</p>
<p>Funkcja może przymować jednocześnie zwykłe parametry i ich nieokreśloną ilość. Trzeba jednak pamiętać, że operatora ... można użyć tylko przy ostatnim argumencie. Przykład:</p>
<pre><code class="language-php">&lt;?php
function myFamily($lastname, ...$firstname) {
  $txt = "";
  $len = count($firstname);
  for($i = 0; $i < $len; $i++) {
    $txt = $txt."Witaj, $firstname[$i] $lastname.<br>";
  }
  return $txt;
}

$a = myFamily("Nowak", "Jan", "Anna", "Michał");
echo $a;
?></code></pre>
<p>Rezultat:</p>
<pre><code><?php
function myFamily($lastname, ...$firstname) {
  $txt = "";
  $len = count($firstname);
  for($i = 0; $i < $len; $i++) {
    $txt = $txt."Witaj, $firstname[$i] $lastname.<br>";
  }
  return $txt;
}

$a = myFamily("Nowak", "Jan", "Anna", "Michał");
echo $a;
?></code></pre>
<p>Więc gdyby napisać <pre><code>function myFamily(...$firstname, $lastname) {</code></pre> to wystąpiłby błąd.</p>
<p>Pamiętasz funkcje min() i max()? Jeśli nie możesz zaglądnąć do tematu Funkcje matematyczne. Twoim zadaniem jest zaimplementowanie własnych funkcji myMin oraz myMax które będą działać identycznie.</p>