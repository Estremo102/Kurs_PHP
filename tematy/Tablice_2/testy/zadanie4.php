<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $typy_tokenow = array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0);
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], $typy_tokenow);
    // zwraca zawartość komórek kolejnych wierszy tabeli HTML
    $wiersze_tabeli = function ($html) {
        $dokument = new DOMDocument();
        @$dokument->loadHTML('<?xml encoding="utf-8"?>' . $html);
        $wiersze = [];
        foreach ($dokument->getElementsByTagName('tr') as $tr) {
            $komorki = [];
            foreach ($tr->childNodes as $wezel) {
                if (in_array(strtolower($wezel->nodeName), ['td', 'th'])) $komorki[] = trim($wezel->textContent);
            }
            $wiersze[] = $komorki;
        }
        return $wiersze;
    };
    // dane muszą być w ostatnich wierszach tabeli (dopuszczalny wiersz nagłówka), liczby porównujemy jako liczby
    $sprawdz = function ($tablica, $html) use ($wiersze_tabeli) {
        $wiersze = array_slice($wiersze_tabeli($html), -count($tablica));
        if (count($wiersze) != count($tablica)) return false;
        foreach ($tablica as $n => $rekord) {
            if (count($wiersze[$n]) != count($rekord)) return false;
            foreach (array_values($rekord) as $k => $wartosc) {
                $komorka = $wiersze[$n][$k];
                $zgodna = is_numeric($wartosc) ? is_numeric($komorka) && abs($komorka - $wartosc) < 1e-9 : $komorka === (string)$wartosc;
                if (!$zgodna) return false;
            }
        }
        return true;
    };
    if ($output == "") {
        $komunikaty[] = "Nie wypisano danych, upewnij się, że korzystasz z echo";
    } elseif (!in_array(T_FOREACH, $typy_tokenow)) {
        $komunikaty[] = "Użyj pętli foreach";
    } elseif (!$wiersze_tabeli($output)) {
        $komunikaty[] = "Nie znaleziono tabeli. Użyj znaczników &lt;table&gt;, &lt;tr&gt; i &lt;td&gt;";
    } else {
        $przypadki = [[$tablica2D, $output]];
        if ($mozna_uruchomic) {
            $inna_tablica = [["Monitor", 899.99, 4], ["Kabel", 15, 120]];
            [$inny_output] = $uruchom(['tablica2D' => $inna_tablica]);
            $przypadki[] = [$inna_tablica, $inny_output];
        }
        $poprawne = true;
        foreach ($przypadki as [$dane_testu, $wynik]) {
            if (!$sprawdz($dane_testu, $wynik)) {
                $poprawne = false;
                $komunikaty[] = "Tabela nie zawiera poprawnych danych dla \$tablica2D = " . htmlspecialchars(json_encode($dane_testu, JSON_UNESCAPED_UNICODE)) . ". Każdy wewnętrzny element tablicy powinien być wierszem &lt;tr&gt;, a każda wartość komórką &lt;td&gt;";
                break;
            }
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
