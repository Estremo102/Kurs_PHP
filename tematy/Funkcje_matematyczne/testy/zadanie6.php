<?php
$poprawne = strpos($output, "Każdy człowiek jest pazerny i to jest to, a może się uda.") !== false || strpos($output, "Ten kibel jest twój i mój!") !== false;
$komunikaty = $poprawne ? ["Zadanie wykonane poprawnie"] : ["Wynik niepoprawny", !empty($output) ? "Otrzymano: ". trim($output) : ""];
?>


