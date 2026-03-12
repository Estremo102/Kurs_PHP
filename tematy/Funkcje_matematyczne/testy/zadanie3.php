<?php
if (isset($roznica_wieku)) {
    if (abs($user_a - $user_b) == $roznica_wieku) {
        $poprawne = true;
        $komunikaty[] = "Zadanie wykonane poprawnie";
    } else {
        $komunikaty[] = "Wynik niepoprawny dla testu (76, 9)";
        $komunikaty[] = "Oczekiwane: ". abs($user_a - $user_b) . ", Otrzymane: ". $roznica_wieku;
    }
} else {
    $komunikaty[] = "Nie utworzono zmiennej \$roznica_wieku";
}
?>


