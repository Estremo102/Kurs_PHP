<?php
    $zakazane = ['sort', 'rsort', 'usort', 'uasort', 'uksort', 'asort', 'arsort', 'ksort', 'krsort', 'natsort', 'natcasesort', 'array_multisort'];
    $uzyte_zakazane = [];
    foreach (token_get_all(file_get_contents($rozw)) as $token) {
        if (is_array($token) && $token[0] == T_STRING && in_array(strtolower($token[1]), $zakazane)) $uzyte_zakazane[] = strtolower($token[1]);
    }
    if (!function_exists('sortuj')) {
        $komunikaty[] = "Nie utworzono funkcji sortuj";
    } elseif ($uzyte_zakazane) {
        $komunikaty[] = "Zaimplementuj algorytm samodzielnie, bez wbudowanych funkcji sortujących (użyto: " . implode(", ", array_unique($uzyte_zakazane)) . ")";
    } else {
        mt_srand(2137);
        $losowa = [];
        for ($n = 0; $n < 30; $n++) $losowa[] = mt_rand(-100, 100);
        $testy = [[], [7], [2, 1], [3, 1, 2], [5, -1, 3, -1, 0], range(10, 1), range(1, 10), [4.5, 2, 4.25, -0.5], $losowa];
        $poprawne = true;
        foreach ($testy as $tablica) {
            $oczekiwane = $tablica;
            sort($oczekiwane);
            try {
                $otrzymane = sortuj($tablica);
            } catch (Throwable $e) {
                $poprawne = false;
                $komunikaty[] = "Błąd podczas wywołania sortuj([" . implode(", ", $tablica) . "]): " . htmlspecialchars($e->getMessage());
                break;
            }
            if (!is_array($otrzymane) || array_values($otrzymane) != $oczekiwane) {
                $poprawne = false;
                $komunikaty[] = "Błędny wynik dla sortuj([" . implode(", ", $tablica) . "]). Oczekiwano: [" . implode(", ", $oczekiwane) . "], otrzymano: " . htmlspecialchars(json_encode($otrzymane)) . ". Upewnij się, że funkcja zwraca posortowaną tablicę za pomocą return";
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
