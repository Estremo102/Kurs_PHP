<?php
    $poprawne = true;
    if (!isset($pi) || $pi != 3.14) {
        $poprawne = false;
        $komunikaty[] = "Nie utworzono zmiennej \$pi o wartości 3.14";
    }
    if (!isset($miasto) || $miasto !== 'Zakopane') {
        $poprawne = false;
        $komunikaty[] = "Nie utworzono zmiennej \$miasto o wartości \"Zakopane\"";
    }
    $oczekiwany = 'Zmienna $pi wynosi 3.14, zmienna $miasto ma przypisaną wartość "Zakopane".';
    if ($output == "") {
        $poprawne = false;
        $komunikaty[] = "Nie wypisano danych";
    } elseif (trim($output) != $oczekiwany) {
        $poprawne = false;
        $komunikaty[] = "Wypisano " . htmlspecialchars($output) . " zamiast " . htmlspecialchars($oczekiwany);
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
