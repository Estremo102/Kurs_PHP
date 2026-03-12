<?php
$out = str_replace(["<br>", "<br/>", "<br />"], "\n", $output);
$out = str_replace(["\r\n", "\r"], "\n", $out);

$linie = array_filter(array_map('trim', explode("\n", $out)));

if (empty($linie)) {
    $komunikaty[] = "Nic nie wypisano — upewnij się, że używasz echo.";
    return;
}

if (!isset($input) || !is_array($input)) {
    $komunikaty[] = "Zmienna \$input nie istnieje lub nie jest tablicą.";
    return;
}

if (count($linie) !== count($input)) {
    $komunikaty[] = "Liczba wypisanych elementów nie zgadza się.";
    $komunikaty[] = "Wypisano: " . count($linie) . ", oczekiwano: " . count($input);
    return;
}

$oczekiwane = array_map('strval', $input);
$otrzymane = array_values($linie);

if ($otrzymane === $oczekiwane) {
    $poprawne = true;
    $komunikaty[] = "Zadanie wykonane poprawnie.";
} else {
    $komunikaty[] = "Wypisane wartości nie zgadzają się z zawartością \$input.";
    $komunikaty[] = "Otrzymano: " . implode(", ", $otrzymane);
    $komunikaty[] = "Oczekiwano: " . implode(", ", $oczekiwane);
}
?>