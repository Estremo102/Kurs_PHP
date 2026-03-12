<?php
$out = str_replace(["<br>", "<br/>", "<br />"], "\n", $output);
$out = str_replace(["\r\n", "\r"], "\n", $out);

$linie = array_filter(array_map('trim', explode("\n", $out)));

if (empty($linie)) {
    $komunikaty[] = "Nic nie wypisano — upewnij się, że używasz echo.";
    return;
}

foreach ($linie as $linia) {
    if (!ctype_digit($linia)) {
        $komunikaty[] = "Wypisano nie-liczbę: '$linia'.";
        return;
    }
}

$wyniki = array_map('intval', $linie);

if ($wyniki[0] !== $liczba) {
    $komunikaty[] = "Pierwsza wypisana liczba powinna być równa wylosowanej (\$liczba = $liczba).";
    return;
}

$oczekiwane = [];
$akt = $liczba;

while (true) {
    $oczekiwane[] = $akt;
    if ($akt + 1 > 8) break;
    $akt++;
}

if ($wyniki === $oczekiwane) {
    $poprawne = true;
    $komunikaty[] = "Zadanie wykonane poprawnie.";
} else {
    $komunikaty[] = "Niepoprawna sekwencja.";
    $komunikaty[] = "Otrzymano: " . implode(", ", $wyniki);
    $komunikaty[] = "Oczekiwano: " . implode(", ", $oczekiwane);
}
?>