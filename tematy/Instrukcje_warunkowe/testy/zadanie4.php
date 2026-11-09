<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0));
    $oczekiwany = fn($x) => $x < 21 ? "$x jest mniejsza od 21" : ($x == 21 ? "$x jest równa 21" : "$x jest większa od 21");
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych";
    } else {
        $przypadki = [[$liczba, $output]];
        if ($mozna_uruchomic) {
            foreach ([11, 20, 21, 22, 31] as $x) {
                [$inny_output] = $uruchom(['liczba' => $x]);
                $przypadki[] = [$x, $inny_output];
            }
        }
        $poprawne = true;
        foreach ($przypadki as [$x, $wynik]) {
            if (trim(strip_tags($wynik)) !== $oczekiwany($x)) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla \$liczba = $x. Oczekiwano: " . $oczekiwany($x) . ", otrzymano: " . htmlspecialchars($wynik);
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
