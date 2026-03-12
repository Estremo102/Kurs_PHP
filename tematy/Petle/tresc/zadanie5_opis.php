<?php $tempi = $i?>
<h3>break</h3>
<p>Za pomocą instrukcji break możemy przerwać pętlę, nawet jeśli warunek nadal jest spełniony:</p>
<pre><code class="language-php">$i = 1;
while ($i < 6) {
  if ($i == 3) break;
  echo $i;
  $i++;
}</code></pre>
<pre><code><?php
$i = 1;
while ($i < 6) {
  if ($i == 3) break;
  echo $i;
  $i++;
}?></code></pre>
<p>Zadanie: W kodzie masz dostęp do tablicy $kolory, wypisuj wszystkie elementy do momentu natrafienia na kolor czarny, lub do końca tablicy</p>
<?php $i = $tempi?>