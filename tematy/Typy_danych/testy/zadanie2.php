<?php
    $poprawne = true;
    $oczekiwane = [
        'len' => [strlen($tekst), mb_strlen($tekst)],
        'words' => [str_word_count($tekst), count(preg_split('/\s+/u', trim($tekst)))],
        'pos' => [strpos($tekst, 'że'), mb_strpos($tekst, 'że')],
    ];
    foreach ($oczekiwane as $nazwa => $wartosci) {
        if (!isset($$nazwa)) {
            $poprawne = false;
            $komunikaty[] = "Nie utworzono zmiennej \$$nazwa";
        } elseif (!in_array($$nazwa, $wartosci, true)) {
            $poprawne = false;
            $komunikaty[] = "Zmienna \$$nazwa ma wartość " . var_export($$nazwa, true) . ", oczekiwano " . implode(' lub ', array_unique($wartosci));
        }
    }
    if ($poprawne) {
        $oczekiwany_output = "$len $words $pos";
        if (trim($output) != $oczekiwany_output) {
            $poprawne = false;
            $komunikaty[] = "Wypisano " . htmlspecialchars($output) . " zamiast $oczekiwany_output";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
