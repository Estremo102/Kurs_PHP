<h3>time()</h3>
<p>Funkcja time zwraca aktualny czas jako znacznik czasu Unix. Znacznik czasu Unix to liczba sekund pomiędzy Epoką Uniksa (1 stycznia 1970 00:00:00 GMT) i czas określony.</p>
<pre><code class="language-php">echo time(); // ilość sekund od 1970.01.01
echo '<br>'. date("Y.m.d H:i:s"); // format daty rok.miesiąc.dzień godzina:minuta:sekunda z domyślną wartością teraz
echo '<br>'. date("Y.m.d H:i:s", time()); // time() zwraca teraz, więc wynik funkcji będzie identyczny jak linijkę wyżej
echo '<br>'. date("Y.m.d H:i:s", time()-60*60*24); // 60 sekund * 60 minut * 24 godziny to dzień w sekundach</code></pre>
<pre><code><?php 
echo time();
echo '<br>'. date("Y.m.d H:i:s"); 
echo '<br>'. date("Y.m.d H:i:s", time()); 
echo '<br>'. date("Y.m.d H:i:s", time()-60*60*24); 
?></code></pre>
<p>Zadanie: Wyświetl datę i godzinę wskazującą na <?php randomByUsername([
    "12 godzin temu.",
    "12 godzin później niż teraz.",
    "jutro o tej samej porze."
]);?></p>