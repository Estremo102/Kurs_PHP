<?php
$src = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['src'] ?? '');
$i   = intval($_GET['i']); 
$base = __DIR__ . "/tematy/$src";
$solutionFile = "$base/rozwiazania/zadanie{$i}.php";
if (!file_exists($solutionFile)) {
    echo "Plik nie istnieje: $solutionFile";
    exit;
}
$lintCmd = "C:\\xampp\\php\\php.exe -l \"$solutionFile\" 2>&1";
exec($lintCmd, $lintLines, $lintExitCode);
$lintOutput = implode("\n", $lintLines);

if ($lintExitCode !== 0) {
    echo "<span class=\"error\">BŁĄD SKŁADNI:</span> " . $lintOutput;
    exit;
}

$runCmd = "C:\\xampp\\php\\php.exe \"$solutionFile\" 2>&1";
exec($runCmd, $lines, $exitCode);
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