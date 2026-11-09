<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    // ten sam klucz $_SERVER, który treść zadania wylosowała dla użytkownika
    $wylosowana = $zmienne_server[hexdec(substr(hash('sha256', get_current_user()), 0, 8)) % count($zmienne_server)];
    preg_match("/\['([A-Z_]+)'\]/", $wylosowana, $dopasowanie);
    $klucz = $dopasowanie[1];
    $tokeny = array_values(array_filter(token_get_all(file_get_contents($rozw)), fn($t) => !is_array($t) || !in_array($t[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])));
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter($tokeny, 'is_array'), 0));
    $odczytano_klucz = false;
    foreach ($tokeny as $k => $token) {
        if (is_array($token) && $token[0] == T_VARIABLE && $token[1] == '$_SERVER' && ($tokeny[$k + 1] ?? null) === '['
            && is_array($tokeny[$k + 2] ?? null) && trim($tokeny[$k + 2][1], "\"'") === $klucz) {
            $odczytano_klucz = true;
        }
    }
    if (!$odczytano_klucz) {
        $komunikaty[] = "Nie odczytano \$_SERVER['$klucz']";
    } elseif (!$mozna_uruchomic) {
        $poprawne = true;
    } else {
        // sprawdzamy oba przypadki: klucz istnieje i klucz nie istnieje
        $zapisany_server = $_SERVER;
        $wartosc = 'wartosc_testowa_' . mt_rand(1000, 9999);
        $_SERVER[$klucz] = $wartosc;
        [$output_istnieje] = $uruchom([]);
        unset($_SERVER[$klucz]);
        $ostrzezenia = [];
        set_error_handler(function ($nr, $tresc) use (&$ostrzezenia) {
            $ostrzezenia[] = $tresc;
            return true;
        });
        $uruchom([]);
        restore_error_handler();
        $_SERVER = $zapisany_server;
        if (strpos($output_istnieje, $wartosc) === false) {
            $komunikaty[] = "Gdy \$_SERVER['$klucz'] istnieje, jego wartość powinna zostać wyświetlona";
        } elseif ($ostrzezenia) {
            $komunikaty[] = "Gdy \$_SERVER['$klucz'] nie istnieje, kod wyświetla ostrzeżenie: " . htmlspecialchars($ostrzezenia[0]) . ". Sprawdź istnienie klucza, np. za pomocą isset()";
        } else {
            $poprawne = true;
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
