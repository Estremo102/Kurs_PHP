<?php
$src = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['src'] ?? '');
$i   = intval($_GET['i']); 
$base = __DIR__ . "/tematy/$src";
$testFile = "$base/testy/zadanie{$i}.php";
if (!file_exists($testFile)) {
    echo "Plik nie istnieje: $testFile";
    exit;
}
$cmd = "C:\\xampp\\php\\php.exe \"$testFile\"";
exec($cmd, $lines, $exitCode);
$output = implode("\n", $lines);
switch ($exitCode) {
    case 0:
        echo $output;
        break;
    case 255:
        echo "<span class=\"error\">BŁĄD KRYTYCZNY 255:</span> " . $output;
        break;
    default:
        echo "NIEZNANY BŁĄD $exitCode: " . $output;
        break;
}
?>