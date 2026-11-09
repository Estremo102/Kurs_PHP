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
    $kolory_w_linkach = [];
    foreach ($dokument->getElementsByTagName('a') as $link) {
        parse_str((string)parse_url($link->getAttribute('href'), PHP_URL_QUERY), $parametry);
        if (isset($parametry['kolor']) && $parametry['kolor'] !== '') $kolory_w_linkach[] = $parametry['kolor'];
    }
    if (count(array_unique($kolory_w_linkach)) < 2) {
        $komunikaty[] = "Utwórz co najmniej dwa linki z różnymi wartościami parametru kolor, np. &lt;a href=\"?kolor=czerwony\"&gt;";
    } elseif (!$mozna_uruchomic) {
        $poprawne = true;
    } else {
        // symulujemy kliknięcie linku oraz wejście bez parametru
        $zapisane_get = $_GET;
        $_GET['kolor'] = 'zielony';
        [$output_kolor] = $uruchom([]);
        unset($_GET['kolor']);
        [$output_brak] = $uruchom([]);
        $_GET = $zapisane_get;
        if (strpos($output_kolor, 'Wybrany kolor: zielony') === false) {
            $komunikaty[] = "Dla adresu z ?kolor=zielony powinien zostać wyświetlony napis \"Wybrany kolor: zielony\"";
        } elseif (strpos($output_brak, 'Nie wybrano koloru') === false) {
            $komunikaty[] = "Gdy w adresie nie ma parametru kolor, powinien zostać wyświetlony napis \"Nie wybrano koloru\"";
        } else {
            $poprawne = true;
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
