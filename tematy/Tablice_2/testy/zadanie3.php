<?php
    $samochody = [
        ["Volvo", 32, 13],
        ["BMW", 31, 43],
        ["Saab", 6, 2],
        ["Land Rover", 42, 72],
    ];
    if (!function_exists('sprzedajSamochod')) {
        $komunikaty[] = "Nie utworzono funkcji sprzedajSamochod";
    } else {
        $poprawne = true;
        foreach ([0, 2, 3] as $indeks) {
            $oczekiwane = $samochody;
            $oczekiwane[$indeks][1]--;
            $oczekiwane[$indeks][2]++;
            $kopia = $samochody;
            try {
                $wynik = sprzedajSamochod($kopia, $indeks);
            } catch (Throwable $e) {
                $poprawne = false;
                $komunikaty[] = "Błąd podczas wywołania sprzedajSamochod(\$samochody, $indeks): " . htmlspecialchars($e->getMessage());
                break;
            }
            // dopuszczalna jest modyfikacja przez referencję lub zwrócenie nowej tablicy
            if ($kopia != $oczekiwane && $wynik != $oczekiwane) {
                $poprawne = false;
                $zmieniona = $kopia != $samochody ? $kopia : $wynik;
                $komunikaty[] = "Błędny wynik dla indeksu $indeks (" . $samochody[$indeks][0] . "). Oczekiwano: " . htmlspecialchars(json_encode($oczekiwane, JSON_UNESCAPED_UNICODE)) . ", otrzymano: " . htmlspecialchars(json_encode($zmieniona, JSON_UNESCAPED_UNICODE)) . ". Funkcja powinna zmodyfikować tablicę przez referencję (&) albo zwrócić zmienioną tablicę";
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
