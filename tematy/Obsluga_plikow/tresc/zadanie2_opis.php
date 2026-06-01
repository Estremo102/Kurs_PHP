<h3>Obsługa plików</h3>
<p>
    Obsługa plików to nie tylko polecenia include i require. PHP daje również dostęp do funkcji pozwalających na pracę z plikami. <br>
    Podstawowe funkcje obsługi plików to:
</p>
<ul>
    <li>readfile() - odczytuje plik i zapisuje go do bufora wejściowego</li>
    <li>fopen() - otwiera plik, co daje więcej możliwości niż w przypadku readfile()</li>
    <li>fread() - odczytuje plik</li>
    <li>fgets() - odczytuje pojedynczą linię z pliku</li>
    <li>fgetc() - odczytuje pojedynczy znak z pliku</li>
    <li>feof() - sprawdza czy "end-of-file" został osiągnięty</li>
    <li>fwrite() - zapisuje do pliku</li>
    <li>fclose() - zamyka otwarty plik</li>
    <li>unlink() - usuwa plik</li>
</ul>
<pre><code class="language-php">echo readfile("navbox.php");</code></pre>
<div><?php echo readfile("navbox.php");?></div>
<p>Zadanie: wyświetl zawartość pliku <?php
$tematy = include __DIR__ . '/../../../config/tematy.php';
$tablica = [];

foreach ($tematy as $groupName => $links) {
    foreach ($links as $t) {
        $tablica[] = $t['title'];
    }
}

echo " zadanie";
randomByUsername(range(1, 6));
echo "_opis.php z tematu ";
randomByUsername($tablica);
?> Może przydatne okazać się: "__DIR__ . '\..\..\..\"</p>