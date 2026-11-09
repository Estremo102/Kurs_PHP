<?php
    $stale_tablicowe = array_filter(get_defined_constants(true)['user'] ?? [], 'is_array');
    $komentarze = '';
    foreach (token_get_all(file_get_contents($rozw)) as $token) {
        if (is_array($token) && in_array($token[0], [T_COMMENT, T_DOC_COMMENT])) $komentarze .= $token[1] . "\n";
    }
    if (!$stale_tablicowe) {
        $komunikaty[] = "Nie utworzono stałej tablicowej";
    } else {
        $nazwy = implode('|', array_map('preg_quote', array_keys($stale_tablicowe)));
        $poprawne = true;
        if (!preg_match('/\b(' . $nazwy . ')\s*\[[^\]]*\]\s*=(?!=)/', $komentarze)) {
            $poprawne = false;
            $komunikaty[] = "Nie znaleziono zakomentowanej próby zmiany komórki stałej, np. // " . array_key_first($stale_tablicowe) . "[0] = \"nowa wartość\";";
        }
        $wyswietlono = false;
        foreach ($stale_tablicowe as $tablica) {
            foreach ($tablica as $element) {
                if (is_scalar($element) && (string)$element !== '' && strpos($output, (string)$element) !== false) $wyswietlono = true;
            }
        }
        if (!$wyswietlono) {
            $poprawne = false;
            $komunikaty[] = "Nie wyświetlono żadnej komórki stałej tablicowej";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
