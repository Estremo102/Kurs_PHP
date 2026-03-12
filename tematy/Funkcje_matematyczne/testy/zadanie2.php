<?php
$output_normalized = str_replace(["\n", ""], "", $output);
$poprawne = $output_normalized === "2137";
$komunikaty = $poprawne ? ["Zadanie wykonane poprawnie"] : ["Wynik niepoprawny. Oczekiwane: 2137", !empty($output) ? "Otrzymano: ". trim($output) : ""];
?>


