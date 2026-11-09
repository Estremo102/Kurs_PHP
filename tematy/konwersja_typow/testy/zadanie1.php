<?php
    if (!isset($x_converted)) {
        $komunikaty[] = "Nie utworzono zmiennej \$x_converted";
    } else {
        $poprawne = $x_converted === intval($x);
        if (!$poprawne) {
            $komunikaty[] = "Błąd konwersji. Oczekiwano: " . intval($x) . " (int), otrzymano: " . htmlspecialchars(var_export($x_converted, true)) . " (" . gettype($x_converted) . ")";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
