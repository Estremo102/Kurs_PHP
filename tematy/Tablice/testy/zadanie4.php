<?php
    // oczekiwane klucze po kolejnych krokach: 0, 1, klucz, 2, 4, [] -> 5, klucz, [] -> 6
    $oczekiwane_klucze = [0, 1, 'klucz', 2, 4, 5, 'klucz', 6];
    $opis = fn($klucze) => implode(", ", array_map(fn($k) => is_int($k) ? $k : "\"$k\"", $klucze));
    if (!isset($tablica) || !is_array($tablica)) {
        $komunikaty[] = "Nie utworzono tablicy \$tablica";
    } else {
        $klucze = array_keys($tablica);
        $poprawne = count($klucze) == count($oczekiwane_klucze);
        foreach ($oczekiwane_klucze as $n => $oczekiwany) {
            if (!$poprawne) break;
            $klucz = $klucze[$n];
            $poprawne = $oczekiwany === 'klucz' ? is_string($klucz) : $klucz === $oczekiwany;
        }
        if (!$poprawne) {
            $komunikaty[] = "Tablica ma klucze: " . htmlspecialchars($opis($klucze)) . ". Oczekiwano kolejno: 0, 1, klucz tekstowy, 2, 4, 5, klucz tekstowy, 6. Upewnij się, że wykonujesz kroki w kolejności z treści zadania";
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
