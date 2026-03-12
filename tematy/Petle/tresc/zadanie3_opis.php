<?php $tempi = $i?>
<h3>Pętla for</h3>
<p>
    Pętla for w PHP - wykonuje pętlę po bloku kodu określoną liczbę razy. Pętla for jest używana, gdy wiesz, ile razy skrypt powinien zostać uruchomiony. <br>
    Składnia:
</p>
<pre><code class="language-php">for (inicjalizacja; warunek; inkrementacja) {
  // kod do wykonania
}</code></pre>
<p>
    Oto jak to działa:
    <ul>
        <li>Inicjalizacja - jest obliczana jednokrotnie (zazwyczaj ustawia zmienną licznika)</li>
        <li>Warunek - jest obliczany przed każdą iteracją (jeśli wartość jest prawdziwa - pętla jest kontynuowana)</li>
        <li>Zwiększenie - jest obliczane po każdej iteracji (zazwyczaj używane do zwiększania/zmniejszania zmiennej licznika)</li>
    </ul>
    Poniższy przykład pokazuje pętlę for, która wypisuje liczby od 0 do 10:
</p>
<pre><code class="language-php">for ($i = 0; $i <= 10; $i++) {
  echo "liczba wynosi: $i &lt;br&gt;";
}</code></pre>
<pre><code><?php 
for ($i = 0; $i <= 10; $i++) {
  echo "Liczba wynosi: $i <br>";
}?></code></pre>
<p>Wyjaśnienie przykładu:
    <ol>
        <li>$i = 0;, jest obliczane raz i ustawia zmienną licznika na 0.</li>
        <li>$i <= 10;, jest obliczane przed każdą iteracją, a pętla jest kontynuowana, jeśli to wyrażenie jest prawdziwe. W tym przypadku wyrażenie jest prawdziwe, dopóki $i jest mniejsze lub równe 10.</li>
        <li>$i++;, jest obliczane po każdej iteracji i zwiększa zmienną licznika $i o jeden.</li>
    </ol>
    Można także zamiast inkrementacji użyć dekrementacji:
</p>
<pre><code class="language-php">for ($i = 10; $i >= 0; $i--) {
  echo "liczba wynosi: $i &lt;br&gt;";
}</code></pre>
<pre><code><?php 
for ($i = 10; $i >= 0; $i--) {
  echo "Liczba wynosi: $i <br>";
}?></code></pre>
<p>Zadanie: Pętle można zagnieżdżać, czyli umieszczać jedną pętlę w drugiej.
Utwórz tablicę $wyniki. Następnie napisz pętlę w pętli, w której obie pętle wykonają się po 5 razy. Podczas każdej iteracji zapisz do tablicy $wyniki iloczyn numerów aktualnych przebiegów obu pętli. <br>
Przykład efektu: 1, 2, 3, 4, 5, 2, 4, 6, 8, 10, … itd.</p>
<?php $i = $tempi?>