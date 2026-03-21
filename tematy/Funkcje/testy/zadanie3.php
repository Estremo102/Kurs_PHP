<?php
if (!function_exists('obwodTrojkata')) {
	$komunikaty[] = "Nie utworzono funkcji obwodTrojkata";
	$komunikaty[] = "Zadanie niewykonane";
	return;
}

$czyPoprawnaDel = true;
$czyWynikiPoprawne = true;

$wynik1 = obwodTrojkata(3, 4, 5);
if ($wynik1 !== 12) {
	$czyWynikiPoprawne = false;
	$komunikaty[] = "Błędny obwód dla (3, 4, 5). Oczekiwano: 12, Otrzymano: $wynik1";
}

$wynik2 = obwodTrojkata(5, 5, 5);
if ($wynik2 !== 15) {
	$czyWynikiPoprawne = false;
	$komunikaty[] = "Błędny obwód dla (5, 5, 5). Oczekiwano: 15, Otrzymano: $wynik2";
}

ob_start();
$wynik3 = obwodTrojkata(1, 1, 2);
$output3 = ob_get_clean();
if ($wynik3 !== -1) {
	$czyWynikiPoprawne = false;
	$komunikaty[] = "Dla niemożliwego trójkąta (1, 1, 2) powinna być zwrócona -1, otrzymano: $wynik3";
}
if (strpos($output3, "Z podanych boków nie da się zbudować trójkąta") === false) {
	$czyWynikiPoprawne = false;
	$komunikaty[] = "Dla (1, 1, 2) komunikat nie zawiera 'Z podanych boków nie da się zbudować trójkąta'";
}

ob_start();
$wynik4 = obwodTrojkata(1, 2, 3);
$output4 = ob_get_clean();
if ($wynik4 !== -1) {
	$czyWynikiPoprawne = false;
	$komunikaty[] = "Dla niemożliwego trójkąta (1, 2, 3) powinna być zwrócona -1, otrzymano: $wynik4";
}

ob_start();
$wynik5 = obwodTrojkata(0, 3, 4);
$output5 = ob_get_clean();
if ($wynik5 !== -1) {
	$czyWynikiPoprawne = false;
	$komunikaty[] = "Dla parametru 0 powinna być zwrócona -1, otrzymano: $wynik5";
}
if (strpos($output5, "Błędne dane wejściowe") === false) {
	$czyWynikiPoprawne = false;
	$komunikaty[] = "Dla (0, 3, 4) komunikat nie zawiera 'Błędne dane wejściowe'";
}

ob_start();
$wynik6 = obwodTrojkata(-1, 3, 4);
$output6 = ob_get_clean();
if ($wynik6 !== -1) {
	$czyWynikiPoprawne = false;
	$komunikaty[] = "Dla parametru -1 powinna być zwrócona -1, otrzymano: $wynik6";
}

$wynik7 = obwodTrojkata(6, 8, 10);
if ($wynik7 !== 24) {
	$czyWynikiPoprawne = false;
	$komunikaty[] = "Błędny obwód dla (6, 8, 10). Oczekiwano: 24, Otrzymano: $wynik7";
}

if ($czyWynikiPoprawne) {
	$poprawne = true;
	$komunikaty[] = "Funkcja obwodTrojkata liczy obwód i obsługuje błędy prawidłowo";
	$komunikaty[] = "Zadanie wykonane poprawnie";
} else {
	$komunikaty[] = "Funkcja obwodTrojkata nie spełnia wymagań zadania";
	$komunikaty[] = "Zadanie niewykonane";
}
?>