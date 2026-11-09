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
<p><span class="important">Zadanie: </span> Sprawdź czy w Twoim środowisku uruchomieniowym istnieje zmienna 
<?php
include __DIR__ . '/../dane/zadanie3.php';
$username = get_current_user();
echo $zmienne_server[hexdec(substr(hash('sha256', $username), 0, 8)) % count($zmienne_server)];
if (isset($_GET['username']) && $_GET['username'] !== '') {
    $username = $_GET['username'];
    $index = hexdec(substr(hash('sha256', $username), 0, 8)) % count($zmienne_server);
    echo '<br>'. $zmienne_server[$index];
}
?> (np. za pomocą isset()) i jeśli istnieje, wyświetl jej zawartość. Jeśli nie istnieje, kod nie może wyświetlać ostrzeżenia o brakującym kluczu.</p>