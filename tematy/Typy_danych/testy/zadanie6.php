<?php
    $wymagane = [
        'int' => ['is_int', 'liczbą całkowitą (int)'],
        'f' => ['is_float', 'liczbą zmiennoprzecinkową (float)'],
        'inf' => [fn($v) => is_float($v) && is_infinite($v), 'nieskończonością (INF)'],
        'nan' => [fn($v) => is_float($v) && is_nan($v), 'wartością NAN'],
        'number' => [fn($v) => is_string($v) && is_numeric($v), 'ciągiem liczbowym (string z liczbą)'],
    ];
    $poprawne = true;
    foreach ($wymagane as $nazwa => [$sprawdz, $opis]) {
        if (!isset($$nazwa)) {
            $poprawne = false;
            $komunikaty[] = "Nie utworzono zmiennej \$$nazwa";
        } elseif (!$sprawdz($$nazwa)) {
            $poprawne = false;
            $komunikaty[] = "Zmienna \$$nazwa powinna być $opis, a ma wartość " . htmlspecialchars(var_export($$nazwa, true));
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
