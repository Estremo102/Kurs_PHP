<?php
    if (!function_exists('obwodTrojkata')) {
        $komunikaty[] = "Nie utworzono funkcji obwodTrojkata";
    } else {
        $bledne_dane = "Błędne dane wejściowe";
        $niemozliwy = "Z podanych boków nie da się zbudować trójkąta";
        // [boki, oczekiwany wynik, oczekiwany komunikat]
        $testy = [
            [[3, 4, 5], 12, null],
            [[5, 5, 5], 15, null],
            [[6, 8, 10], 24, null],
            [[2.5, 3, 4], 9.5, null],
            [[1, 1, 2], -2, $niemozliwy],
            [[1, 2, 3], -2, $niemozliwy],
            [[10, 2, 3], -2, $niemozliwy],
            [[0, 3, 4], -1, $bledne_dane],
            [[3, -1, 4], -1, $bledne_dane],
            [[3, 4, -2.5], -1, $bledne_dane],
        ];
        $poprawne = true;
        foreach ($testy as [$boki, $oczekiwane, $komunikat]) {
            $opis = "obwodTrojkata(" . implode(", ", $boki) . ")";
            ob_start();
            try {
                $otrzymane = obwodTrojkata(...$boki);
            } catch (Throwable $e) {
                ob_end_clean();
                $poprawne = false;
                $komunikaty[] = "Błąd podczas wywołania $opis: " . htmlspecialchars($e->getMessage());
                continue;
            }
            $wypisane = ob_get_clean();
            if (!is_numeric($otrzymane) || abs($otrzymane - $oczekiwane) > 1e-9) {
                $poprawne = false;
                $komunikaty[] = "Błędny wynik dla $opis. Oczekiwano: $oczekiwane, otrzymano: " . htmlspecialchars(var_export($otrzymane, true));
            } elseif ($komunikat !== null && strpos($wypisane, $komunikat) === false) {
                $poprawne = false;
                $komunikaty[] = "Dla $opis nie wyświetlono komunikatu \"$komunikat\"";
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
