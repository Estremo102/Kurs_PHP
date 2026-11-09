<?php
    if (!function_exists('oczyscTekst')) {
        $komunikaty[] = "Nie utworzono funkcji oczyscTekst";
    } else {
        $poprawne = true;
        $parametry = (new ReflectionFunction('oczyscTekst'))->getParameters();
        if (count($parametry) !== 1) {
            $poprawne = false;
            $komunikaty[] = "Funkcja oczyscTekst powinna przyjmować dokładnie 1 argument";
        } elseif (!$parametry[0]->isPassedByReference()) {
            $poprawne = false;
            $komunikaty[] = "Argument funkcji oczyscTekst powinien być przekazywany przez referencję (&)";
        }
        $testy = [
            ["   Ala   ma    Kota   ", "ala ma kota"],
            ["    TO   JEST   TEST    ", "to jest test"],
            ["bez zmian", "bez zmian"],
            ["      ", ""],
        ];
        foreach ($testy as [$wejscie, $oczekiwane]) {
            $tekst = $wejscie;
            try {
                oczyscTekst($tekst);
            } catch (Throwable $e) {
                $poprawne = false;
                $komunikaty[] = "Błąd podczas wywołania oczyscTekst dla '" . htmlspecialchars($wejscie) . "': " . htmlspecialchars($e->getMessage());
                continue;
            }
            if ($tekst !== $oczekiwane) {
                $poprawne = false;
                $komunikaty[] = "Błędny wynik dla <pre>'" . htmlspecialchars($wejscie) . "'</pre> Oczekiwano: <pre>'$oczekiwane'</pre> Otrzymano: <pre>" . htmlspecialchars(var_export($tekst, true)) . "</pre>";
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
