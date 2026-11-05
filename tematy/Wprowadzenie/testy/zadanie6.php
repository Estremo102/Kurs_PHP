<?php
    if ($output == "") {
        $poprawne = false;
        $komunikaty[] = "Nie wypisano danych";
    } else {
        $standardized_br = preg_replace('/<br\s*\/?>/i', "\n", $output);
        $clean_html = strip_tags($standardized_br);
        $clean_output = preg_replace('/[ \t]+/', '', $clean_html);
        $clean_output = trim($clean_output, "\r\n");
        $oczekiwany = "1\n3\n6";
        $poprawne = ($clean_output == $oczekiwany);
        if (!$poprawne) {
            $komunikaty[] = "Błąd! Wypisano: " . htmlspecialchars($output) . " – upewnij się, że liczby 1, 3, 6 są oddzielone znacznikami <br>.";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>