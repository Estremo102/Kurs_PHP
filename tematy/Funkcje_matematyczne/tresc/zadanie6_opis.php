<h3>Funkcja rand()</h3>
<p>Funkcja rand() generuje losową liczbe.</p>
<pre><code class="language-php">echo(rand());</code></pre>
<pre><code><?php echo(rand()); ?></code></pre>
<p>
    Aby uzyskać większą kontrolę nad liczbą losową, możesz dodać opcjonalne parametry min i max, aby określić najmniejszą i największą liczbę całkowitą, która ma zostać zwrócona. <br><br>
    Na przykład, jeśli chcesz uzyskać losową liczbę całkowitą z zakresu od 21 do 37 (włącznie), użyj funkcji rand(21, 37):
</p>
<pre><code class="language-php">echo(rand(21, 37));</code></pre>
<pre><code><?php echo(rand(21, 37)); ?></code></pre>
<p>Wcielasz się w Michała Wiśniewskiego który gra w kości o kibel. Sprawa jest prosta, jeśli na trzy rzuty dwa razy wypadnie 1, 2 lub 3 musisz wręczyć 2000zł rodzinie którą naszedłeś w środku nocy, w przeciwnym wypadku wygrywasz ich kibel.</p>
<p> 
    Trzy razy wylosuj liczbę od 1 do 6 i wyświetl grafikę odpowiedniej kostki. Możesz to zrobić za pomocą <pre><code class="language-php">echo "&lt;img src='images/kostki/kostka{$wylosowanaLiczba}.png' alt='{$wylosowanaLiczba}'&gt;"</code></pre>
    Następnie napisz w zależności od wyniku jeśli wygrałeś: "Ten kibel jest twój i mój!", w przeciwnym wypadku "Każdy człowiek jest pazerny i to jest to, a może się uda."
</p>