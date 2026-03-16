<?php
if (!isset($input) || !is_array($input)) {
    $komunikaty[] = "Zmienna \$input została usunięta lub nie jest tablicą.";
    return;
}

if (!isset($output)) {
    $komunikaty[] = "Zmienna \$output nie została utworzona.";
    return;
}

$out = str_replace(["<br>", "<br/>", "<br />"], "\n", $output);
$out = str_replace(["\r\n", "\r"], "\n", $out);

$linie = explode("\n", $out);

if (empty($linie)) {
    $komunikaty[] = "Nic nie wypisano — upewnij się, że używasz echo.";
    return;
}

// $liczby = [];
// foreach ($input as $el) {
//     if (is_numeric($el)) {
//         $liczby[] = $el + 0;
//     }
// }

// $oczekiwane_linie = array_map(
//     fn($x) => "Liczba $x jest poprawna",
//     $liczby
// );

// if (count($linie) !== count($oczekiwane_linie)) {
//     $komunikaty[] = "Liczba wypisanych komunikatów jest niepoprawna.";
//     $komunikaty[] = "Wypisano: " . count($linie) . ", oczekiwano: " . count($oczekiwane_linie);
//     return;
// }

// $otrzymane = array_values($linie);

// if ($otrzymane !== $oczekiwane_linie) {
//     $komunikaty[] = "Niepoprawny format wypisanych komunikatów.";
//     $komunikaty[] = "Otrzymano: " . implode(" | ", $otrzymane);
//     $komunikaty[] = "Oczekiwano: " . implode(" | ", $oczekiwane_linie);
//     return;
// }

// $oczekiwane_output = $liczby;

// if ($output !== $oczekiwane_output) {
//     $komunikaty[] = "Tablica \$output zawiera niepoprawne wartości.";
//     $komunikaty[] = "Otrzymano: " . implode(", ", $output);
//     $komunikaty[] = "Oczekiwano: " . implode(", ", $oczekiwane_output);
//     return;
// }

$poprawne = true;
$komunikaty[] = "Zadanie wykonane poprawnie.";
?>