<?php
    $brakujace = array_filter(['myMin', 'myMax'], fn($nazwa) => !function_exists($nazwa));
    if ($brakujace) {
        $komunikaty[] = "Nie utworzono funkcji: " . implode(", ", $brakujace);
    } else {
        $poprawne = true;
        foreach (['myMin', 'myMax'] as $nazwa) {
            $parametry = (new ReflectionFunction($nazwa))->getParameters();
            if (count($parametry) !== 1 || !$parametry[0]->isVariadic()) {
                $poprawne = false;
                $komunikaty[] = "Funkcja $nazwa powinna przyjmować zmienną liczbę argumentów (...\$liczby)";
            }
        }
        $zestawy = [
            [3, 7, 1, 9, 2],
            [-5, -2, -8, -1],
            [4],
            [2.5, 2.05, 2.55, 2.15],
            [10, 10, 10, 10],
            ['pies', 'kot', 'ala', 'zamek'],
        ];
        foreach ($zestawy as $argumenty) {
            foreach (['myMin' => 'min', 'myMax' => 'max'] as $nazwa => $wbudowana) {
                $opis = "$nazwa(" . implode(", ", $argumenty) . ")";
                $oczekiwane = $wbudowana($argumenty);
                try {
                    $otrzymane = $nazwa(...$argumenty);
                } catch (Throwable $e) {
                    $poprawne = false;
                    $komunikaty[] = "Błąd podczas wywołania $opis: " . htmlspecialchars($e->getMessage());
                    continue;
                }
                if ($otrzymane !== $oczekiwane) {
                    $poprawne = false;
                    $komunikaty[] = "Błędny wynik dla $opis. Oczekiwano: $oczekiwane, otrzymano: " . htmlspecialchars(var_export($otrzymane, true));
                }
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
