<h3>Funkcja round()</h3>
<p>Funkcja round() zwraca zaokrągloną liczbę zmiennoprzecinkową do liczby całkowitej.</p>
<pre><code class="language-php">echo(round(3.60));
echo(round(0.49));</code></pre>
<pre><code><?php echo(round(3.60));
echo(round(0.49)); ?></code></pre>
<p>
    Twoim zadaniem jest sprawdzić, czy wartość ze zmiennej $liczba powinna być zaokrąglona w górę czy w dół. Wykorzystaj intval($liczba) lub rzutowanie (int). <br>
    Jeśli tak, wyświetl napis "Liczba {$liczba} jest zaokrąglana w dół", w przeciwnym wypadku wyświetl napis "Liczba {$liczba} jest zaokrąglana w górę";
</p>