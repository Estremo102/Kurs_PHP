<h3>Zmienne superglobalne</h3>
<p>Zmienne superglobalne to specialne wbudowane zmienne, które są dostępne w całym kodzie. Oznacza to, że niezależnie od zakresu można do nich uzyskać dostęp z dowolnej funkcji, klasy, pliku itd.</p>
<p>
    Zmienne superglobalne w PHP to:
    <ul>
        <li>
            <span class="important">$GLOBALS</span> - Tablica zawierająca odniesienia do wszystkich zmiennych globalnych w danym skrypcie.
        </li>
        <li>
            <span class="important">$_SERVER</span> - Posiada informacje o serwerze, na którym jest hostowana strona, w tym nagłówki, ścieżki czy lokalizacja skryptu.
        </li>
        <li>
            <span class="important">$_REQUEST</span> - Tablica zawierająca dane ze zmiennych $_GET, $_POST i $_COOKIE
        </li>
        <li>
            <span class="important">$_GET</span> - Tablica zmiennych odbieranych za pomocą HTTP GET (za pośrednictwem URL)
        </li>
        <li>
            <span class="important">$_POST</span> - Tablica zmiennych odbieranych za pomocą HTTP POST
        </li>
        <li>
            <span class="important">$_COOKIE</span> - Tablica zmiennych przekazywanych do bierzącego skryptu za pomocą plików cookie.
        </li>
        <li>
            <span class="important">$_FILES</span> - Tablica elementów zawierająca informacje o przesyłanych plikach.
        </li>
        <li>
            <span class="important">$_ENV</span> - Zmienne środowiskowe przekazywane do bierzącego skryptu.
        </li>
        <li>
            <span class="important">$_SESSION</span> - tablica zmiennych sesji.
        </li>
    </ul>
</p>
<p><span class="improtant">Zadanie: </span> Za pomocą pętli foreach i var_dump sprawdź zawartość zmiennej superglobalnej 
<?php
$superglobalne = [
'$GLOBALS',
'$_SERVER',
'$_REQUEST', 
'$_POST',
'$_GET',
'$_FILES',
'$_ENV',
'$_COOKIE',
'$_SESSION'
];
$username = get_current_user();
echo $superglobalne[hexdec(substr(hash('sha256', $username), 0, 8)) % count($superglobalne)];
if (isset($_GET['username']) && $_GET['username'] !== '') {
    $username = $_GET['username'];
    $index = hexdec(substr(hash('sha256', $username), 0, 8)) % count($superglobalne);
    echo '<br>'. $superglobalne[$index];
}
?></p>
<p>Przypomnienie foreach: </p>
<pre><code class="language-php">foreach ($zbior_danych as $zmienna_ze_zbioru) {
    // ...
}

//lub 

foreach ($dane as $klucz => $wartosc) {
    // ...   
}</code></pre>