<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0));
    $sprawdz = function ($output, $zmienne) use (&$komunikaty) {
        $a = $zmienne['a'] ?? null;
        $b = $zmienne['b'] ?? null;
        $c = $zmienne['c'] ?? null;
        if (!is_int($a) || !is_int($b) || $a < 5 || $a > 15 || $b < 5 || $b > 15) {
            $komunikaty[] = "Zmienne \$a i \$b powinny mieć losowe wartości od 5 do 15, otrzymano: \$a = " . var_export($a, true) . ", \$b = " . var_export($b, true);
            return false;
        }
        if ($a == $b) {
            $oczekiwany = "Wygrano nagrodę główną";
        } elseif (!is_int($c) || $c < 10 || $c > 30) {
            $komunikaty[] = "Gdy \$a i \$b są różne, zmienna \$c powinna mieć losową wartość od 10 do 30, otrzymano: \$c = " . var_export($c, true);
            return false;
        } else {
            $oczekiwany = $a + $b > $c ? "Wygrano nagrodę pocieszenia" : "Niestety nie tym razem";
        }
        if (trim(strip_tags($output)) !== $oczekiwany) {
            $komunikaty[] = "Wynik niepoprawny dla \$a = $a, \$b = $b" . ($a == $b ? "" : ", \$c = $c") . ". Oczekiwano: $oczekiwany, otrzymano: " . htmlspecialchars($output);
            return false;
        }
        return true;
    };
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych";
    } else {
        $poprawne = $sprawdz($output, get_defined_vars());
        $wylosowane = [[$a ?? null, $b ?? null]];
        // kolejne losowania z ustalonym ziarnem, żeby sprawdzić wszystkie gałęzie
        for ($ziarno = 1; $poprawne && $mozna_uruchomic && $ziarno <= 50; $ziarno++) {
            mt_srand($ziarno);
            [$inny_output, $zmienne] = $uruchom([]);
            $poprawne = $sprawdz($inny_output, $zmienne);
            $wylosowane[] = [$zmienne['a'] ?? null, $zmienne['b'] ?? null];
        }
        if ($poprawne && $mozna_uruchomic && count(array_unique(array_map('serialize', $wylosowane))) < 2) {
            $poprawne = false;
            $komunikaty[] = "Wartości \$a i \$b są za każdym razem takie same, użyj funkcji rand()";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
