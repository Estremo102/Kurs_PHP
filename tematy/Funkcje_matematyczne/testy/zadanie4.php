<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), "is_array"), 0));
    if (!isset($c)) {
        $komunikaty[] = "Nie utworzono zmiennej \$c";
    } else {
        $przypadki = [[$a, $b, $c]];
        if ($mozna_uruchomic) {
            foreach ([[5, 12], [1, 1], [8, 15]] as [$x, $y]) {
                [, $zmienne] = $uruchom(['a' => $x, 'b' => $y]);
                $przypadki[] = [$x, $y, $zmienne['c'] ?? null];
            }
        }
        $poprawne = true;
        foreach ($przypadki as [$x, $y, $wynik]) {
            $oczekiwany = sqrt($x ** 2 + $y ** 2);
            if (!is_numeric($wynik) || abs($wynik - $oczekiwany) > 1e-9) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla przyprostokątnych $x i $y. Oczekiwano: c = $oczekiwany, otrzymano: c = " . htmlspecialchars(var_export($wynik, true));
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
