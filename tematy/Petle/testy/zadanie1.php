<?php
    $typy_tokenow = array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0);
    $linie = array_values(array_filter(array_map(fn($l) => trim(strip_tags($l)), preg_split('/<br\s*\/?>|\R/iu', $output)), 'strlen'));
    $oczekiwane = array_map('strval', range(0, 90, 10));
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, upewnij się, że korzystasz z echo";
    } elseif (!in_array(T_WHILE, $typy_tokenow)) {
        $komunikaty[] = "Użyj pętli while";
    } else {
        $poprawne = $linie === $oczekiwane;
        if (!$poprawne) {
            $komunikaty[] = "Wynik niepoprawny. Otrzymano: " . htmlspecialchars(implode(", ", $linie)) . ", oczekiwano: " . implode(", ", $oczekiwane) . " (każda liczba w osobnej linii)";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
