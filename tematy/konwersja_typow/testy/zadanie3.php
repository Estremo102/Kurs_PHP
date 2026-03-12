<?php
$a = (float) $a;
$b = (float) $b;
$c = (float) $c;
$d = (float) $d;
$e = (float) $e;
$f = (float) $f;
$g = (float) $g;

$output_normalized = str_replace(["\n", "\r"], "", $output);
$output_normalized = trim(preg_replace('/\s+/', ' ', $output_normalized));

$poprawne = $output_normalized === "float(5) float(5.34) float(25) float(0) float(0) float(1) float(0)";
$komunikaty = $poprawne 
    ? ["Zadanie wykonane poprawnie"]
    : ["Wynik niepoprawny", "Oczekiwane: float(5) float(5.34) float(25) float(0) float(0) float(1) float(0)"];

return [
    'poprawne' => $poprawne,
    'komunikaty' => $komunikaty
];
?>