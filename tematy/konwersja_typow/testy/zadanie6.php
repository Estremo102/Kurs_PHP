<?php
    $wartosci = [5, 5.34, "hello", true, NULL, ["Volvo", "BMW", "Toyota"], ["Peter" => "35", "Ben" => "37", "Joe" => "43"]];
    ob_start();
    foreach ($wartosci as $wartosc) {
        var_dump((object) $wartosc);
    }
    $oczekiwany = ob_get_clean();
    $normalizuj = fn($tekst) => preg_replace(['/<br\s*\/?>/i', '/#\d+/', '/\s+/'], '', $tekst);
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, użyj funkcji var_dump()";
    } else {
        $poprawne = $normalizuj($output) === $normalizuj($oczekiwany);
        if (!$poprawne) {
            $komunikaty[] = "Wynik niepoprawny. Upewnij się, że wyświetlasz wszystkie zmienne od \$a do \$g po konwersji do object w kolejności z treści zadania. Oczekiwano:";
            $komunikaty[] = "<pre>" . htmlspecialchars($oczekiwany) . "</pre>";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
