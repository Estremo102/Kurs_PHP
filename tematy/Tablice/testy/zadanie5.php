<?php
    $tokeny = array_values(array_filter(token_get_all(file_get_contents($rozw)), fn($t) => !is_array($t) || !in_array($t[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])));
    $wywolane = [];
    foreach ($tokeny as $k => $token) {
        if (is_array($token) && $token[0] == T_STRING && ($tokeny[$k + 1] ?? null) === '(') $wywolane[] = strtolower($token[1]);
        if ($token === '[' && ($tokeny[$k + 1] ?? null) === ']' && ($tokeny[$k + 2] ?? null) === '=') $wywolane[] = '[]';
    }
    $brakujace = array_diff(['[]', 'array_push', 'array_unshift', 'array_splice', 'array_merge'], $wywolane);
    if ($brakujace) {
        $komunikaty[] = "Nie przetestowano: " . implode(", ", $brakujace);
    } elseif (trim($output) == "") {
        $komunikaty[] = "Wyświetl zawartość tablicy po każdej operacji, np. za pomocą print_r()";
    } else {
        $poprawne = true;
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
