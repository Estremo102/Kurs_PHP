<h3>Zapis do pliku</h3>
<p>Do zapisu do pliku służy funkcja <code>fwrite()</code>. Pierwszy parametr zawiera nazwę pliku, a drugi tekst który ma zostać zapisany. Poniższy kod zapisuje informacje do pliku utworzonego przez Ciebie w poprzednim zadaniu.</p>
<pre><code class="language-php">$fileName = 'tematy\Obsluga_plikow\rozwiazania\\'. get_current_user().".txt";
if(file_exists($fileName)) {
    $myfile = fopen($fileName, "w") or die("Nie można utworzyć pliku!");
    $txt = $myfile ."\n";
    fwrite($myfile, $txt);
    $txt = $fileName ."\n";
    fwrite($myfile, $txt);
    $txt = date("Y.m.d_His");
    fwrite($myfile, $txt);
    fclose($myfile);
    echo "Dane do pliku zapisano pomyślnie";
} else {
    echo "Najpierw wykonaj zadanie 5, aby zaobserwować wynik działania tego kodu.";
}</code></pre>
<code><pre><?php
$fileName = 'tematy\Obsluga_plikow\rozwiazania\\'. get_current_user().".txt";
if(file_exists($fileName)) {
    $myfile = fopen($fileName, "w") or die("Nie można utworzyć pliku!");
    $txt = $myfile ."\n";
    fwrite($myfile, $txt);
    $txt = $fileName ."\n";
    fwrite($myfile, $txt);
    $txt = date("Y.m.d_His");
    fwrite($myfile, $txt);
    fclose($myfile);
    echo "Dane do pliku zapisano pomyślnie";
} else {
    echo "Najpierw wykonaj zadanie 5, aby zaobserwować wynik działania tego kodu.";
}
?></pre></code>
<p>Jak możesz zaobserwować, dane w pliku są nadpisywane przy każdym odświeżeniu strony. Można również dane dopisywać do istniejącego pliku.</p>
<pre><code class="language-php">$myfile = fopen('tematy\Obsluga_plikow\rozwiazania\\'. get_current_user()."_append.txt", "a") or die("Nie można utworzyć pliku!");
$txt = date("Y.m.d_His")."\n";
fwrite($myfile, $txt);
fclose($myfile);</code></pre>
<?php
    $myfile = fopen('tematy\Obsluga_plikow\rozwiazania\\'. get_current_user()."_append.txt", "a") or die("Nie można utworzyć pliku!");
    $txt = date("Y.m.d_His")."\n";
    fwrite($myfile, $txt);
    fclose($myfile);
?>
<p>Zadanie: W 3 zadaniu utworzyłeś plik user.txt. Napisz kod, który <?php randomByUsername([
    "dopisze do niego",
    "nadpisze w nim"
]); ?> informację o <?php randomByUsername([
    "o dacie, godzinie i użytkowniku",
    "o dacie i użytkowniku",
    "o dacie i godzinie",
    "o godzinie i użytkowniku",
    "o dacie",
    "o godzinie",
    "o użytkowniku",
]);?>.</p>