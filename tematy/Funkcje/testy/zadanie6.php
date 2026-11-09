<?php
    if (!function_exists('sredniaOrazMediana')) {
        $komunikaty[] = "Nie utworzono funkcji sredniaOrazMediana";
    } else {
        $poprawne = true;
        $funkcja = new ReflectionFunction('sredniaOrazMediana');
        $parametry = $funkcja->getParameters();
        $typ = fn($t) => $t instanceof ReflectionNamedType ? $t->getName() : null;
        if (count($parametry) !== 2) {
            $poprawne = false;
            $komunikaty[] = "Funkcja sredniaOrazMediana powinna przyjmować dokładnie 2 parametry: float &\$srednia, int ...\$liczby";
        } else {
            [$pierwszy, $drugi] = $parametry;
            if (!$pierwszy->isPassedByReference()) {
                $poprawne = false;
                $komunikaty[] = "Pierwszy parametr musi być przekazywany przez referencję (&)";
            }
            if ($typ($pierwszy->getType()) !== 'float') {
                $poprawne = false;
                $komunikaty[] = "Pierwszy parametr powinien mieć typ float";
            }
            if (!$drugi->isVariadic()) {
                $poprawne = false;
                $komunikaty[] = "Drugi parametr powinien przyjmować zmienną liczbę argumentów (...\$liczby)";
            }
            if ($typ($drugi->getType()) !== 'int') {
                $poprawne = false;
                $komunikaty[] = "Parametry o zmiennej liczbie argumentów powinny mieć typ int";
            }
        }
        if ($typ($funkcja->getReturnType()) !== 'int') {
            $poprawne = false;
            $komunikaty[] = "Funkcja sredniaOrazMediana powinna mieć typ zwracany int";
        }
        // [liczby, średnia, mediana]
        $testy = [
            [[1, 2, 3, 4, 5], 3.0, 3],
            [[10, 2, 8, 4], 6.0, 6],
            [[1, 2, 3, 4], 2.5, 3],
            [[7], 7.0, 7],
            [[-5, -1, -3, -7], -4.0, -4],
            [[9, 1, 5], 5.0, 5],
        ];
        foreach ($testy as [$liczby, $oczekiwana_srednia, $oczekiwana_mediana]) {
            $srednia = -999.0;
            $opis = implode(", ", $liczby);
            try {
                $mediana = sredniaOrazMediana($srednia, ...$liczby);
            } catch (Throwable $e) {
                $poprawne = false;
                $komunikaty[] = "Błąd podczas wywołania sredniaOrazMediana(\$srednia, $opis): " . htmlspecialchars($e->getMessage());
                continue;
            }
            if ($mediana !== $oczekiwana_mediana) {
                $poprawne = false;
                $komunikaty[] = "Błędna mediana dla ($opis). Oczekiwano: $oczekiwana_mediana, otrzymano: " . htmlspecialchars(var_export($mediana, true));
            }
            if (abs($srednia - $oczekiwana_srednia) > 1e-6) {
                $poprawne = false;
                $komunikaty[] = "Błędna średnia zapisana przez referencję dla ($opis). Oczekiwano: $oczekiwana_srednia, otrzymano: $srednia";
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
