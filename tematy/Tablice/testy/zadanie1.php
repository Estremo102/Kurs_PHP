<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0));
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, upewnij się, że korzystasz z echo";
    } else {
        $przypadki = [[$tablica, $output]];
        if ($mozna_uruchomic) {
            foreach ([[1, 2], [], range(1, 12)] as $inna_tablica) {
                [$inny_output] = $uruchom(['tablica' => $inna_tablica]);
                $przypadki[] = [$inna_tablica, $inny_output];
            }
        }
        $poprawne = true;
        foreach ($przypadki as [$dane_testu, $wynik]) {
            if (trim(strip_tags($wynik)) !== (string)count($dane_testu)) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla tablicy [" . implode(", ", $dane_testu) . "]. Oczekiwano: " . count($dane_testu) . ", otrzymano: " . htmlspecialchars($wynik);
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
