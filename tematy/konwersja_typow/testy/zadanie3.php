<?php
    $wartosci = [5, 5.34, "25 km", "km 25", "hello", true, NULL];
    ob_start();
    foreach ($wartosci as $wartosc) {
        var_dump((float) $wartosc);
    }
    $oczekiwany = ob_get_clean();
    $normalizuj = fn($tekst) => preg_replace(['/<br\s*\/?>/i', '/#\d+/', '/\s+/'], '', $tekst);
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, użyj funkcji var_dump()";
    } else {
        $poprawne = $normalizuj($output) === $normalizuj($oczekiwany);
        if (!$poprawne) {
            $komunikaty[] = "Wynik niepoprawny. Upewnij się, że wyświetlasz wszystkie zmienne od \$a do \$g po konwersji do float w kolejności z treści zadania. Oczekiwano:";
            $komunikaty[] = "<pre>" . htmlspecialchars($oczekiwany) . "</pre>";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
