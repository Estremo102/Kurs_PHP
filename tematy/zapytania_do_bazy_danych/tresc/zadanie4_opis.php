<h3>wyświetlanie tabeli</h3>
<p>Bardziej praktycznym przykładem będzie wyświetlenie tabeli</p>
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
    echo "&lt;table&gt;&lt;tr&gt;&lt;th&gt;Host&lt;/th&gt;&lt;th&gt;User&lt;/th&gt;&lt;/tr&gt;";
        while($row = $result->fetch()) {
            echo "&lt;tr&gt;";
            echo "&lt;td&gt;" . $row['Host'] . "&lt;/td&gt;";
            echo "&lt;td&gt;" . $row['User'] . "&lt;/td&gt;";
            echo "&lt;/tr&gt;";
        }
        echo "&lt;/table&gt;";
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
<?php
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
    echo "<table><tr><th>Host</th><th>User</th></tr>";
        while($row = $result->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['Host'] . "</td>";
            echo "<td>" . $row['User'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        unset($result);
    } else {
        echo "Brak rekordów dla zapytania $sql.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
<p>Wyślij zapytanie do bazy danych ze swojego projektu i wypisz w tabeli wyniki. Jeśli robicie projekt w kilka osób, niech każdy utworzy inną tabelę.</p>