<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), "is_array"), 0));
    $wygrana = "Ten kibel jest twój i mój!";
    $przegrana = "Każdy człowiek jest pazerny i to jest to, a może się uda.";
    $sprawdz = function ($output) use ($wygrana, $przegrana, &$komunikaty) {
        preg_match_all('/kostka([1-6])\.png/', $output, $kostki);
        $kostki = $kostki[1];
        if (count($kostki) != 3) {
            $komunikaty[] = "Wyświetlono " . count($kostki) . " kostek zamiast 3. Użyj obrazków images/kostki/kostka{liczba}.png";
            return false;
        }
        $niskie = count(array_filter($kostki, fn($k) => $k <= 3));
        $jest_wygrana = strpos($output, $wygrana) !== false;
        $jest_przegrana = strpos($output, $przegrana) !== false;
        if ($jest_wygrana == $jest_przegrana) {
            $komunikaty[] = "Wypisz dokładnie jeden z komunikatów: \"$wygrana\" lub \"$przegrana\"";
            return false;
        }
        // 3 niskie wyniki: dopuszczalna interpretacja "dokładnie 2 razy" i "co najmniej 2 razy"
        if ($niskie == 3 || ($niskie == 2) == $jest_przegrana) {
            return true;
        }
        $komunikaty[] = "Wylosowano " . implode(", ", $kostki) . ", więc powinien pojawić się napis \"" . ($niskie == 2 ? $przegrana : $wygrana) . "\"";
        return false;
    };
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych";
    } else {
        $poprawne = $sprawdz($output);
        // kolejne rzuty z ustalonym ziarnem, żeby sprawdzić różne wyniki losowania
        for ($ziarno = 1; $poprawne && $mozna_uruchomic && $ziarno <= 20; $ziarno++) {
            mt_srand($ziarno);
            [$inny_output] = $uruchom([]);
            $poprawne = $sprawdz($inny_output);
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
