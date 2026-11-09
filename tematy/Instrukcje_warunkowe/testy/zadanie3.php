<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0));
    $oczekiwany = fn($a, $b, $c) => !($a < $b && $b < $c) ? "wylosowane liczby nie są ciągiem rosnącym" : "";
    $przypadki = [[$a, $b, $c, $output]];
    if ($mozna_uruchomic) {
        foreach ([[1, 2, 3], [3, 2, 1], [1, 3, 2], [2, 1, 3], [2, 2, 3], [1, 2, 2]] as [$x, $y, $z]) {
            [$inny_output] = $uruchom(['a' => $x, 'b' => $y, 'c' => $z]);
            $przypadki[] = [$x, $y, $z, $inny_output];
        }
    }
    $poprawne = true;
    foreach ($przypadki as [$x, $y, $z, $wynik]) {
        if (trim(strip_tags($wynik)) !== $oczekiwany($x, $y, $z)) {
            $poprawne = false;
            $komunikaty[] = "Wynik niepoprawny dla \$a = $x, \$b = $y, \$c = $z. Oczekiwano: " . ($oczekiwany($x, $y, $z) ?: "brak napisu") . ", otrzymano: " . (htmlspecialchars($wynik) ?: "brak napisu");
            break;
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
