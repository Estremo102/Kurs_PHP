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
    $pasuje = ["Twoja ocena: 5", "OCENA: 1", "Ocena: 6!", "ocena: 3 z matematyki"];
    $nie_pasuje = ["ocena: 7", "ocena: 0", "ocena 5", "ocena: x", "Twoja ocena to: 4"];
    if (!isset($wzorzec) || !is_string($wzorzec)) {
        $komunikaty[] = "Nie utworzono zmiennej \$wzorzec z wyrażeniem regularnym";
    } elseif (($blad = $blad_wyrazenia($wzorzec)) !== null) {
        $komunikaty[] = "Wyrażenie " . htmlspecialchars($wzorzec) . " jest niepoprawne: " . htmlspecialchars($blad);
    } else {
        $poprawne = true;
        foreach ([[$pasuje, 1], [$nie_pasuje, 0]] as [$teksty, $oczekiwane]) {
            foreach ($teksty as $tekst) {
                if (preg_match($wzorzec, $tekst) !== $oczekiwane) {
                    $poprawne = false;
                    $komunikaty[] = "Tekst \"$tekst\" " . ($oczekiwane ? "powinien" : "nie powinien") . " pasować do wzorca";
                    break 2;
                }
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
