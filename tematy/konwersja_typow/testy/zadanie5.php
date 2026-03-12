<?php
$poprawne = strpos($output, "array(1)") !== false && strpos($output, "int(5)") !== false;
$komunikaty = $poprawne ? ["Zadanie wykonane poprawnie"] : ["Wynik niepoprawny", !empty($output) ? "Otrzymano: ". substr($output, 0, 100) . "...": ""];
?>


