<?php
    $uzyto_dir = false;
    $uzyto_include = false;
    $uzyto_nadrzednego = false;
    foreach (token_get_all(file_get_contents($rozw)) as $token) {
        if (!is_array($token)) continue;
        if ($token[0] == T_DIR) $uzyto_dir = true;
        if (in_array($token[0], [T_INCLUDE, T_INCLUDE_ONCE, T_REQUIRE, T_REQUIRE_ONCE])) $uzyto_include = true;
        if ($token[0] == T_CONSTANT_ENCAPSED_STRING && str_contains(strtr($token[1], '\\', '/'), '/../')) $uzyto_nadrzednego = true;
    }
    $katalog = dirname(realpath($rozw), 2);
    $pliki_html = array_filter(get_included_files(), fn($f) => preg_match('/\.html?$/i', $f) && realpath(dirname($f)) == $katalog);
    if (!$uzyto_include) {
        $komunikaty[] = "Nie dołączono pliku za pomocą include";
    } elseif (!$pliki_html) {
        $komunikaty[] = "Nie dołączono pliku .html znajdującego się w folderze nadrzędnym względem pliku z rozwiązaniem";
    } elseif (!($uzyto_dir && $uzyto_nadrzednego)) {
        $komunikaty[] = "Do zbudowania ścieżki użyj stałej __DIR__ oraz /../";
    } else {
        $tresc_html = trim(file_get_contents(reset($pliki_html)));
        $poprawne = $tresc_html !== '' && strpos($output, $tresc_html) !== false;
        if (!$poprawne) {
            $komunikaty[] = "Nie wyświetlono zawartości dołączonego pliku " . htmlspecialchars(basename(reset($pliki_html)));
        }
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
