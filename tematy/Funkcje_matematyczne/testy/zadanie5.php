<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), "is_array"), 0));
    $oczekiwany = fn($x) => "Liczba $x jest zaokrąglana " . (round($x) == intval($x) ? "w dół" : "w górę");
    $normalizuj = fn($tekst) => trim(preg_replace('/\s+/', ' ', strip_tags($tekst)));
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych";
    } else {
        $przypadki = [[$liczba, $output]];
        if ($mozna_uruchomic) {
            foreach ([7.5, 3.49, 0.86] as $x) {
                [$inny_output] = $uruchom(['liczba' => $x]);
                $przypadki[] = [$x, $inny_output];
            }
        }
        $poprawne = true;
        foreach ($przypadki as [$x, $wynik]) {
            if ($normalizuj($wynik) !== $oczekiwany($x)) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla \$liczba = $x. Oczekiwano: " . $oczekiwany($x) . ", otrzymano: " . htmlspecialchars($normalizuj($wynik));
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
