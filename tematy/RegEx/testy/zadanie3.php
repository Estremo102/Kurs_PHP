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
    // ta sama opcja, którą treść zadania wylosowała dla użytkownika
    $opcja = $opcje_regex[hexdec(substr(hash('sha256', get_current_user()), 0, 8)) % count($opcje_regex)];
    if (!isset($wzorzec) || !is_string($wzorzec)) {
        $komunikaty[] = "Nie utworzono zmiennej \$wzorzec z wyrażeniem regularnym";
    } elseif (($blad = $blad_wyrazenia($wzorzec)) !== null) {
        $komunikaty[] = "Wyrażenie " . htmlspecialchars($wzorzec) . " jest niepoprawne: " . htmlspecialchars($blad);
    } else {
        $poprawne = true;
        foreach ([[$opcja['pasuje'], 1], [$opcja['nie_pasuje'], 0]] as [$teksty, $oczekiwane]) {
            foreach ($teksty as $tekst) {
                if (preg_match($wzorzec, $tekst) !== $oczekiwane) {
                    $poprawne = false;
                    $komunikaty[] = "Tekst \"" . htmlspecialchars($tekst) . "\" " . ($oczekiwane ? "powinien" : "nie powinien") . " pasować do wzorca. Twoje zadanie: " . $opcja['opis'] . ". Pamiętaj, że wzorzec ma dopasować cały tekst (^ i $)";
                    break 2;
                }
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
