<?php $tempi = $i?>
<h3>Pętla do...while</h3>
<p>
    Pętla PHP do...while - przechodzi przez blok kodu co najmniej raz, a następnie powtarza pętlę tak długo, jak długo określony warunek jest prawdziwy. <br>
    składnia: 
</p>
<pre><code class="language-php">do {
  // kod do wykonania
} while (warunek);</code></pre>
<p>Przykład:</p>
<pre><code class="language-php">$i = 1;

do {
  echo $i;
  $i++;
} while ($i < 6);</code></pre>
<pre><code><?php
$i = 1;

do {
  echo $i;
  $i++;
} while ($i < 6);?></code></pre>
<P>Tutaj ustawiamy zmienną $i na 8 zamiast 1 i ponownie wykonujemy tę samą pętlę do...while:</P>
<pre><code class="language-php">$i = 8;

do {
  echo $i;
  $i++;
} while ($i < 6);</code></pre>
<pre><code><?php
$i = 8;

do {
  echo $i;
  $i++;
} while ($i < 6);?></code></pre>
<p>Zadanie: w kodzie masz dostęp do zmiennej $liczba, do której jest przypisana losowa wartość od 1 do 10. Napisz pętle która wypisze wylosowaną liczbę, a następnie dopóki liczba zwiększona o 1 będzie mniejsza lub równa 8 powtórzy operację wypisania i inkrementacji. </p>
<?php $i = $tempi?>