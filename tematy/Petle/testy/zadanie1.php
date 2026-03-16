<?php
$out = str_replace(["<br>", "<br/>", "<br />"], "\n", $output);
$out = str_replace(["\r\n", "\r"], "\n", $out);

$linie = explode("\n", $out);

$oczekiwane = ["0","10","20","30","40","50","60","70","80","90",""];

if (empty($linie)) {
    $komunikaty[] = "Nie wypisano danych, upewnij się, że korzystasz z echo";
} else {
    $poprawne = ($linie === $oczekiwane);

    if (!$poprawne) {
        $komunikaty[] = "Wynik niepoprawny.";
        $komunikaty[] = "Otrzymano: " . implode(", ", $linie);
        $komunikaty[] = "Oczekiwano: " . implode(", ", $oczekiwane);
    }
}

$komunikaty[] = $poprawne ? "Zadanie wykonane" : "Zadanie niewykonane";
?>