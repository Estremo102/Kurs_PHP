<?phpif (!isset($x_converted)) {
    $komunikaty[] = "Zmienna \$x_converted nie istnieje";
} else {
    if ($x_converted == (int)$x) {
        $poprawne = true;
        $komunikaty[] = "Zadanie wykonane poprawnie";
    } else {
        $komunikaty[] = "Błąd konwersji. Oczekiwano: ". (int)$x . ", otrzymano: ". $x_converted;
    }
}

return [
    'poprawne' => $poprawne,
    'komunikaty' => $komunikaty
];
?>