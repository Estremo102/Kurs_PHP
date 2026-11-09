<?php
    $oryginal = ' KaMiLśLiMaK;kajak;a kanapa pana kota;Kobyła ma mały bok;Może jutro ta dama sama da tortu jeżom;Akta generała ma mała renegatka;Łapał za kran, a kanarka złapał ';
    $oczekiwane = [strtoupper(trim($oryginal)), mb_strtoupper(trim($oryginal))];
    $poprawne = true;
    if (!in_array($input, $oczekiwane, true)) {
        $poprawne = false;
        $komunikaty[] = "Zmienna \$input ma wartość '" . htmlspecialchars($input) . "', oczekiwano '" . $oczekiwane[1] . "'";
    }
    if (!isset($palindromy)) {
        $poprawne = false;
        $komunikaty[] = "Nie utworzono zmiennej \$palindromy";
    } elseif (!is_array($palindromy)) {
        $poprawne = false;
        $komunikaty[] = "Zmienna \$palindromy powinna być tablicą, a jest typu " . gettype($palindromy);
    } elseif ($palindromy !== explode(';', $input)) {
        $poprawne = false;
        $komunikaty[] = "Tablica \$palindromy powinna zawierać kolejne palindromy z \$input rozdzielone po znaku ;";
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
