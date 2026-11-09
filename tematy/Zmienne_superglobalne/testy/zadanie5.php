<?php
    $uruchom = function ($dane) use ($rozw) {
        extract($dane);
        ob_start();
        include $rozw;
        return [ob_get_clean(), get_defined_vars()];
    };
    $mozna_uruchomic = !array_intersect([T_FUNCTION, T_FN, T_CLASS], array_column(array_filter(token_get_all(file_get_contents($rozw)), 'is_array'), 0));
    $dokument = new DOMDocument();
    @$dokument->loadHTML('<?xml encoding="utf-8"?>' . $output);
    $formularz_post = false;
    foreach ($dokument->getElementsByTagName('form') as $form) {
        if (strtolower($form->getAttribute('method')) !== 'post') continue;
        $pole_imie = false;
        $przycisk = false;
        foreach ($form->getElementsByTagName('input') as $input) {
            if ($input->getAttribute('name') === 'imie') $pole_imie = true;
            if (strtolower($input->getAttribute('type')) === 'submit') $przycisk = true;
        }
        if ($form->getElementsByTagName('button')->length) $przycisk = true;
        if ($pole_imie && $przycisk) $formularz_post = true;
    }
    if (!$formularz_post) {
        $komunikaty[] = "Nie znaleziono formularza z method=\"post\", polem name=\"imie\" i przyciskiem wysyłającym";
    } elseif (!$mozna_uruchomic) {
        $poprawne = true;
    } else {
        // symulujemy wysłanie formularza oraz pierwsze wejście na stronę
        $zapisane = [$_POST, $_SERVER['REQUEST_METHOD'] ?? null];
        $_POST = ['imie' => 'Testowy'];
        $_SERVER['REQUEST_METHOD'] = 'POST';
        [$output_wyslany] = $uruchom([]);
        $_POST = [];
        $_SERVER['REQUEST_METHOD'] = 'GET';
        [$output_pusty] = $uruchom([]);
        [$_POST, $_SERVER['REQUEST_METHOD']] = $zapisane;
        if (strpos($output_wyslany, 'Witaj, Testowy') === false) {
            $komunikaty[] = "Po wysłaniu formularza z imieniem Testowy powinien zostać wyświetlony napis \"Witaj, Testowy\"";
        } elseif (strpos($output_pusty, 'Witaj,') !== false) {
            $komunikaty[] = "Napis \"Witaj, ...\" powinien pojawić się dopiero po wysłaniu formularza. Sprawdź, czy formularz został wysłany, np. za pomocą isset(\$_POST['imie'])";
        } else {
            $poprawne = true;
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
