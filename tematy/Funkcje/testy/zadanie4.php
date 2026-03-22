<?php
if (!function_exists('oczyscTekst')) {
	$komunikaty[] = "Nie utworzono funkcji oczyscTekst";
	$komunikaty[] = "Zadanie niewykonane";
	return;
}

$czyPoprawnaSygnatura = true;

try {
	$ref = new ReflectionFunction('oczyscTekst');
	$parametry = $ref->getParameters();

	if (count($parametry) !== 1) {
		$czyPoprawnaSygnatura = false;
		$komunikaty[] = "Funkcja oczyscTekst powinna przyjmować dokładnie 1 argument";
	} elseif (!$parametry[0]->isPassedByReference()) {
		$czyPoprawnaSygnatura = false;
		$komunikaty[] = "Argument funkcji oczyscTekst powinien być przekazywany przez referencję (&)";
	}
} catch (Throwable $e) {
	$czyPoprawnaSygnatura = false;
	$komunikaty[] = "Nie udało się sprawdzić sygnatury funkcji oczyscTekst: " . $e->getMessage();
}

$czyWynikiPoprawne = true;

$testy = [
	["   Ala   ma    Kota   ", "ala ma kota"],
	["    TO   JEST   TEST    ", "to jest test"],
	["bez zmian", "bez zmian"],
	["      ", ""],
];

foreach ($testy as [$wejscie, $oczekiwane]) {
	$tekst = $wejscie;

	try {
		oczyscTekst($tekst);
	} catch (Throwable $e) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błąd podczas wywołania oczyscTekst dla '$wejscie': " . $e->getMessage();
		continue;
	}

	if ($tekst !== $oczekiwane) {
		$czyWynikiPoprawne = false;
		$komunikaty[] = "Błędny wynik dla '$wejscie'. Oczekiwano: '$oczekiwane', Otrzymano: '$tekst'";
	}
}

if ($czyPoprawnaSygnatura && $czyWynikiPoprawne) {
	$poprawne = true;
	$komunikaty[] = "Funkcja oczyscTekst poprawnie modyfikuje tekst i ma prawidłową sygnaturę";
	$komunikaty[] = "Zadanie wykonane poprawnie";
} else {
	$komunikaty[] = "Funkcja oczyscTekst nie spełnia wymagań zadania";
	$komunikaty[] = "Zadanie niewykonane";
}
?>