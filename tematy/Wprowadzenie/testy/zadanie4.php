<?php
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych";
    } else {
        $oczekiwany = 'array(5) { [0]=> int(5) [1]=> string(6) "Jasiek" [2]=> float(3.14) [3]=> bool(true) [4]=> NULL }';
        $clean_output = preg_replace('/\s+/', '', $output);
        $clean_oczekiwany = preg_replace('/\s+/', '', $oczekiwany);
        $poprawne = ($clean_output == $clean_oczekiwany);
        if (!$poprawne) {
            $komunikaty[] = "Wypisano $output zamiast wyniku var_dump na tablicy";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>