<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0));
    $oczekiwany = fn($warunek) => $warunek ? "Warunek logiczny jest prawdziwy" : "";
    $przypadki = [[$warunek_logiczny, $output]];
    if ($mozna_uruchomic) {
        foreach ([true, false] as $x) {
            [$inny_output] = $uruchom(['warunek_logiczny' => $x]);
            $przypadki[] = [$x, $inny_output];
        }
    }
    $poprawne = true;
    foreach ($przypadki as [$x, $wynik]) {
        if (trim(strip_tags($wynik)) !== $oczekiwany($x)) {
            $poprawne = false;
            $komunikaty[] = "Wynik niepoprawny dla \$warunek_logiczny = " . var_export($x, true) . ". Oczekiwano: " . ($oczekiwany($x) ?: "brak napisu") . ", otrzymano: " . (htmlspecialchars($wynik) ?: "brak napisu");
            break;
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
