<?php
    if ($output == "") {
        $poprawne = false;
        $komunikaty[] = "Nie wypisano danych";
    } else {
        $oczekiwany = "Zmienna x wewnątrz funkcji wynosi: 5<br>Zmienna x na zewnątrz funkcji wynosi: 3";
        $poprawne = $output == $oczekiwany;
        if (!$poprawne) {
            $komunikaty[] = "Błąd! Wypisano: " . htmlspecialchars($output) . " zamiast Zmienna x wewnątrz funkcji wynosi: 5<br>Zmienna x na zewnątrz funkcji wynosi: 3";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>