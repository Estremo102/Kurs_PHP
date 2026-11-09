<?php
    // zwraca treść błędu kompilacji wyrażenia lub null, jeśli wyrażenie jest poprawne
    $blad_wyrazenia = function ($wyrazenie) {
        $blad = null;
        set_error_handler(function ($nr, $tresc) use (&$blad) {
            $blad = $tresc;
            return true;
        });
        $wynik = preg_match($wyrazenie, '');
        restore_error_handler();
        return $wynik === false ? preg_replace('/^preg_match\(\): /', '', $blad ?? preg_last_error_msg()) : null;
    };
    $oryginal = "/^tematy\/RegEx\/rozwiazania\//";
    $teksty = [
        "tematy/RegEx/rozwiazania/zadanie1.php",
        "tematy/RegEx/rozwiazania/",
        "tematy/RegEx/tresc/zadanie1_opis.php",
        "/tematy/RegEx/rozwiazania/zadanie1.php",
        "tematy/Petle/rozwiazania/zadanie1.php",
        "TEMATY/RegEx/rozwiazania/",
    ];
    if (!isset($nowy) || !is_string($nowy) || $nowy === '') {
        $komunikaty[] = "Nie utworzono zmiennej \$nowy z wyrażeniem regularnym";
    } elseif (!in_array($nowy[0], ['#', '~'])) {
        $komunikaty[] = "Wyrażenie powinno zaczynać się ogranicznikiem # lub ~, a zaczyna się znakiem " . htmlspecialchars($nowy[0]);
    } elseif (strpos($nowy, '\/') !== false) {
        $komunikaty[] = "Przy ograniczniku " . $nowy[0] . " slashe we wzorcu nie wymagają poprzedzania backslashem. Usuń \\ przed /";
    } elseif (($blad = $blad_wyrazenia($nowy)) !== null) {
        $komunikaty[] = "Wyrażenie " . htmlspecialchars($nowy) . " jest niepoprawne: " . htmlspecialchars($blad);
    } else {
        $poprawne = true;
        foreach ($teksty as $tekst) {
            if (preg_match($nowy, $tekst) !== preg_match($oryginal, $tekst)) {
                $poprawne = false;
                $komunikaty[] = "Dla tekstu \"$tekst\" nowe wyrażenie daje inny wynik niż \$stary (" . preg_match($nowy, $tekst) . " zamiast " . preg_match($oryginal, $tekst) . ")";
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
