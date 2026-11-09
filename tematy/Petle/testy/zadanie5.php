<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $typy_tokenow = array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0);
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], $typy_tokenow);
    $linie = fn($tekst) => array_values(array_filter(array_map(fn($l) => trim(strip_tags($l)), preg_split('/<br\s*\/?>|\R/iu', $tekst)), 'strlen'));
    $oczekiwane = function ($tablica) {
        $wynik = [];
        foreach ($tablica as $kolor) {
            if ($kolor === "czarny") break;
            $wynik[] = $kolor;
        }
        return $wynik;
    };
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, upewnij się, że korzystasz z echo";
    } elseif (!in_array(T_BREAK, $typy_tokenow)) {
        $komunikaty[] = "Przerwij pętlę za pomocą instrukcji break";
    } else {
        $przypadki = [[$kolory, $output]];
        if ($mozna_uruchomic) {
            foreach ([["biały", "czarny", "szary"], ["czarny", "biały"], ["zielony", "niebieski"]] as $tablica) {
                [$inny_output] = $uruchom(['kolory' => $tablica]);
                $przypadki[] = [$tablica, $inny_output];
            }
        }
        $poprawne = true;
        foreach ($przypadki as [$tablica, $wynik]) {
            if ($linie($wynik) !== $oczekiwane($tablica)) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla \$kolory = [" . implode(", ", $tablica) . "]. Otrzymano: " . htmlspecialchars(implode(", ", $linie($wynik)) ?: "brak elementów") . ", oczekiwano: " . (implode(", ", $oczekiwane($tablica)) ?: "brak elementów") . " (każdy kolor w osobnej linii)";
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
