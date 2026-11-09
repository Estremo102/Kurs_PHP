<?php
    if (!function_exists('pierwiastek')) {
        $komunikaty[] = "Nie utworzono funkcji pierwiastek";
    } else {
        $poprawne = true;
        $parametry = (new ReflectionFunction('pierwiastek'))->getParameters();
        if (count($parametry) !== 2) {
            $poprawne = false;
            $komunikaty[] = "Funkcja pierwiastek powinna przyjmować dokładnie 2 argumenty";
        } elseif (!$parametry[1]->isDefaultValueAvailable() || $parametry[1]->getDefaultValue() != 2) {
            $poprawne = false;
            $komunikaty[] = "Drugi argument funkcji pierwiastek powinien mieć wartość domyślną równą 2";
        }
        // [argumenty, oczekiwany wynik], wywołanie z jednym argumentem sprawdza wartość domyślną
        $testy = [[[9, 2], 3], [[27, 3], 3], [[16, 4], 2], [[81, 2], 9], [[25], 5]];
        foreach ($testy as [$argumenty, $oczekiwane]) {
            $opis = "pierwiastek(" . implode(", ", $argumenty) . ")";
            try {
                $otrzymane = pierwiastek(...$argumenty);
            } catch (Throwable $e) {
                $poprawne = false;
                $komunikaty[] = "Błąd podczas wywołania $opis: " . htmlspecialchars($e->getMessage());
                continue;
            }
            if (!is_numeric($otrzymane) || abs($otrzymane - $oczekiwane) > 1e-6) {
                $poprawne = false;
                $komunikaty[] = "Błędny wynik dla $opis. Oczekiwano: $oczekiwane, otrzymano: " . htmlspecialchars(var_export($otrzymane, true));
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
