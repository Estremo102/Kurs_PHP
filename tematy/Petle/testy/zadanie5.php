<?php
if (!isset($kolory) || !is_array($kolory)) {
    $komunikaty[] = "Zmienna \$kolory została usunięta lub nie jest tablicą.";
    return;
}

$out = str_replace(["<br>", "<br/>", "<br />"], "\n", $output);
$out = str_replace(["\r\n", "\r"], "\n", $out);

$linie = array_filter(array_map('trim', explode("\n", $out)));

if (empty($linie)) {
    $komunikaty[] = "Nic nie wypisano — upewnij się, że używasz echo.";
    return;
}

$oczekiwane = [];
foreach ($kolory as $k) {
    if ($k === "czarny") break;
    $oczekiwane[] = $k;
}

$otrzymane = array_values($linie);

if (count($otrzymane) !== count($oczekiwane)) {
    $komunikaty[] = "Liczba wypisanych elementów jest niepoprawna.";
    $komunikaty[] = "Wypisano: " . count($otrzymane) . ", oczekiwano: " . count($oczekiwane);
    return;
}

if ($otrzymane === $oczekiwane) {
    $poprawne = true;
    $komunikaty[] = "Zadanie wykonane poprawnie.";
} else {
    $komunikaty[] = "Wypisane wartości nie zgadzają się z oczekiwanymi.";
    $komunikaty[] = "Otrzymano: " . implode(", ", $otrzymane);
    $komunikaty[] = "Oczekiwano: " . implode(", ", $oczekiwane);
}
?>