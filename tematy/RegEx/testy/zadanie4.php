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
    $oczekiwane = fn($tekst) => [preg_match_all('/\d+/', $tekst), preg_match('/\b\d{4}\b/', $tekst)];
    if (!in_array('preg_match_all', $wywolane) || !in_array('preg_match', $wywolane)) {
        $komunikaty[] = "Użyj funkcji preg_match_all() oraz preg_match()";
    } elseif (!isset($ile_liczb) || !isset($czy_rok)) {
        $komunikaty[] = "Nie utworzono zmiennych \$ile_liczb i \$czy_rok";
    } else {
        $przypadki = [[$tekst, $ile_liczb, $czy_rok]];
        if ($mozna_uruchomic) {
            foreach (["Brak liczb w tym zdaniu.", "Mam 2 koty i 12345 rybek.", "Lata 1999 i 2024 oraz 7 dni."] as $inny_tekst) {
                [, $zmienne] = $uruchom(['tekst' => $inny_tekst]);
                $przypadki[] = [$inny_tekst, $zmienne['ile_liczb'] ?? null, $zmienne['czy_rok'] ?? null];
            }
        }
        $poprawne = true;
        foreach ($przypadki as [$dane_testu, $ile, $rok]) {
            [$oczekiwane_ile, $oczekiwany_rok] = $oczekiwane($dane_testu);
            if ($ile != $oczekiwane_ile || (int)$rok !== $oczekiwany_rok) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla tekstu \"$dane_testu\". Oczekiwano: \$ile_liczb = $oczekiwane_ile, \$czy_rok = $oczekiwany_rok, otrzymano: \$ile_liczb = " . htmlspecialchars(var_export($ile, true)) . ", \$czy_rok = " . htmlspecialchars(var_export($rok, true)) . ". Liczba czterocyfrowa to dokładnie 4 cyfry, nie część dłuższej liczby";
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
