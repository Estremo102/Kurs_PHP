<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0));
    $kolory = ['red', 'green', 'blue', 'yellow'];

    // renderujemy treść zadania i szukamy formularza z wyborem koloru
    $zapisane = [$_POST, $_SERVER['REQUEST_METHOD'] ?? null];
    $_POST = [];
    $html_tresci = (function ($plik) {
        ob_start();
        include $plik;
        return ob_get_clean();
    })("$base/tresc/zadanie1_opis.php");
    [$_POST, $_SERVER['REQUEST_METHOD']] = $zapisane;

    $dokument = new DOMDocument();
    @$dokument->loadHTML('<?xml encoding="utf-8"?>' . $html_tresci);
    $formularz = null;
    foreach ($dokument->getElementsByTagName('form') as $form) {
        foreach ($form->getElementsByTagName('select') as $select) {
            if ($select->getAttribute('name') === 'color') $formularz = $form;
        }
    }

    $sciezka_ok = false;
    if (!$formularz) {
        $komunikaty[] = "Nie znaleziono w treści zadania formularza z polem select name=\"color\"";
    } elseif (strtolower($formularz->getAttribute('method')) !== 'post') {
        $komunikaty[] = "Formularz z wyborem koloru powinien mieć method=\"post\"";
    } else {
        $action = $formularz->getAttribute('action');
        $sciezka = parse_url($action, PHP_URL_PATH) ?? $action;
        if (strpos($sciezka, '/') === 0) {
            $sciezka = rtrim($_SERVER['DOCUMENT_ROOT'] ?? '', '/\\') . $sciezka;
        }
        $docelowy = realpath(rawurldecode($sciezka));
        if ($docelowy === false || $docelowy !== realpath($rozw)) {
            $komunikaty[] = "Formularz wysyła dane pod zły adres: \"" . htmlspecialchars($action) . "\", oczekiwano pliku rozwiazania/zadanie1.php";
        } else {
            $sciezka_ok = true;
        }
    }

    if (!$sciezka_ok) {
        // błąd ścieżki już zgłoszony
    } elseif (trim(file_get_contents($rozw)) === '') {
        $komunikaty[] = "Brak rozwiązania";
    } elseif (!$mozna_uruchomic) {
        $poprawne = true;
    } else {
        // symulujemy wysłanie formularza dla każdego koloru
        $poprawne = true;
        foreach ($kolory as $kolor) {
            $_POST = ['color' => $kolor];
            $_SERVER['REQUEST_METHOD'] = 'POST';
            [$output_koloru] = $uruchom([]);
            $wynik = new DOMDocument();
            @$wynik->loadHTML('<?xml encoding="utf-8"?>' . $output_koloru);
            $znaleziono = false;
            foreach ($wynik->getElementsByTagName('div') as $div) {
                if (preg_match('/background(-color)?\s*:\s*' . $kolor . '\b/i', $div->getAttribute('style'))) $znaleziono = true;
            }
            if (!$znaleziono) {
                $komunikaty[] = "Po wybraniu koloru $kolor powinien zostać wyświetlony div z tłem $kolor (style=\"background-color: $kolor\"). Otrzymano: " . htmlspecialchars($output_koloru);
                $poprawne = false;
                break;
            }
        }
        [$_POST, $_SERVER['REQUEST_METHOD']] = $zapisane;
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
