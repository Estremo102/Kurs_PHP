<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $tokeny = array_values(array_filter(token_get_all(file_get_contents($rozw)), fn($t) => !is_array($t) || !in_array($t[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT])));
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter($tokeny, 'is_array'), 0));
    // klucze odczytywane z $_GET, np. $_GET['imie']
    $klucze = [];
    foreach ($tokeny as $k => $token) {
        if (is_array($token) && $token[0] == T_VARIABLE && $token[1] == '$_GET' && ($tokeny[$k + 1] ?? null) === '['
            && is_array($tokeny[$k + 2] ?? null) && $tokeny[$k + 2][0] == T_CONSTANT_ENCAPSED_STRING) {
            $klucze[] = trim($tokeny[$k + 2][1], "\"'");
        }
    }
    $klucze = array_diff(array_unique($klucze), ['src', 'title', 'i']);
    if (!$klucze) {
        $komunikaty[] = "Nie odczytano nowej zmiennej z tablicy \$_GET, np. \$_GET['imie'] (zmienne src i title są już używane przez kurs)";
    } elseif (!$mozna_uruchomic) {
        $poprawne = true;
    } else {
        // podstawiamy własną wartość i sprawdzamy, czy zostanie wyświetlona
        $zapisane_get = $_GET;
        $wartosc = 'wartosc_testowa_' . mt_rand(1000, 9999);
        foreach ($klucze as $klucz) $_GET[$klucz] = $wartosc;
        [$inny_output] = $uruchom([]);
        $_GET = $zapisane_get;
        $poprawne = strpos($inny_output, $wartosc) !== false;
        if (!$poprawne) {
            $komunikaty[] = "Po ustawieniu w adresie " . htmlspecialchars(implode(", ", array_map(fn($k) => "$k=$wartosc", $klucze))) . " wartość nie została wyświetlona";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
