<?php
if (!function_exists('myMin')) {
	$komunikaty[] = "Nie utworzono funkcji myMin";
	$komunikaty[] = "Zadanie niewykonane";
	return;
}

if (!function_exists('myMax')) {
	$komunikaty[] = "Nie utworzono funkcji myMax";
	$komunikaty[] = "Zadanie niewykonane";
	return;
}

$czyPoprawnaSygnatura = true;

try {
	$refMin = new ReflectionFunction('myMin');
	$parametryMin = $refMin->getParameters();

	if (count($parametryMin) !== 1 || !$parametryMin[0]->isVariadic()) {
		$czyPoprawnaSygnatura = false;
		$komunikaty[] = "Funkcja myMin powinna przyjmować zmienną liczbę argumentów (...$x)";
	}
} catch (Throwable $e) {
	$czyPoprawnaSygnatura = false;
	$komunikaty[] = "Nie udało się sprawdzić sygnatury funkcji myMin: " . $e->getMessage();
}

try {
	$refMax = new ReflectionFunction('myMax');
	$parametryMax = $refMax->getParameters();

	if (count($parametryMax) !== 1 || !$parametryMax[0]->isVariadic()) {
		$czyPoprawnaSygnatura = false;
		$komunikaty[] = "Funkcja myMax powinna przyjmować zmienną liczbę argumentów (...$x)";
	}
} catch (Throwable $e) {
	$czyPoprawnaSygnatura = false;
	$komunikaty[] = "Nie udało się sprawdzić sygnatury funkcji myMax: " . $e->getMessage();
}

$czyWynikiPoprawne = true;

$zestawyTestowe = [
	[3, 7, 1, 9, 2],
	[-5, -2, -8, -1],
	[4],
	[2.5, 2.05, 2.55, 2.15],
	[10, 10, 10, 10],
	['pies', 'kot', 'ala', 'zamek'],
];

foreach ($zestawyTestowe as $argumenty) {
	$opisArgumentow = implode(', ', array_map('strval', $argumenty));

	try {
		$oczekiwaneMin = min($argumenty);
		$otrzymaneMin = myMin(...$argumenty);
	} catch (Throwable $e) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błąd podczas testu myMin($opisArgumentow): " . $e->getMessage();
		continue;
	}

	if ($otrzymaneMin != $oczekiwaneMin) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błędny wynik myMin($opisArgumentow). Oczekiwano: $oczekiwaneMin, Otrzymano: $otrzymaneMin";
	}

	try {
		$oczekiwaneMax = max($argumenty);
		$otrzymaneMax = myMax(...$argumenty);
	} catch (Throwable $e) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błąd podczas testu myMax($opisArgumentow): " . $e->getMessage();
		continue;
	}

	if ($otrzymaneMax != $oczekiwaneMax) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błędny wynik myMax($opisArgumentow). Oczekiwano: $oczekiwaneMax, Otrzymano: $otrzymaneMax";
	}
}

if ($czyPoprawnaSygnatura && $czyWynikiPoprawne) {
	$poprawne = true;
	$komunikaty[] = "Funkcje myMin oraz myMax działają poprawnie i mają prawidłową sygnaturę";
	$komunikaty[] = "Zadanie wykonane poprawnie";
} else {
	$komunikaty[] = "Funkcje myMin lub myMax nie spełniają wymagań zadania";
	$komunikaty[] = "Zadanie niewykonane";
}
?>