<?php
    $tokeny = array_values(array_filter(token_get_all(file_get_contents($rozw)), fn($t) => !is_array($t) || !in_array($t[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])));
    $const_name = false;
    $define_greeting = false;
    foreach ($tokeny as $k => $token) {
        if (!is_array($token)) continue;
        if ($token[0] == T_CONST && is_array($tokeny[$k + 1] ?? null) && $tokeny[$k + 1][1] == 'NAME') {
            $const_name = true;
        }
        if ($token[0] == T_STRING && strtolower($token[1]) == 'define' && is_array($tokeny[$k + 2] ?? null) && trim($tokeny[$k + 2][1], "\"'") == 'GREETING') {
            $define_greeting = true;
        }
    }
    $poprawne = true;
    if (!defined('NAME') || !$const_name) {
        $poprawne = false;
        $komunikaty[] = "Nie utworzono stałej NAME za pomocą słowa kluczowego const";
    }
    if (!defined('GREETING') || !$define_greeting) {
        $poprawne = false;
        $komunikaty[] = "Nie utworzono stałej GREETING za pomocą funkcji define() wewnątrz funkcji myTest()";
    }
    if ($poprawne && trim($output) !== GREETING . NAME) {
        $poprawne = false;
        $komunikaty[] = "Wypisano " . htmlspecialchars($output) . " zamiast " . htmlspecialchars(GREETING . NAME);
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
