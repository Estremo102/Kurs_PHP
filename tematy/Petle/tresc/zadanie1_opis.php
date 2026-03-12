<?php $tempi = $i?>
<h3>Pętla while</h3>
<h4>Pętle w PHP</h4>
<p>
    Pętle PHP służą do wielokrotnego wykonywania tego samego bloku kodu, dopóki spełniony jest określony warunek. <br>
    W PHP występują następujące typy pętli:
    <ul>
        <li>while - pętla po bloku kodu, dopóki spełniony jest określony warunek</li>
        <li>do...while - pętla po bloku kodu raz, a następnie powtarza pętlę, dopóki spełniony jest określony warunek</li>
        <li>for - pętla po bloku kodu określoną liczbę razy</li>
        <li>foreach - pętla po bloku kodu dla każdego elementu tablicy</li>
    </ul>
</p>
<h4>Pętla while</h4>
<p>
    Pętla while w PHP - wykonuje pętlę po bloku kodu, dopóki określony warunek jest spełniony. <br>
    Składnia:
</p>
<pre><code class="language-php">while (warunek) {
  // kod który będzie się wykonywać dopóki warunek będzie prawdziwy
}</code></pre>
<p>Przykład:</p>
<pre><code class="language-php">$i = 1; // Utworzenie licznika
while ($i < 6) { // Warunek logiczny
  echo $i; // wypisanie licznika
  $i++; // Inkrementacja licznika
}</code></pre>
<p>efekt:</p>
<pre><code><?php
$i = 1; // Utworzenie licznika
while ($i < 6) { // Warunek logiczny
  echo $i; // wypisanie licznika
  $i++; // Inkrementacja licznika
}
?></code></pre>
<h4>Alternatywny zapis</h4>
<p>pętle while można też zapisać w taki sposób:</p>
<pre><code class="language-php">$i = 1;
while ($i < 6):
  echo $i;
  $i++;
endwhile;</code></pre>
<pre><code><?php
$i = 1;
while ($i < 6):
  echo $i;
  $i++;
endwhile;?></code></pre>
<p>Zadanie: Napisz pętle która będzie zwiększać licznik o 10 i wykona się 10 razy wypisując w kolejnych linijkach liczby 0, 10, 20 ... 90</p>
<?php $i = $tempi?>