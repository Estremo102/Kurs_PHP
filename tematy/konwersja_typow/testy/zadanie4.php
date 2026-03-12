<?php
$output_normalized = str_replace(["\n", "\r"], "", $output);
$output_normalized = trim(preg_replace('/\s+/', ' ', $output_normalized));

$poprawne = $output_normalized === "bool(true) bool(true) bool(false) bool(true) bool(true) bool(true) bool(false) bool(true) bool(false)";
$komunikaty = $poprawne 
    ? ["Zadanie wykonane poprawnie"]
    : ["Wynik niepoprawny", "Oczekiwane: bool(true) bool(true) bool(false) bool(true) bool(true) bool(true) bool(false) bool(true) bool(false)"];
?>


