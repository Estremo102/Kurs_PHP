<?php
    if (!function_exists('f')) {
        $komunikaty[] = "Nie utworzono funkcji f(\$x)";
    } else {
        $poprawne = true;
        foreach ([-2, 0, 3, 1.5] as $x) {
            $oczekiwane = 2 * $x * $x + 2 * $x - 4;
            try {
                $otrzymane = f($x);
            } catch (Throwable $e) {
                $poprawne = false;
                $komunikaty[] = "Błąd podczas wywołania f($x): " . htmlspecialchars($e->getMessage());
                continue;
            }
            if (!is_numeric($otrzymane) || abs($otrzymane - $oczekiwane) > 1e-9) {
                $poprawne = false;
                $komunikaty[] = "Błędny wynik dla x = $x. Oczekiwano: $oczekiwane, otrzymano: " . htmlspecialchars(var_export($otrzymane, true)) . ". Upewnij się, że funkcja zwraca wynik za pomocą return";
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
