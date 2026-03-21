<?php
if (!function_exists('f')) {
	$komunikaty[] = "nie utworzono funkcji f(x)";
	$komunikaty[] = "Zadanie niewykonane";
	return;
}

$testy = [-2, 0, 3];
$czyWynikiPoprawne = true;

foreach ($testy as $x) {
	$oczekiwane = 2 * $x * $x + 2 * $x - 4;
	$otrzymane = f($x);

	if ($otrzymane !== $oczekiwane) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błędny wynik dla x=$x. Oczekiwano: $oczekiwane, Otrzymano: $otrzymane";
	}
}

if ($czyWynikiPoprawne) {
	$poprawne = true;
	$komunikaty[] = "Funkcja f(x) liczy poprawnie wzór 2x^2+2x-4";
	$komunikaty[] = "Zadanie wykonane poprawnie";
} else {
	$komunikaty[] = "Funkcja f(x) nie liczy poprawnie wzoru 2x^2+2x-4";
	$komunikaty[] = "Zadanie niewykonane";
}
?>