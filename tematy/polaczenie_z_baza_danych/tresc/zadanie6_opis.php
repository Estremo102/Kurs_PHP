<h3>Dodawanie danych</h3>
<p>Dodawanie danych również jak dwie poprzednie operacje jest zapytaniem nie zwracającym wyników, a więc po raz kolejny zapytanie wysyłamy za pomocą funkcji exec()</p>
<pre><code class="language-php">&lt;?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com')";
  $conn->exec($sql);
  echo "Nowy rekord utworzony pomyślnie";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?&gt; </code></pre>
<?php 
    if(isset($dbname)) {
    echo "<p>W poprzednim zadaniu została dodana tabela do bazy $dbname, teraz pora uzupełnić ją danymi. Dodaj do bazy przykładowe dane.</p>";
} else {
    echo "<p>Najpierw wykonaj poprzednie dwa zadania, żeby utowrzyć bazę danych i tabelę do której dodasz dane</p>";
}
?>