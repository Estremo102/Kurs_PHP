<?php
    $typy_tokenow = array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0);
    $oczekiwane = [];
    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= 5; $j++) {
            $oczekiwane[] = $i * $j;
        }
    }
    if (count(array_keys($typy_tokenow, T_FOR)) < 2) {
        $komunikaty[] = "Użyj dwóch zagnieżdżonych pętli for";
    } elseif (!isset($wyniki) || !is_array($wyniki)) {
        $komunikaty[] = "Nie utworzono tablicy \$wyniki";
    } else {
        $poprawne = $wyniki == $oczekiwane;
        if (!$poprawne) {
            $komunikaty[] = "Niepoprawna zawartość tablicy \$wyniki. Otrzymano: " . htmlspecialchars(implode(", ", array_map('json_encode', $wyniki))) . ", oczekiwano: " . implode(", ", $oczekiwane);
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
