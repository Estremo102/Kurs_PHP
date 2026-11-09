<h3>$_GET</h3>
<p>Zmienna $_GET zawiera zmienne przekazane metodą GET</p>
<p>Dane do $_GET trafiają z adresu strony, po znaku ? w postaci nazwa=wartość (kolejne pary oddziela się znakiem &amp;). Można je przekazać np. linkiem:</p>
<pre><code class="language-php">&lt;a href="?strona=kontakt"&gt;Kontakt&lt;/a&gt;
&lt;?php
if (isset($_GET["strona"])) {
    echo "Otwarta strona: " . $_GET["strona"];
}
?&gt;</code></pre>
<p><span class="important">Zadanie: </span> Utwórz co najmniej dwa linki, które przekażą w adresie parametr "kolor" (np. &lt;a href="?kolor=czerwony"&gt;). Jeśli parametr kolor jest ustawiony, wyświetl "Wybrany kolor: {kolor}", w przeciwnym wypadku "Nie wybrano koloru".</p>
<p>Wynik zadania jest wyświetlany wewnątrz tej strony, więc kliknięcie linku stąd nie trafi do Twojego kodu. Aby przetestować linki, otwórz swój plik bezpośrednio w przeglądarce: <a href="tematy/Zmienne_superglobalne/rozwiazania/zadanie6.php">tematy/Zmienne_superglobalne/rozwiazania/zadanie6.php</a></p>