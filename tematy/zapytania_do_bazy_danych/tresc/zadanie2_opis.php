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

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Host, User FROM global_priv";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Host: " . $row["Host"]. " - User: " . $row["User"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();
?&gt;</code></pre>
rezultat:
<pre><code><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Host, User FROM global_priv";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Host: " . $row["Host"]. " - User: " . $row["User"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();
?></code></pre>
</p>
<p>Twoim zadaniem jest połączyć się z bazą danych ze swojego projektu i wypisać dane z dowolnej tabeli. Jeśli robicie projekt w kilka osób, niech każdy wypisze dane z innej tabeli.</p>