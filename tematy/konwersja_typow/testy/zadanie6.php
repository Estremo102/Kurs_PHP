<?php
$poprawne = strpos($output, "object(stdClass)") !== false && strpos($output, "\"scalar\"") !== false;
$komunikaty = $poprawne ? ["Zadanie wykonane poprawnie"] : ["Wynik niepoprawny", !empty($output) ? "Otrzymano: ". substr($output, 0, 100) . "...": ""];
?>


