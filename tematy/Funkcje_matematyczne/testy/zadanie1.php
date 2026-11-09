<?php
    $poprawne = true;
    if (!isset($r) || $r != 5) {
        $poprawne = false;
        $komunikaty[] = "Nie utworzono zmiennej \$r o wartości 5";
    }
    if (!isset($pole_kola)) {
        $poprawne = false;
        $komunikaty[] = "Nie utworzono zmiennej \$pole_kola";
    } elseif (!is_numeric($pole_kola) || abs($pole_kola - pi() * 5 ** 2) > 1e-9) {
        $poprawne = false;
        $komunikaty[] = "Zmienna \$pole_kola ma wartość " . htmlspecialchars(var_export($pole_kola, true)) . ", oczekiwano " . pi() * 5 ** 2 . ". Upewnij się, że używasz funkcji pi()";
    } else {
        $oczekiwany = "pole koła o promieniu 5 wynosi $pole_kola";
        if (mb_strtolower(trim($output)) != $oczekiwany) {
            $poprawne = false;
            $komunikaty[] = "Wypisano " . htmlspecialchars($output) . " zamiast $oczekiwany";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
