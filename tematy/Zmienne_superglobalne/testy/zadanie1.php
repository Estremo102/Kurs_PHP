<?php
    // ta sama zmienna, którą treść zadania wylosowała dla użytkownika
    $wylosowana = $superglobalne[hexdec(substr(hash('sha256', get_current_user()), 0, 8)) % count($superglobalne)];
    $tokeny = array_values(array_filter(token_get_all(file_get_contents($rozw)), fn($t) => !is_array($t) || !in_array($t[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])));
    $petla_po_zmiennej = false;
    $wywolane = [];
    foreach ($tokeny as $k => $token) {
        if (!is_array($token)) continue;
        if ($token[0] == T_FOREACH && ($tokeny[$k + 1] ?? null) === '(' && is_array($tokeny[$k + 2] ?? null) && $tokeny[$k + 2][1] === $wylosowana) $petla_po_zmiennej = true;
        if ($token[0] == T_STRING && ($tokeny[$k + 1] ?? null) === '(') $wywolane[] = strtolower($token[1]);
    }
    if (!$petla_po_zmiennej) {
        $komunikaty[] = "Przejdź pętlą foreach po zmiennej $wylosowana, np. foreach ($wylosowana as \$klucz => \$wartosc)";
    } elseif (!in_array('var_dump', $wywolane)) {
        $komunikaty[] = "Wyświetl zawartość za pomocą funkcji var_dump()";
    } elseif ($wylosowana === '$_SESSION' && !in_array('session_start', $wywolane)) {
        $komunikaty[] = "Przed odczytaniem \$_SESSION uruchom sesję za pomocą session_start()";
    } else {
        $poprawne = true;
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
