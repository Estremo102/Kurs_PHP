<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), "is_array"), 0));
    if (!isset($roznica_wieku)) {
        $komunikaty[] = "Nie utworzono zmiennej \$roznica_wieku";
    } else {
        $przypadki = [[$user_a, $user_b, $roznica_wieku]];
        if ($mozna_uruchomic) {
            foreach ([[9, 76], [30, 30], [18, 45]] as [$x, $y]) {
                [, $zmienne] = $uruchom(['user_a' => $x, 'user_b' => $y]);
                $przypadki[] = [$x, $y, $zmienne['roznica_wieku'] ?? null];
            }
        }
        $poprawne = true;
        foreach ($przypadki as [$x, $y, $wynik]) {
            if ($wynik != abs($x - $y)) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla wieku $x i $y. Oczekiwano: " . abs($x - $y) . ", otrzymano: " . htmlspecialchars(var_export($wynik, true));
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
