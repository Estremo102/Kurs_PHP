<?php
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, upewnij się, że korzystasz z echo";
    } else {
        $poprawne = strtolower($output) == "hello world!";
        if (!$poprawne) {
            $komunikaty[] = "Wypisano $output zamiast Hello world!";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>