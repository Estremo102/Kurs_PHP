<?php
    $tokeny = token_get_all(file_get_contents($rozw));
    $poprawne = true;
    if (in_array('{', $tokeny, true)) {
        $poprawne = false;
        $komunikaty[] = "Kod nadal zawiera nawiasy klamrowe {}. Instrukcje wykonujące jedną akcję zapisz bez nich";
    }
    if (!in_array('?', $tokeny, true)) {
        $poprawne = false;
        $komunikaty[] = "Instrukcję if...else zastąp operatorem trójargumentowym";
    }
    if (($a ?? null) !== 16 || ($b ?? null) !== 25 || ($c ?? null) !== 16) {
        $poprawne = false;
        $komunikaty[] = "Zmienne mają niepoprawne wartości. Oczekiwano: \$a = 16, \$b = 25, \$c = 16. Upewnij się, że kod zaczyna się od przypisania \$a = 10, \$b = 25, \$c = 15";
    } elseif (trim(strip_tags($output)) !== "16, 25, 16") {
        $poprawne = false;
        $komunikaty[] = "Wypisano " . htmlspecialchars($output) . " zamiast 16, 25, 16";
    }
    $komunikaty[] = $poprawne ? 'Zadanie wykonane' : 'Zadanie niewykonane';
?>
