<h3>PDO</h3>
<p>PDO w PHP to skrót od PHP Data Objects - rozszerzenie wbudowane w PHP, które zapewnia abstrakcyjny interfejs do obsługi różnych baz danych z jednego kodu źródłowego.</p>
<pre><code class="language-php">&lt;?php
$servername = "localhost"; // Nazwa serwera, na potrzeby zajęć nie potrzeba zmieniać.
$username = "username"; // Nazwa użytkownika, domyślny użytkownik w xamppie to root.
$password = "password"; // Hasło, domyślne w xamppie jest puste.
$dbname = "myDB"; // Nazwa bazy danych z którą chcemy się połączyć.

try {
    // Tworzymy nowe połączenie z bazą danych
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Ustawiamy by w przypadku błędu został wyrzucony wyjątek
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Udało się nawiązać połączenie";
} catch(PDOException $e) {
    echo "Błąd połączenia: " . $e->getMessage();
}
?&gt;</code></pre>
<p>Twoim zadaniem jest w pliku zadanie1.php stworzyć nowe połączenie z bazą danych. Skorzystaj z powyższego kodu, modyfikując odpowiednie fragmenty.</p>
            