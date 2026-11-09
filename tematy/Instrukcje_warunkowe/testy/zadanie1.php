<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $tokeny = token_get_all(file_get_contents($rozw));
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter($tokeny, 'is_array'), 0));
    $oczekiwany = fn($A1) => $A1 > 50 ? "Zaliczono" : "Nie zaliczono";
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych";
    } elseif (!in_array('?', $tokeny, true)) {
        $komunikaty[] = "Użyj operatora trójargumentowego warunek ? wartość_gdy_true : wartość_gdy_false";
    } else {
        $przypadki = [[$A1, $output]];
        if ($mozna_uruchomic) {
            foreach ([0, 50, 51, 100] as $x) {
                [$inny_output] = $uruchom(['A1' => $x]);
                $przypadki[] = [$x, $inny_output];
            }
        }
        $poprawne = true;
        foreach ($przypadki as [$x, $wynik]) {
            if (trim(strip_tags($wynik)) !== $oczekiwany($x)) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla \$A1 = $x. Oczekiwano: " . $oczekiwany($x) . ", otrzymano: " . htmlspecialchars($wynik);
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
