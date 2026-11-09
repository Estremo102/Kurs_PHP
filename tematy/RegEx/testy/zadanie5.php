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
    $zakazane = array_intersect(['trim', 'ltrim', 'rtrim', 'explode', 'implode', 'str_replace'], $wywolane);
    $oczekiwany = fn($tekst) => preg_replace('/ +/', ' ', preg_replace('/^ +| +$/', '', $tekst));
    if (!in_array('preg_replace', $wywolane)) {
        $komunikaty[] = "Użyj funkcji preg_replace()";
    } elseif ($zakazane) {
        $komunikaty[] = "Wykonaj zadanie za pomocą wyrażeń regularnych, bez funkcji: " . implode(", ", $zakazane);
    } elseif (!isset($oczyszczony)) {
        $komunikaty[] = "Nie utworzono zmiennej \$oczyszczony";
    } else {
        $przypadki = [[$tekst, $oczyszczony]];
        if ($mozna_uruchomic) {
            foreach (["  To   jest  test ", "bez zmian", "     "] as $inny_tekst) {
                [, $zmienne] = $uruchom(['tekst' => $inny_tekst]);
                $przypadki[] = [$inny_tekst, $zmienne['oczyszczony'] ?? null];
            }
        }
        $poprawne = true;
        foreach ($przypadki as [$dane_testu, $wynik]) {
            if ($wynik !== $oczekiwany($dane_testu)) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla <pre>'" . htmlspecialchars($dane_testu) . "'</pre> Oczekiwano: <pre>'" . htmlspecialchars($oczekiwany($dane_testu)) . "'</pre> Otrzymano: <pre>" . htmlspecialchars(var_export($wynik, true)) . "</pre>";
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
