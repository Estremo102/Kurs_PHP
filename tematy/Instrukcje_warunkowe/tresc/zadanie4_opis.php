<h3>instrukcja if ... else</h3>
<p>else pozwala na rozbudowanie instrukcji warunkowej o blok kodu który wykona się, jeśli warunek logiczny okazał się fałszywy i instrukcja warunkowa się nie wykonała.</p>
<pre><code class="language-php">if (warunek_logiczny) {
  // kod który ma się wykonać jeśli warunek_logiczny ma wartość true;
} else {
  // kod który ma się wykonać jeśli warunek_logiczny ma wartość false;
}</code></pre>
Przykład:
<pre><code class="language-php">$t = date("H");

if ($t < "20") {
  echo "Miłego dnia!";
} else {
  echo "Miłej nocy!";
}</code></pre>
<p> można else z kolejnymi ifami za pomocą elseif</p>
<pre><code class="language-php">if (warunek_logiczny) {
  // kod który wykona się jeśli warunek_logiczny wynosi true;
} elseif (warunek_logiczny2) {
  // kod który wykona się jeśli warunek_logiczny wynosi false, a warunek_logiczny2 wynosi true;
} else {
  // kod który wykona się jeśli oba warunki logiczne wynoszą false;
}</code></pre>
<p>Zadanie: W kodzie masz dostęp do zmiennej $liczba, jeśli przypisana do niej wartość jest mniejsza od 21 wyświetl napis "$liczba jest mniejsza od 21", w przeciwnym wypadku jeśli jest równa 21 wyświetl napis "$liczba jest równa 21", w przeciwnym wypadku wyświetl napis "$liczba jest większa od 21" </p>