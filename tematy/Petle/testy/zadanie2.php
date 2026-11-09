<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $typy_tokenow = array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0);
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], $typy_tokenow);
    $linie = fn($tekst) => array_values(array_filter(array_map(fn($l) => trim(strip_tags($l)), preg_split('/<br\s*\/?>|\R/iu', $tekst)), 'strlen'));
    $oczekiwane = fn($x) => array_map('strval', $x > 8 ? [$x] : range($x, 8));
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, upewnij się, że korzystasz z echo";
    } elseif (!in_array(T_DO, $typy_tokenow)) {
        $komunikaty[] = "Użyj pętli do...while";
    } else {
        // $liczba została zmieniona przez pętlę, więc wylosowaną wartość odczytujemy z pierwszej wypisanej liczby
        $przypadki = [[(int)($linie($output)[0] ?? 0), $output]];
        if ($mozna_uruchomic) {
            foreach ([1, 5, 8, 9, 10] as $x) {
                [$inny_output] = $uruchom(['liczba' => $x]);
                $przypadki[] = [$x, $inny_output];
            }
        }
        $poprawne = true;
        foreach ($przypadki as [$x, $wynik]) {
            if ($linie($wynik) !== $oczekiwane($x)) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla \$liczba = $x. Otrzymano: " . htmlspecialchars(implode(", ", $linie($wynik))) . ", oczekiwano: " . implode(", ", $oczekiwane($x)) . " (każda liczba w osobnej linii)";
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
