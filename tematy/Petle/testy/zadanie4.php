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
    // każdy element może być wypisany jako "wartość" albo "klucz: wartość" (dopuszczalne też =>, -, =)
    $sprawdz = function ($input, $wynik) use ($linie) {
        $otrzymane = $linie($wynik);
        $elementy = (array)$input;
        if (count($otrzymane) != count($elementy)) return false;
        foreach (array_keys($elementy) as $n => $klucz) {
            $wartosc = (string)$elementy[$klucz];
            $wzor = '/^(' . preg_quote((string)$klucz, '/') . '\s*(:|=>|-|=)\s*)?' . preg_quote($wartosc, '/') . '$/u';
            if (!preg_match($wzor, $otrzymane[$n])) return false;
        }
        return true;
    };
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, upewnij się, że korzystasz z echo";
    } elseif (!in_array(T_FOREACH, $typy_tokenow)) {
        $komunikaty[] = "Użyj pętli foreach";
    } else {
        $przypadki = [[$input, $output]];
        if ($mozna_uruchomic) {
            foreach ($zestawy as $zestaw) {
                [$inny_output] = $uruchom(['input' => $zestaw]);
                $przypadki[] = [$zestaw, $inny_output];
            }
        }
        $poprawne = true;
        foreach ($przypadki as [$zestaw, $wynik]) {
            if (!$sprawdz($zestaw, $wynik)) {
                $poprawne = false;
                $komunikaty[] = "Wynik niepoprawny dla \$input = " . htmlspecialchars(json_encode($zestaw, JSON_UNESCAPED_UNICODE)) . ". Otrzymano: " . htmlspecialchars(implode(", ", $linie($wynik))) . ". Każdy element wypisz w osobnej linii jako wartość lub klucz: wartość";
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
