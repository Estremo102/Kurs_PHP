<?php
    // ta sama funkcja, którą treść zadania wylosowała dla użytkownika
    $wylosowana = $funkcje[hexdec(substr(hash('sha256', get_current_user()), 0, 8)) % count($funkcje)];
    $nazwa = strtolower(strstr($wylosowana, '(', true));
    $tokeny = array_values(array_filter(token_get_all(file_get_contents($rozw)), fn($t) => !is_array($t) || !in_array($t[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])));
    $uzyto = false;
    foreach ($tokeny as $k => $token) {
        if (!is_array($token) || ($tokeny[$k + 1] ?? null) !== '(') continue;
        if (strtolower($token[1]) === $nazwa) $uzyto = true;
    }
    if (!$uzyto) {
        $komunikaty[] = "Nie użyto funkcji $nazwa(). Twoja wylosowana funkcja to: " . htmlspecialchars($wylosowana);
    } elseif (trim($output) == "") {
        $komunikaty[] = "Wyświetl wynik działania funkcji $nazwa(), np. za pomocą echo lub print_r()";
    } else {
        $poprawne = true;
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
