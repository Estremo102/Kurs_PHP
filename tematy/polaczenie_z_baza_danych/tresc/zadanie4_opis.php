<h3>Tworzenie bazy danych</h3>
<p>Aby utworzyć bazę danych można nawiązać połaczenie bez ustawiania wartości dbname, a następnie wysłania kwerendy CREATE</p>
<pre><code class="language-php">&lt;?php
$servername = "localhost";
$username = "username";
$password = "password";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // w przypadku błędu został wyrzucony wyjątek
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Zmienna z zapytaniem do bazy danych
  $sql = "CREATE DATABASE myDBPDO";
  // exec() służy do wysyłania zapytań nie zwracających wyników
  $conn->exec($sql);
  echo "Pomyślnie utworzono bazę danych";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?&gt; </code></pre>
<p>Twoim zadaniem jest utworzenie bazy danych. Jej nazwę zapisz w zmiennej $dbname, jako zapytanie najlepiej użyj "DROP DATABASE IF EXISTS $dbname; CREATE DATABASE $dbname" aby usunąć bazę danych jeśli już istnieje i uniknąć błędów.</p>
            