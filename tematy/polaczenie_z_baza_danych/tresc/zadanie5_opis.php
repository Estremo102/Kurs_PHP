<h3>Tworzenie tabeli</h3>
<p>Utworzenie tabeli wygląda bardzo podobnie.</p>
<pre><code class="language-php">&lt;?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // zapytanie tworzące tabelę
  $sql = "CREATE TABLE MyGuests (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  $conn->exec($sql);
  echo "Tabelę MyGuests utworzono pomyślnie";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?&gt; </code></pre>
<?php 
    if(isset($dbname)) {
    echo "<p>W poprzednim zadaniu została utworzona baza $dbname, teraz pora dodać do niej tabelę. Stwórz tabelę User z polami: ID INT AUTOINCREMENT, login VARCHAR (20) oraz age INT</p>";
} else {
    echo "<p>Najpierw wykonaj poprzednie zadanie, żeby utowrzyć bazę danych do której dodasz tabelę</p>";
}
?>