<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $tokeny = array_values(array_filter(token_get_all(file_get_contents($rozw)), fn($t) => !is_array($t) || !in_array($t[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])));
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter($tokeny, 'is_array'), 0));
    $ustawiono_ciasteczko = false;
    foreach ($tokeny as $k => $token) {
        if (is_array($token) && $token[0] == T_STRING && strtolower($token[1]) == 'setcookie' && ($tokeny[$k + 1] ?? null) === '('
            && is_array($tokeny[$k + 2] ?? null) && trim($tokeny[$k + 2][1], "\"'") === 'uzytkownik') {
            $ustawiono_ciasteczko = true;
        }
    }
    // na serwerze sprawdzamy też czas ważności z wysłanego nagłówka (w CLI nagłówki nie są dostępne)
    $naglowek = current(array_filter(headers_list(), fn($n) => stripos($n, 'Set-Cookie: uzytkownik=') === 0));
    $czas_waznosci = $naglowek && preg_match('/Max-Age=(\d+)/i', $naglowek, $m) ? (int)$m[1] : null;
    $witaj = "Witaj, ";
    $brak = "Ciasteczko nie zostało jeszcze ustawione";
    if (!$ustawiono_ciasteczko) {
        $komunikaty[] = "Nie utworzono ciasteczka \"uzytkownik\" za pomocą setcookie()";
    } elseif ($naglowek && ($czas_waznosci === null || abs($czas_waznosci - 86400) > 60)) {
        $komunikaty[] = "Ciasteczko powinno być ważne 1 dzień (time() + 86400)";
    } elseif (!$mozna_uruchomic) {
        $poprawne = true;
    } else {
        // podstawiamy ciasteczko i sprawdzamy oba przypadki
        $zapisane_cookie = $_COOKIE;
        $_COOKIE['uzytkownik'] = 'Testowy';
        [$output_jest] = $uruchom([]);
        unset($_COOKIE['uzytkownik']);
        [$output_brak] = $uruchom([]);
        $_COOKIE = $zapisane_cookie;
        if (strpos($output_jest, $witaj . 'Testowy') === false) {
            $komunikaty[] = "Gdy ciasteczko uzytkownik ma wartość Testowy, powinien zostać wyświetlony napis \"{$witaj}Testowy\". Otrzymano: " . htmlspecialchars($output_jest);
        } elseif (strpos($output_brak, $brak) === false) {
            $komunikaty[] = "Gdy ciasteczka nie ma, powinien zostać wyświetlony napis \"$brak\". Otrzymano: " . htmlspecialchars($output_brak);
        } else {
            $poprawne = true;
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
