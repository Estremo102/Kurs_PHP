<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), "is_array"), 0));
    $sprawdz = function ($tablica, $output) use (&$komunikaty) {
        preg_match_all('/-?\d+(\.\d+)?/', preg_replace('/<[^>]*>/', ' ', $output), $liczby);
        $oczekiwane = [min($tablica), max($tablica)];
        if ($liczby[0] != $oczekiwane) {
            $komunikaty[] = "Dla tablicy [" . implode(", ", $tablica) . "] wypisano " . htmlspecialchars($output) . ", oczekiwano " . implode(" i ", $oczekiwane) . " (najpierw najmniejsza, potem największa wartość)";
            return false;
        }
        return true;
    };
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych";
    } else {
        $poprawne = $sprawdz($tablica, $output);
        if ($poprawne && $mozna_uruchomic) {
            $inna_tablica = [5, -3, 12, 0, 7];
            [$inny_output] = $uruchom(['tablica' => $inna_tablica]);
            $poprawne = $sprawdz($inna_tablica, $inny_output);
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
