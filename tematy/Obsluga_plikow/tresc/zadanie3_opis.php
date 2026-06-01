<h3>Otwarcie pliku</h3>
<p>Funkcja fopen() służy do otwarcja pliku (lub adresu URL). Pierwszy parametr funkcji przyjmuje nazwę pliku, a drugi określa w jakim trybie należy otworzyć plik.</p>
<table>
    <tr>
        <th>tryb</th>
        <th>opis</th>
    </tr>
    <tr>
        <td>r</td>
        <td>tylko odczyt - Wskaźnik pliku rozpoczyna się na początku pliku.</td>
    </tr>
    <tr>
        <td>r+</td>
        <td>odczyt/zapis - Wskaźnik pliku rozpoczyna się na początku pliku. Istniejące dane są zachowywane.</td>
    </tr>
    <tr>
        <td>w</td>
        <td>tylko zapis - Usuwa zawartość pliku lub tworzy nowy plik, jeśli nie istnieje. Wskaźnik pliku rozpoczyna się na początku pliku.</td>
    </tr>
    <tr>
        <td>w+</td>
        <td>odczyt/zapis - Usuwa zawartość pliku lub tworzy nowy plik, jeśli nie istnieje. Wskaźnik pliku rozpoczyna się na początku pliku.</td>
    </tr>
    <tr>
        <td>a</td>
        <td>dołączenie (tylko odczyt) -  Istniejące dane w pliku są zachowywane. Wskaźnik pliku rozpoczyna się na końcu pliku. Tworzy nowy plik, jeśli plik nie istnieje.</td>
    </tr>
    <tr>
        <td>a+</td>
        <td>dołączenie (odczyt/zapis) - Istniejące dane w pliku są zachowywane. Wskaźnik pliku rozpoczyna się na końcu pliku. Tworzy nowy plik, jeśli plik nie istnieje.</td>
    </tr>
    <tr>
        <td>x</td>
        <td>tylko zapis - Tworzy nowy plik. Zwraca FALSE i błąd, jeśli plik już istnieje.</td>
    </tr>
    <tr>
        <td>x+</td>
        <td>odczyt/zapis - Tworzy nowy plik. Zwraca FALSE i błąd, jeśli plik już istnieje</td>
    </tr>
</table>
Poniższy kod otwiera plik, a następnie wyświetla jego zawartość i zamyka.
<pre><code class="language-php">$myfile = fopen("tematy/Obsluga_plikow/plik.txt", "r") or die("Error: Nie można otworzyć pliku!");
echo fread($myfile, filesize("tematy/Obsluga_plikow/plik.txt"));
fclose($myfile);</code></pre>
<pre><code><?php 
$myfile = fopen("tematy/Obsluga_plikow/plik.txt", "r") or die("Error: Nie można otworzyć pliku!");
echo fread($myfile, filesize("tematy/Obsluga_plikow/plik.txt"));
fclose($myfile);
?></code></pre>
<p>Zadanie: Umieść plik user.txt w folderze z rozwiązaniami, zapisz w nim swoje imie i nazwisko, a następnie napisz kod który jedynie otworzy plik w trybie <?php randomByUsername(
['r'],
['r+'],
['w'],
['w+'],
['a'],
['a+'],
['x'],
['x+']
);?>.</p>