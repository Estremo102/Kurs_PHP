<?php
$poprawne = strpos($output, "pole koła o promieniu 5 wynosi 78.539816339745") !== false;
$komunikaty = strpos($output, "pole koła o promieniu 5 wynosi 78.539816339745") !== false ? ["Zadanie wykonane poprawnie"] : ["Wynik niepoprawny. Oczekiwane: pole koła o promieniu 5 wynosi 78.539816339745", !empty($output) ? "Otrzymano: ". trim($output) : ""];
?>


