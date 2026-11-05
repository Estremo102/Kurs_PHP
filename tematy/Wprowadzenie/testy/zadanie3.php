<?php
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych";
    } else {
        $poprawne = $output == "2";
        if (!$poprawne) {
            $komunikaty[] = "Wypisano $output zamiast wyniku 2 + '2' - 2";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>