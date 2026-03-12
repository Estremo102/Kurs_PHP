<?php
if (!isset($wyniki) || !is_array($wyniki)) {
    $komunikaty[] = "Nie utworzono tablicy \$wyniki.";
    return;
}

if (count($wyniki) !== 25) {
    $komunikaty[] = "Tablica \$wyniki powinna zawierać 25 elementów, a zawiera: " . count($wyniki);
    return;
}

$oczekiwane = [];
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        $oczekiwane[] = $i * $j;
    }
}

if ($wyniki === $oczekiwane) {
    $poprawne = true;
    $komunikaty[] = "Zadanie wykonane poprawnie.";
} else {
    $komunikaty[] = "Niepoprawna zawartość tablicy \$wyniki.";
    $komunikaty[] = "Otrzymano: " . implode(", ", $wyniki);
    $komunikaty[] = "Oczekiwano: " . implode(", ", $oczekiwane);
}
?>