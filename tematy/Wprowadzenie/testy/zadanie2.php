<?php
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, upewnij się, że usunąłeś odpowiedni komentarz";
    } else {
        $poprawne = strtolower($output) == "21 = 3 • 7";
        if (!$poprawne) {
            $komunikaty[] = "Wypisano $output zamiast 21 = 3 • 7";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>