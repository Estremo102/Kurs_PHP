<?php
if (isset($c)) {
    if ($c == 5) {
        $poprawne = true;
        $komunikaty[] = "Zadanie wykonane poprawnie";
    } else {
        $komunikaty[] = "Wynik niepoprawny (3, 4)";
        $komunikaty[] = "Oczekiwane: c = 5, Otrzymane: c = ". $c;
    }
} else {
    $komunikaty[] = "Nie utworzono zmiennej \$c";
}
?>


