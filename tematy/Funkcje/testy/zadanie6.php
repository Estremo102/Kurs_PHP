<?php
if (!function_exists('sredniaOrazMediana')) {
	$komunikaty[] = "Nie utworzono funkcji sredniaOrazMediana";
	$komunikaty[] = "Zadanie niewykonane";
	return;
}

$czyPoprawnaSygnatura = true;

try {
	$ref = new ReflectionFunction('sredniaOrazMediana');
	$parametry = $ref->getParameters();
	$typZwrotu = $ref->getReturnType();

	if (count($parametry) !== 2) {
		$czyPoprawnaSygnatura = false;
		$komunikaty[] = "Funkcja sredniaOrazMediana powinna przyjmować dokładnie 2 parametry: float &srednia, int ...liczby";
	} else {
		$pierwszy = $parametry[0];
		$drugi = $parametry[1];

		$typPierwszy = $pierwszy->getType();
		$typDrugi = $drugi->getType();

		if (!$pierwszy->isPassedByReference()) {
			$czyPoprawnaSygnatura = false;
			$komunikaty[] = "Pierwszy parametr funkcji sredniaOrazMediana musi być przekazywany przez referencję (&)";
		}

		if (!($typPierwszy instanceof ReflectionNamedType) || $typPierwszy->getName() !== 'float') {
			$czyPoprawnaSygnatura = false;
			$komunikaty[] = "Pierwszy parametr funkcji sredniaOrazMediana powinien mieć typ float";
		}

		if (!$drugi->isVariadic()) {
			$czyPoprawnaSygnatura = false;
			$komunikaty[] = "Drugi parametr funkcji sredniaOrazMediana powinien być parametrem zmiennej długości (...liczby)";
		}

		if (!($typDrugi instanceof ReflectionNamedType) || $typDrugi->getName() !== 'int') {
			$czyPoprawnaSygnatura = false;
			$komunikaty[] = "Parametry zmiennej długości w funkcji sredniaOrazMediana powinny mieć typ int";
		}
	}

	if (!($typZwrotu instanceof ReflectionNamedType) || $typZwrotu->getName() !== 'int') {
		$czyPoprawnaSygnatura = false;
		$komunikaty[] = "Funkcja sredniaOrazMediana powinna mieć typ zwracany int";
	}
} catch (Throwable $e) {
	$czyPoprawnaSygnatura = false;
	$komunikaty[] = "Nie udało się sprawdzić sygnatury funkcji sredniaOrazMediana: " . $e->getMessage();
}

$czyWynikiPoprawne = true;

$testy = [
	[[1, 2, 3, 4, 5], 3.0, 3],
	[[10, 2, 8, 4], 6.0, 6],
	[[1, 2, 3, 4], 2.5, 3],
	[[7], 7.0, 7],
	[[-5, -1, -3, -7], -4.0, -4],
];

foreach ($testy as [$liczby, $oczekiwanaSrednia, $oczekiwanaMediana]) {
	$srednia = -999.0;
	$opis = implode(', ', $liczby);

	try {
		$mediana = sredniaOrazMediana($srednia, ...$liczby);
	} catch (Throwable $e) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błąd podczas wywołania sredniaOrazMediana($opis): " . $e->getMessage();
		continue;
	}

	if (!is_int($mediana)) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Funkcja sredniaOrazMediana powinna zwracać int. Dla danych ($opis) zwrócono inny typ";
	}

	if ($mediana !== $oczekiwanaMediana) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błędna mediana dla ($opis). Oczekiwano: $oczekiwanaMediana, Otrzymano: $mediana";
	}

	if (abs($srednia - $oczekiwanaSrednia) > 0.000001) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błędna średnia zapisana przez referencję dla ($opis). Oczekiwano: $oczekiwanaSrednia, Otrzymano: $srednia";
	}
}

if ($czyPoprawnaSygnatura && $czyWynikiPoprawne) {
	$poprawne = true;
	$komunikaty[] = "Funkcja sredniaOrazMediana poprawnie oblicza średnią i medianę oraz ma prawidłową sygnaturę";
	$komunikaty[] = "Zadanie wykonane poprawnie";
} else {
	$komunikaty[] = "Funkcja sredniaOrazMediana nie spełnia wymagań zadania";
	$komunikaty[] = "Zadanie niewykonane";
}
?>