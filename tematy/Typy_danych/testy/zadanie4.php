<?php
    $oczekiwany = mb_substr($imie, 0, 2) . '-' . mb_substr($nazwisko, -3, 2);
    if (!isset($wynik)) {
        $komunikaty[] = "Nie utworzono zmiennej \$wynik";
    } else {
        $poprawne = $wynik === $oczekiwany;
        if (!$poprawne) {
            if (!mb_check_encoding((string)$wynik, 'UTF-8')) {
                $komunikaty[] = "Wynik zawiera uszkodzone polskie znaki, użyj funkcji mb_substr() zamiast substr()";
            } else {
                $komunikaty[] = "Zmienna \$wynik ma wartość " . htmlspecialchars($wynik) . " zamiast $oczekiwany";
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
