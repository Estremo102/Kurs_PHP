<h3>$_GET</h3>
<p>Kolejna lekcja będzie poruszać temat superglobalnych. Jedną z nich jest $_GET. Jest to tablica dająca dostęp do zmiennych przesyłanych przez link strony. Poniższy kod odczytuje z linku temat bierzącej lekcji i go wyświetla. Jest to fragment strony używany w tym kursie, w pliku head.php</p>
<pre><code class="language-php">$title = isset($title) ? $title : ucfirst(explode('.', basename($_SERVER['PHP_SELF']))[0]);
    $title = $title == 'Index' ? 'Strona Główna' : $title;
    $title = str_replace("_", " ", $title);
    echo $title;</code></pre>
<pre><code><?php 
    $title = isset($title) ? $title : ucfirst(explode('.', basename($_SERVER['PHP_SELF']))[0]);
    $title = $title == 'Index' ? 'Strona Główna' : $title;
    $title = str_replace("_", " ", $title);
    echo $title;
?></code></pre>
<p>Zadanie: Dodaj do adresu strony nową zmienną, odczytaj i wyświetl przypisaną do niej wartość</p>