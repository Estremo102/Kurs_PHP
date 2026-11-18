<?php
header('Content-Type: application/json; charset=utf-8');

$index = intval($_GET['i'] ?? 0);
$src = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['src'] ?? '');

$base = __DIR__ . "/tematy/$src";

$dane = "$base/dane/zadanie{$index}.php";
if (file_exists($dane)) {
    include $dane;
}

ob_start();
$rozw = "$base/rozwiazania/zadanie{$index}.php";
if (file_exists($rozw)) {
    include $rozw;
}
$output = ob_get_clean();
// dane z formularza zadania służą tylko do wyświetlenia wyniku, testy dostają czyste $_POST
$_POST = [];
$_SERVER['REQUEST_METHOD'] = 'GET';

$test = "$base/testy/zadanie{$index}.php";
if (!file_exists($test)) {
    echo json_encode([
        'poprawne' => false,
        'komunikaty' => ["Brak pliku testowego"],
        'output' => $output
    ]);
    exit;
}

$poprawne = false;
$komunikaty = [];
ob_start();
include $test;
$wynikTestu = ob_get_clean();
$wynik = [
    'poprawne' => $poprawne,
    'komunikaty' => $komunikaty,
    'output' => $output
];

echo json_encode($wynik, JSON_UNESCAPED_UNICODE);
?>
