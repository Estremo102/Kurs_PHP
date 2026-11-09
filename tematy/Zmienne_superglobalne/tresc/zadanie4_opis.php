<h3>$_COOKIE</h3>
<h4>$_REQUEST</h4>
<p>zmienna $_REQUEST zawiera dane z przesyłanych formularzy, ciągi zapytań URL i pliki cookie HTTP, czyli jest to tablica zawierająca dane z $_GET, $_POST oraz $_COOKIE. Jest to wygodna opcja, jednak może stwarzać luki w zabezpieczeniach, dlatego lepiej używać $_COOKIE, $_POST i $_GET</p>
<h4>$_COOKIE</h4>
<p>
    Plik cookie to mały plik tekstowy który serwer przechowuje w przeglądarce użytkownika. Gdy serwer zarząda, przeglądarka wysyła zapisany plik cookie. Pliki cookies są często używane do przechowywania takich informacji jak:
    <ul>
        <li>Nazwa użytkownika</li>
        <li>Utrzymywanie statusu logowania</li>
        <li>Zawartość koszyka</li>
        <li>Preferencje językowe</li>
        <li>Śledzenie aktywności użytkownika</li>
    </ul>
</p>
<p>
    Plik cookie tworzony jest za pomocą funkcji setcookie().
    <pre>setcookie(nazwa, wartosc, data_waznosci, ściezka, domena, bezpieczenstwo, httponly);</pre>
    <ul>
        <li>nazwa - określa nazwę pliku cookie</li>
        <li>wartosc - określa dane przechowywane przez plik cookie</li>
        <li>data_waznosci - określa kiedy plik wygasa</li>
        <li>sciezka - określa sciezke serwera pliku cookie</li>
        <li>domena - określa domenę pliku cookie</li>
        <li>bezpieczenstwo - określa czy plik powinien być przesyłany tylko przez HTTPS</li>
        <li>httponly - określa czy plik ma być dostępny tylko za pośrednictwem HTTP</li>
    </ul>
</p>
<p>Przykład: ciasteczko "jezyk" ważne przez godzinę i jego odczyt:</p>
<pre><code class="language-php">setcookie("jezyk", "pl", time() + 3600);

if (isset($_COOKIE["jezyk"])) {
    echo "Wybrany język: " . $_COOKIE["jezyk"];
}</code></pre>
<p><span class="important">Zadanie: </span> Za pomocą setcookie() utwórz ciasteczko o nazwie "uzytkownik" z wartością swojego imienia, ważne 1 dzień (time() + 86400). Następnie, jeśli ciasteczko istnieje w $_COOKIE, wyświetl "Witaj, {wartość}", w przeciwnym wypadku "Ciasteczko nie zostało jeszcze ustawione". Uwaga: przeglądarka odeśle ciasteczko dopiero przy kolejnym żądaniu, więc będzie ono widoczne po ponownym sprawdzeniu zadania lub odświeżeniu strony.</p>