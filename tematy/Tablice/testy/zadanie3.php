<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0));
    if (!isset($r_tablica) || !is_array($r_tablica)) {
        $komunikaty[] = "Nie utworzono tablicy \$r_tablica";
    } else {
        $przypadki = [[$tablica, $r_tablica]];
        if ($mozna_uruchomic) {
            $inna_tablica = ["Kot" => "Mruczek", "Pies" => "Burek"];
            [, $zmienne] = $uruchom(['tablica' => $inna_tablica]);
            $przypadki[] = [$inna_tablica, $zmienne['r_tablica'] ?? null];
        }
        $poprawne = true;
        foreach ($przypadki as [$dane_testu, $wynik]) {
            $oczekiwane = array_flip($dane_testu);
            if ($wynik !== $oczekiwane) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla \$tablica = " . htmlspecialchars(json_encode($dane_testu, JSON_UNESCAPED_UNICODE)) . ". Oczekiwano: " . htmlspecialchars(json_encode($oczekiwane, JSON_UNESCAPED_UNICODE)) . ", otrzymano: " . htmlspecialchars(json_encode($wynik, JSON_UNESCAPED_UNICODE));
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
