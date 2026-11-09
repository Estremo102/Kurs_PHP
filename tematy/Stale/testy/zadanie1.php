<?php
    $uzyto_define = false;
    foreach (token_get_all(file_get_contents($rozw)) as $token) {
        if (is_array($token) && $token[0] == T_STRING && strtolower($token[1]) == 'define') $uzyto_define = true;
    }
    $stale = get_defined_constants(true)['user'] ?? [];
    if (!$uzyto_define || !$stale) {
        $komunikaty[] = "Nie utworzono stałej za pomocą funkcji define()";
    } elseif ($output == "") {
        $komunikaty[] = "Nie wypisano danych, wyświetl wartość stałej za pomocą echo";
    } else {
        foreach ($stale as $wartosc) {
            if (is_scalar($wartosc) && (string)$wartosc !== '' && strpos($output, (string)$wartosc) !== false) {
                $poprawne = true;
            }
        }
        if (!$poprawne) {
            $komunikaty[] = "Wypisano " . htmlspecialchars($output) . ", a nie wartość utworzonej stałej (" . htmlspecialchars(implode(", ", array_keys($stale))) . ")";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
