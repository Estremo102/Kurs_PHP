<?php
if (!function_exists('pierwiastek')) {
	$komunikaty[] = "Nie utworzono funkcji pierwiastek";
	$komunikaty[] = "Zadanie niewykonane";
	return;
}

$czyPoprawnaSygnatura = true;
$ref = new ReflectionFunction('pierwiastek');
$parametry = $ref->getParameters();

if (count($parametry) !== 2) {
	$czyPoprawnaSygnatura = false;
	$komunikaty[] = "Funkcja pierwiastek powinna przyjmować dokładnie 2 argumenty";
}

if (isset($parametry[1])) {
	if (!$parametry[1]->isDefaultValueAvailable() || $parametry[1]->getDefaultValue() != 2) {
		$czyPoprawnaSygnatura = false;
		$komunikaty[] = "Drugi argument funkcji pierwiastek powinien mieć wartość domyślną równą 2";
	}
} else {
	$czyPoprawnaSygnatura = false;
}

$czyWynikiPoprawne = true;
$testy = [
	[9, 2, 3],
	[27, 3, 3],
	[16, 4, 2],
	[81, 2, 9],
];

foreach ($testy as [$liczba, $stopien, $oczekiwane]) {
	try {
		$otrzymane = pierwiastek($liczba, $stopien);
	} catch (Throwable $e) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błąd podczas wywołania pierwiastek($liczba, $stopien): " . $e->getMessage();
		continue;
	}

	if (abs($otrzymane - $oczekiwane) > 0.000001) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błędny wynik dla pierwiastek($liczba, $stopien). Oczekiwano: $oczekiwane, Otrzymano: $otrzymane";
	}
}

try {
	$otrzymaneDomyslnie = pierwiastek(25);
	if (abs($otrzymaneDomyslnie - 5) > 0.000001) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błędny wynik dla pierwiastek(25). Oczekiwano: 5, Otrzymano: $otrzymaneDomyslnie";
	}
} catch (Throwable $e) {
	$czyWynikiPoprawne = false;
	$komunikaty[] = "Nie można wywołać funkcji pierwiastek z jednym argumentem (domyślny stopień): " . $e->getMessage();
}

if ($czyPoprawnaSygnatura && $czyWynikiPoprawne) {
	$poprawne = true;
	$komunikaty[] = "Funkcja pierwiastek działa poprawnie i ma prawidłową wartość domyślną argumentu";
	$komunikaty[] = "Zadanie wykonane poprawnie";
} else {
	$komunikaty[] = "Funkcja pierwiastek nie spełnia wymagań zadania";
	$komunikaty[] = "Zadanie niewykonane";
}
?>