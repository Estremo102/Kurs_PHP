<?php
    $wymagane = [
        'string' => 'is_string',
        'integer' => 'is_int',
        'float' => 'is_float',
        'boolean' => 'is_bool',
        'array' => 'is_array',
    ];
    $poprawne = true;
    foreach ($wymagane as $nazwa => $sprawdz) {
        if (!isset($$nazwa)) {
            $poprawne = false;
            $komunikaty[] = "Nie utworzono zmiennej \$$nazwa";
        } elseif (!$sprawdz($$nazwa)) {
            $poprawne = false;
            $komunikaty[] = "Zmienna \$$nazwa jest typu " . gettype($$nazwa) . ", a powinna być typu $nazwa";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
