<?php
    $tokeny = array_filter(token_get_all(file_get_contents($rozw)), 'is_array');
    $typy_tokenow = array_column($tokeny, 0);
    $uzyto_globals = in_array('$GLOBALS', array_column($tokeny, 1));
    if (!function_exists('suma')) {
        $komunikaty[] = "Nie utworzono funkcji suma";
    } elseif ((new ReflectionFunction('suma'))->getNumberOfParameters() > 0) {
        $komunikaty[] = "Funkcja suma nie powinna przyjmować parametrów";
    } elseif (in_array(T_GLOBAL, $typy_tokenow) || !$uzyto_globals) {
        $komunikaty[] = "Użyj tablicy \$GLOBALS zamiast słowa kluczowego global";
    } elseif (!isset($wynik) || $wynik != $a + $b) {
        $komunikaty[] = "Zmienna globalna \$wynik powinna wynosić " . ($a + $b) . ", otrzymano: " . htmlspecialchars(var_export($wynik ?? null, true));
    } elseif (trim(strip_tags($output)) !== (string)($a + $b)) {
        $komunikaty[] = "Wypisano " . htmlspecialchars($output) . " zamiast " . ($a + $b);
    } else {
        // zmieniamy zmienne globalne i wywołujemy funkcję ponownie
        $poprawne = true;
        foreach ([[5, -8], [100, 1]] as [$x, $y]) {
            $GLOBALS['a'] = $x;
            $GLOBALS['b'] = $y;
            unset($GLOBALS['wynik']);
            ob_start();
            suma();
            ob_end_clean();
            if (($GLOBALS['wynik'] ?? null) != $x + $y) {
                $poprawne = false;
                $komunikaty[] = "Dla \$a = $x i \$b = $y funkcja suma() ustawiła \$wynik = " . htmlspecialchars(var_export($GLOBALS['wynik'] ?? null, true)) . ", oczekiwano " . ($x + $y);
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
