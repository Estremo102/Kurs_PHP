<?php
    $wymagane = [
        T_CLASS_C => '__CLASS__',
        T_DIR => '__DIR__',
        T_FILE => '__FILE__',
        T_FUNC_C => '__FUNCTION__',
        T_LINE => '__LINE__',
        T_METHOD_C => '__METHOD__',
        T_NS_C => '__NAMESPACE__',
        T_TRAIT_C => '__TRAIT__',
    ];
    $tokeny = array_values(array_filter(token_get_all(file_get_contents($rozw)), fn($t) => !is_array($t) || $t[0] != T_WHITESPACE));
    $uzyte = [];
    foreach ($tokeny as $k => $token) {
        if (!is_array($token)) continue;
        if (isset($wymagane[$token[0]])) $uzyte[] = $wymagane[$token[0]];
        if ($token[0] == T_DOUBLE_COLON && is_array($tokeny[$k + 1] ?? null) && $tokeny[$k + 1][0] == T_CLASS) $uzyte[] = 'ClassName::class';
    }
    $brakujace = array_diff([...$wymagane, 'ClassName::class'], $uzyte);
    $plik = realpath($rozw);
    if ($brakujace) {
        $komunikaty[] = "Nie wyświetlono stałych: " . implode(", ", $brakujace);
    } elseif (strpos($output, $plik) === false || strpos($output, dirname($plik)) === false) {
        $komunikaty[] = "W wyniku brakuje ścieżki pliku lub katalogu zwracanych przez __FILE__ i __DIR__. Upewnij się, że wyświetlasz wartości stałych";
    } else {
        $poprawne = true;
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
