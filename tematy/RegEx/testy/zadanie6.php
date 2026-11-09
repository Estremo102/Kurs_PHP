<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $tokeny = array_values(array_filter(token_get_all(file_get_contents($rozw)), fn($t) => !is_array($t) || !in_array($t[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])));
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter($tokeny, 'is_array'), 0));
    $wywolane = [];
    foreach ($tokeny as $k => $token) {
        if (is_array($token) && $token[0] == T_STRING && ($tokeny[$k + 1] ?? null) === '(') $wywolane[] = strtolower($token[1]);
    }
    $oczekiwane_owoce = fn($lista) => preg_split('/[,;\s]+/', $lista, -1, PREG_SPLIT_NO_EMPTY);
    $oczekiwane_na_a = fn($lista) => array_values(preg_grep('/a$/', $oczekiwane_owoce($lista)));
    if (!in_array('preg_split', $wywolane) || !in_array('preg_grep', $wywolane)) {
        $komunikaty[] = "Użyj funkcji preg_split() oraz preg_grep()";
    } elseif (!isset($owoce, $na_a) || !is_array($owoce) || !is_array($na_a)) {
        $komunikaty[] = "Nie utworzono tablic \$owoce i \$na_a";
    } else {
        $przypadki = [[$lista, $owoce, $na_a]];
        if ($mozna_uruchomic) {
            $inna_lista = "kiwi;mango,,cytryna   limonka";
            [, $zmienne] = $uruchom(['lista' => $inna_lista]);
            $przypadki[] = [$inna_lista, $zmienne['owoce'] ?? null, $zmienne['na_a'] ?? null];
        }
        $poprawne = true;
        foreach ($przypadki as [$dane_testu, $wynik_owoce, $wynik_na_a]) {
            if (!is_array($wynik_owoce) || array_values($wynik_owoce) !== $oczekiwane_owoce($dane_testu)) {
                $poprawne = false;
                $komunikaty[] = "Niepoprawna tablica \$owoce dla listy \"$dane_testu\". Oczekiwano: " . htmlspecialchars(json_encode($oczekiwane_owoce($dane_testu), JSON_UNESCAPED_UNICODE)) . ", otrzymano: " . htmlspecialchars(json_encode($wynik_owoce, JSON_UNESCAPED_UNICODE)) . ". Pamiętaj o usunięciu pustych elementów";
                break;
            }
            if (!is_array($wynik_na_a) || array_values($wynik_na_a) !== $oczekiwane_na_a($dane_testu)) {
                $poprawne = false;
                $komunikaty[] = "Niepoprawna tablica \$na_a dla listy \"$dane_testu\". Oczekiwano: " . htmlspecialchars(json_encode($oczekiwane_na_a($dane_testu), JSON_UNESCAPED_UNICODE)) . ", otrzymano: " . htmlspecialchars(json_encode($wynik_na_a, JSON_UNESCAPED_UNICODE));
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
