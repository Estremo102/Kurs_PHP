<?php
$src = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['src'] ?? '');
$i   = intval($_GET['i']); 
$base = __DIR__ . "/tematy/$src";
$file = "$base/rozwiazania/zadanie{$i}.php";

echo '<pre><code class="language-php">';
if (!file_exists($file)) {
    echo "Plik nie istnieje: $file";
    exit;
}
echo htmlspecialchars(file_get_contents($file));
echo '</code></pre>';
?>