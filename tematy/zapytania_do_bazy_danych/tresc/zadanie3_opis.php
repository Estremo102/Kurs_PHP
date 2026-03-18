<h3>Wyświetlanie listy</h3>
<p>możesz także wyświetlać różne elementy strony jak np listę lub tabelę. przykład:</p>
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
        echo '<ol>';
        while($row = $result->fetch()) {
            echo "<li>Host: " . $row["Host"]. " - User: " . $row["User"]. "</li>";
        }
        echo '</ol>';
        unset($result);
    } else {
        echo "Brak rekordów dla zapytania $sql.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?&gt;</code></pre>
<p>rezultat:</p>
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
        echo '<ol>';
        while($row = $result->fetch()) {
            echo "<li>Host: " . $row["Host"]. " - User: " . $row["User"]. "</li>";
        }
        echo '</ol>';
        unset($result);
    } else {
        echo "Brak rekordów dla zapytania $sql.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?></code></pre>
<p>Wyślij zapytanie do bazy danych ze swojego projektu i wypisz w liście nienumerowanej wyniki. Jeśli robicie projekt w kilka osób, niech każdy wyśle inne zapytanie.</p>