<?php
    $tokeny = token_get_all(file_get_contents($rozw));
    $uzyto_rzutowania = false;
    $uzyto_intval = false;
    foreach ($tokeny as $token) {
        if (!is_array($token)) continue;
        if ($token[0] == T_INT_CAST) $uzyto_rzutowania = true;
        if ($token[0] == T_STRING && strtolower($token[1]) == 'intval') $uzyto_intval = true;
    }
    if (!isset($x_converted)) {
        $komunikaty[] = "Nie utworzono zmiennej \$x_converted";
    } elseif ($uzyto_intval || !$uzyto_rzutowania) {
        $komunikaty[] = "Użyj operatora rzutowania (int) zamiast funkcji intval()";
    } else {
        $poprawne = $x_converted === (int)$x;
        if (!$poprawne) {
            $komunikaty[] = "Błąd konwersji. Oczekiwano: " . (int)$x . " (int), otrzymano: " . htmlspecialchars(var_export($x_converted, true)) . " (" . gettype($x_converted) . ")";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
