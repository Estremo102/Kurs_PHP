<?php
if (!isset($x_converted)) {
    $komunikaty[] = "Zmienna \$x_converted nie istnieje";
} else {
    if ($x_converted == intval($x)) {
        $poprawne = true;
        $komunikaty[] = "Zadanie wykonane poprawnie";
    } else {
        $komunikaty[] = "Błąd konwersji. Oczekiwano: ". intval($x) . ", otrzymano: ". $x_converted;
    }
}
?>


