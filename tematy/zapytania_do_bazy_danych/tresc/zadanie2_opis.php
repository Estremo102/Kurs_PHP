<h3>$conn->query($sql);</h3>
<p>
    W poprzednim temacie zapytania wysyłaliśmy za pomocą $conn->exec($sql);
    <pre><code class="language-php">$conn->exec($sql);</code></pre>
    Jednak jeśli spodziewamy się odpowiedzi od bazy danych należy użyć
    <pre><code class="language-php">$conn->query($sql);</code></pre>
    Przykład: 
<pre><code class="language-php">&lt;?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  die("Could not connect. " . $e->getMessage());
}

try {
    $sql = "SELECT Host, User FROM global_priv";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        while($row = $result->fetch()) {
            echo "Host: " . $row["Host"]. " - User: " . $row["User"]. "<br>";
        }
        unset($result);
    } else {
        echo "Brak rekordów dla zapytania $sql.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?></code></pre>
rezultat:
<pre><code><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  die("Could not connect. " . $e->getMessage());
}

try {
    $sql = "SELECT Host, User FROM global_priv";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        while($row = $result->fetch()) {
            echo "Host: " . $row["Host"]. " - User: " . $row["User"]. "<br>";
        }
        unset($result);
    } else {
        echo "Brak rekordów dla zapytania $sql.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?></code></pre>
</p>
<p>Twoim zadaniem jest połączyć się z bazą danych ze swojego projektu i wypisać dane z dowolnej tabeli. Jeśli robicie projekt w kilka osób, niech każdy wypisze dane z innej tabeli.</p>