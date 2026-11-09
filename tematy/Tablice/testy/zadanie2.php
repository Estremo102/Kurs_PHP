<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $tokeny = array_values(array_filter(token_get_all(file_get_contents($rozw)), fn($t) => !is_array($t) || !in_array($t[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])));
    $typy_tokenow = array_column(array_filter($tokeny, 'is_array'), 0);
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], $typy_tokenow);
    $uzyto_count = false;
    foreach ($tokeny as $k => $token) {
        if (is_array($token) && $token[0] == T_STRING && in_array(strtolower($token[1]), ['count', 'sizeof']) && ($tokeny[$k + 1] ?? null) === '(') $uzyto_count = true;
    }
    $linie = fn($tekst) => array_values(array_filter(array_map(fn($l) => trim(strip_tags($l)), preg_split('/<br\s*\/?>|\R/iu', $tekst)), 'strlen'));
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, upewnij się, że korzystasz z echo";
    } elseif (!in_array(T_FOR, $typy_tokenow) || !$uzyto_count) {
        $komunikaty[] = "Użyj pętli for oraz funkcji count() do określenia liczby powtórzeń";
    } else {
        $przypadki = [[$tablica, $output]];
        if ($mozna_uruchomic) {
            [$inny_output] = $uruchom(['tablica' => ["Anna", "Ewa"]]);
            $przypadki[] = [["Anna", "Ewa"], $inny_output];
        }
        $poprawne = true;
        foreach ($przypadki as [$dane_testu, $wynik]) {
            if ($linie($wynik) !== $dane_testu) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla tablicy [" . implode(", ", $dane_testu) . "]. Otrzymano: " . htmlspecialchars(implode(", ", $linie($wynik))) . ". Każdy element wypisz w osobnej linii";
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
