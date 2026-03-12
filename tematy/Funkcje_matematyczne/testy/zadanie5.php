<?php
$output_normalized = trim(preg_replace('/\s+/', ' ', str_replace(["\n", "\r"], "", $output)));
$poprawne = $output_normalized === "Liczba 21.37 jest zaokrąglana w dół";
$komunikaty = $poprawne ? ["Zadanie wykonane poprawnie"] : ["Wynik niepoprawny", "Otrzymano: ". $output_normalized, "Oczekiwane: Liczba 21.37 jest zaokrąglana w dół"];
?>


