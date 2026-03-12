<h3>łączenie i wydzielanie ciągów znaków</h3>
<p>Aby połączyć dwa ciągi znaków, możesz użyć operatora . lub interpolować zmienne wewnątrz podwójnego cudzysłowia "" wewnątrz którego wstawisz zmienne przykładowo "$x $y" lub $x . ' ' . $y</p>
<p>Z kolei funkcja substr() służy do wyodrębniania części ciągu znaków. wydzielanie ciągu znaków można zrobić na kilka sposobów</p>
<p>
    <ul>
        <li>
            substr(string, start, długość); <br>
            np: substr($x, 6, 4); <br>
            Pierwsza wartość to tekst, druga to litera od której zaczyna się wydzielany fragment tekstu, a trzecia określa długość wydzielanego ciągu znaków.
        </li>
        <li>
            substr(string, start); <br>
            substr($x, 6); <br>
            Pominięcie trzeciej wartości spowoduje wydzielenie tekstu do końca głównego ciągu znaków.
        </li>
        <li>
            substr(string, -start, długość); <br>
            echo substr($x, -5, 3); <br>
            Jeśli druga wartość jest ujemna, wtedy liczenie znaków zaczyna się od końca
        </li>
        <li>
            substr(string, start, -długość); <br>
            substr($x, 5, -3); <br>
            Jeśli trzecia wartość jest ujemna, określa ona ile ostatnich znaków zostanie pominiętych.
        </li>
    </ul>
    Funkcja substr ma problem z polskimi znakami, jeśli potrzebujesz obsługiwać znaki diakrytyczne użyj metody mb_substr();.
</p>
<p>Dane są zmienne imie i nazwisko, Twoim zadaniem jest wydzielenie 2 pierwszych liter z imienia, a z nazwiska dwie przedostatnie litery. Wydzielone ciągi znaków złącz w jeden ze znakiem - pomiędzy wydzielonymi ciągami znaków. Rezultat zapisz do zmiennej wynik.</p>
<?php 
    $imie = 'Mariusz';
    $nazwisko = 'Gwóźdź';
?>