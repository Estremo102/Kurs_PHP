<h3>$_SERVER</h3>
<p>zminna $_SERVER przechowuje informacje o serwerze WWW na którym uruchomiona jest strona. Wpisy w tej zmiennej są tworzone przez serwer, więc nie ma gwarancji, że każdy z nich będzie dostępny w każdym środowisku</p>
<pre><code class="language-php">echo $_SERVER['PHP_SELF'];
echo $_SERVER['SERVER_NAME'];
echo $_SERVER['HTTP_HOST'];
echo $_SERVER['HTTP_REFERER'];
echo $_SERVER['HTTP_USER_AGENT'];
echo $_SERVER['SCRIPT_NAME'];</code></pre>
<code><pre><?php 
echo $_SERVER['PHP_SELF'];
echo '<br>'.$_SERVER['SERVER_NAME'];
echo '<br>'.$_SERVER['HTTP_HOST'];
echo '<br>'.$_SERVER['HTTP_REFERER'];
echo '<br>'.$_SERVER['HTTP_USER_AGENT'];
echo '<br>'.$_SERVER['SCRIPT_NAME'];
?></pre></code>
<p><span class="improtant">Zadanie: </span> Sprawdź czy w Twoim środowisku uruchomieniowym istnieje zmienna 
<?php
$dane = [
"\$_SERVER['PHP_SELF'] Zwraca nazwę pliku aktualnie wykonywanego skryptu",
"\$_SERVER['GATEWAY_INTERFACE'] Zwraca wersję interfejsu Common Gateway Interface (CGI) używanego przez serwer",
"\$_SERVER['SERVER_ADDR'] Zwraca adres IP serwera hosta",
"\$_SERVER['SERVER_NAME'] Zwraca nazwę serwera hosta (np. www.w3schools.com)",
"\$_SERVER['SERVER_SOFTWARE'] Zwraca ciąg identyfikacyjny serwera (np. Apache/2.2.24)",
"\$_SERVER['SERVER_PROTOCOL'] Zwraca nazwę i wersję protokołu informacyjnego (np. HTTP/1.1)",
"\$_SERVER['REQUEST_METHOD'] Zwraca metodę żądania użytą do uzyskania dostępu do strony (np. POST)",
"\$_SERVER['REQUEST_TIME'] Zwraca znacznik czasu Początek żądania (np. 1377687496)",
"\$_SERVER['QUERY_STRING'] Zwraca ciąg zapytania, jeśli dostęp do strony odbywa się za pośrednictwem ciągu zapytania.",
"\$_SERVER['HTTP_ACCEPT'] Zwraca nagłówek Accept z bieżącego żądania.",
"\$_SERVER['HTTP_ACCEPT_CHARSET'] Zwraca nagłówek Accept_Charset z bieżącego żądania (np. utf-8, ISO-8859-1).",
"\$_SERVER['HTTP_HOST'] Zwraca nagłówek Host z bieżącego żądania.",
"\$_SERVER['HTTP_REFERER'] Zwraca pełny adres URL bieżącej strony (niepewny, ponieważ nie wszystkie aplikacje klienckie go obsługują).",
"\$_SERVER['HTTPS'] Czy skrypt jest odpytywany za pomocą bezpiecznego protokołu HTTP.",
"\$_SERVER['REMOTE_ADDR'] Zwraca adres IP, z którego użytkownik przegląda bieżącą stronę. strona",
"\$_SERVER['REMOTE_HOST'] Zwraca nazwę hosta, z którego użytkownik przegląda bieżącą stronę.",
"\$_SERVER['REMOTE_PORT'] Zwraca port używany na komputerze użytkownika do komunikacji z serwerem WWW.",
"\$_SERVER['SCRIPT_FILENAME'] Zwraca bezwzględną ścieżkę dostępu do aktualnie wykonywanego skryptu.",
"\$_SERVER['SERVER_ADMIN'] Zwraca wartość podaną dyrektywie SERVER_ADMIN w pliku konfiguracyjnym serwera WWW (jeśli skrypt działa na hoście wirtualnym, będzie to wartość zdefiniowana dla tego hosta wirtualnego) (np. someone@w3schools.com).",
"\$_SERVER['SERVER_PORT'] Zwraca port na komputerze serwera używany przez serwer WWW do komunikacji (np. 80).",
"\$_SERVER['SERVER_SIGNATURE'] Zwraca wersję serwera i nazwę hosta wirtualnego, które są dodawane do stron generowanych przez serwer.",
"\$_SERVER['PATH_TRANSLATED'] Zwraca ścieżkę do bieżącego skryptu opartą na systemie plików.",
"\$_SERVER['SCRIPT_NAME'] Zwraca ścieżkę do bieżącego skryptu.",
"\$_SERVER['SCRIPT_URI'] Zwraca identyfikator URI bieżącej strony."
];
$username = get_current_user();
echo $dane[hexdec(substr(hash('sha256', $username), 0, 8)) % count($dane)];
if (isset($_GET['username']) && $_GET['username'] !== '') {
    $username = $_GET['username'];
    $index = hexdec(substr(hash('sha256', $username), 0, 8)) % count($dane);
    echo '<br>'. $dane[$index];
}
?> i następnie jeśli to możliwe wyświetl jej zawartość.</p>