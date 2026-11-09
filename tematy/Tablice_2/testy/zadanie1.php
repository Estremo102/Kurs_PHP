<?php
    $oryginal_indeksowana = [1, 4, 2, "2", 2, 95, "A"];
    // kolejność kluczy w danych jest dobrana tak, żeby żadne sortowanie nie zostawiało tablicy bez zmian
    $oryginal_asocjacyjna = ["brand" => "Ford", "year" => 1964, "model" => "Mustang"];
    // dopuszczalne są sortowania rosnące i malejące
    $warianty = function ($tablica, $funkcje) {
        $wyniki = [];
        foreach ($funkcje as $funkcja) {
            $kopia = $tablica;
            $funkcja($kopia);
            $wyniki[$funkcja] = $kopia;
        }
        return $wyniki;
    };
    $poprawne = true;
    if (!in_array($indeksowana, $warianty($oryginal_indeksowana, ['sort', 'rsort']), true)) {
        $poprawne = false;
        $komunikaty[] = "Tablica \$indeksowana nie jest posortowana. Użyj funkcji do sortowania tablic indeksowanych (sort lub rsort). Otrzymano: " . htmlspecialchars(json_encode($indeksowana));
    }
    $sortowania_asocjacyjne = $warianty($oryginal_asocjacyjna, ['asort', 'arsort', 'ksort', 'krsort']);
    if (!in_array($asocjacyjna, $sortowania_asocjacyjne, true)) {
        $poprawne = false;
        $komunikaty[] = $asocjacyjna == $oryginal_asocjacyjna && array_keys($asocjacyjna) !== array_keys($oryginal_asocjacyjna)
            ? "Tablica \$asocjacyjna jest posortowana w nieoczekiwanej kolejności"
            : "Tablica \$asocjacyjna nie jest posortowana lub utraciła klucze. Użyj funkcji, która zachowuje klucze (asort, arsort, ksort lub krsort). Otrzymano: " . htmlspecialchars(json_encode($asocjacyjna));
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
