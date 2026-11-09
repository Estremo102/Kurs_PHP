<h3>Funkcja round()</h3>
<p>Funkcja round() zaokrągla liczbę zmiennoprzecinkową do najbliższej liczby całkowitej.</p>
<pre><code class="language-php">echo(round(3.60));
echo(round(0.49));</code></pre>
<pre><code><?php echo(round(3.60));
echo(round(0.49)); ?></code></pre>
<p>
    Twoim zadaniem jest sprawdzić, czy funkcja round() zaokrągla wartość ze zmiennej $liczba w górę, czy w dół.
    Porównaj wynik round($liczba) z częścią całkowitą liczby, którą uzyskasz za pomocą intval($liczba) lub rzutowania (int). <br>
    Jeśli są równe, wyświetl napis "Liczba {$liczba} jest zaokrąglana w dół", w przeciwnym wypadku wyświetl napis "Liczba {$liczba} jest zaokrąglana w górę".
</p>