<h3>Zmienne superglobalne</h3>
<p>Zmienne superglobalne to specialne wbudowane zmienne, które są dostępne w całym kodzie. Oznacza to, że niezależnie od zakresu można do nich uzyskać dostęp z dowolnej funkcji, klasy, pliku itd.</p>
<p>
    Zmienne superglobalne w PHP to:
    <ul>
        <li>
            <span class="important">$GLOBALS</span> - Tablica zawierająca odniesienia do wszystkich zmiennych globalnych.
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
<pre><code class="language-php"></code></pre>