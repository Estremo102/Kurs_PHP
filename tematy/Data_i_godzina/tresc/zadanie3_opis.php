<h3>mktime()</h3>
<p>Funkcja mktime() zwraca znacznik czasu Unix dla podanej daty.</p>
<pre><code class="language-php">mktime(godzina, minuta, sekunda, miesiac, dzen, rok)</code></pre>
<p>Przykładowo chcąc policzyć ile dni temu zaczął się rok szkolny użyć poniższego kodu:</p>
<pre><code class="language-php">$rozpoczecieRoku = mktime(9, 0, 0, 9, 1, Date("m") < 9 ? Date("Y") - 1 : Date("Y"));
echo 'od początku roku szkolnego minęło '. floor((time() - $rozpoczecieRoku)/60/60/24) . ' dni.';</code></pre>
<pre><code class="language-php"><?php 
$rozpoczecieRoku = mktime(9, 0, 0, 9, 1, Date("m") < 9 ? Date("Y") - 1 : Date("Y"));
echo 'Od początku roku szkolnego minęło '. floor((time() - $rozpoczecieRoku)/60/60/24) . ' dni.';
?></code></pre>
<p>
    Zadanie: odwzoruj działanie strony <a href="https://kiedywakacje.pl">kiedywakacje.pl</a> i wypisz ile tygodni, dni, godzin, minut i sekund zostało do końca roku szkolnego. <br>
    Zadanie dodatkowe: odwzoruj ile % roku szkolnego zostało.
</p>