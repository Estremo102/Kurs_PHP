<h3>Edycja ciągów znaków</h3>
<p>PHP ma zestaw wbudowanych funkcji, których można używać do modyfikacji ciągów znaków.</p>
<p>
    <ul>
        <li>Funkcja strtoupper('tekst') zwraca ciąg znaków zapisany wielkimi literami.</li>
        <li>Funkcja strtolower('TEKST') zwraca ciąg znaków zapisany małymi literami.</li>
        <li>Funkcja str_replace('stary tekst', 'nowy tekst', 'tekst do zmiany') zastępuje niektóre znaki w ciągu znaków innymi znakami.</li>
        <li>Funkcja strrev('kajak') odwraca ciąg znaków.</li>
        <li>Funkcja trim(' tekst ') usuwa wszelkie odstępy na początku lub na końcu tekstu. <br> (Spacja to odstęp przed i/lub po tekście, który bardzo często chcemy usunąć.)</li>
        <li>Funkcja explode('separator', 'tekst') dzieli ciąg znaków na tablicę.</li>
    </ul>
</p>
<p>Dana jest zmienna input. Znajdują się w niej palindromy oddzielone średnikami. Twoim zadaniem jest zmodyfikowanie jej tak by była napisana z samych wielkich liter, bez spacji na końcu i początku tekstu, a następnie utwórz zmienną palindromy w której znajdzie się tablica z osobnymi palindromami.</p>
<?php 
    $input = ' KaMiLśLiMaK;kajak;a kanapa pana kota;Kobyła ma mały bok;Może jutro ta dama sama da tortu jeżom;Akta generała ma mała renegatka;Łapał za kran, a kanarka złapał ';
?>
