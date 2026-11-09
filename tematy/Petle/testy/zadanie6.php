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
    // "123" może być uznane za liczbę (is_numeric) lub nie (is_int / is_float), obie wersje są poprawne
    $warianty = [fn($x) => is_int($x) || is_float($x), 'is_numeric'];
    $sprawdz = function ($input, $wynik, $liczby) use ($linie, $warianty) {
        foreach ($warianty as $czy_liczba) {
            $oczekiwane = array_values(array_filter($input, $czy_liczba));
            $oczekiwane_linie = array_map(fn($x) => "Liczba $x jest poprawna", $oczekiwane);
            if ($linie($wynik) === $oczekiwane_linie && is_array($liczby) && array_map('strval', $liczby) === array_map('strval', $oczekiwane)) {
                return true;
            }
        }
        return false;
    };
    $nowe_dane = [1, "a", 2.5, "7", false, null, [1, 2], -3];
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, upewnij się, że korzystasz z echo";
    } elseif (!in_array(T_FOREACH, $typy_tokenow) || !in_array(T_CONTINUE, $typy_tokenow)) {
        $komunikaty[] = "Użyj pętli foreach i instrukcji continue";
    } elseif (!isset($liczby) || !is_array($liczby)) {
        $komunikaty[] = "Nie utworzono tablicy \$liczby";
    } else {
        $przypadki = [[$input, $output, $liczby]];
        if ($mozna_uruchomic) {
            [$inny_output, $zmienne] = $uruchom(['input' => $nowe_dane]);
            $przypadki[] = [$nowe_dane, $inny_output, $zmienne['liczby'] ?? null];
        }
        $poprawne = true;
        foreach ($przypadki as [$dane_testu, $wynik, $tablica]) {
            if (!$sprawdz($dane_testu, $wynik, $tablica)) {
                $poprawne = false;
                $oczekiwane = array_values(array_filter($dane_testu, $warianty[0]));
                $komunikaty[] = "Wynik niepoprawny dla \$input = " . htmlspecialchars(json_encode($dane_testu)) . ". Wypisano: " . htmlspecialchars(implode(" | ", $linie($wynik))) . ", \$liczby = " . htmlspecialchars(json_encode($tablica)) . ". Oczekiwano np.: " . implode(" | ", array_map(fn($x) => "Liczba $x jest poprawna", $oczekiwane)) . " oraz \$liczby = " . json_encode($oczekiwane);
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
