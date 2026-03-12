<?php
    $title = $_GET['title'] ?? 'Strona Główna';
    $src = $_GET['src'] ?? null;
    include __DIR__ . '\\head.php';
    if ($src) {
        include __DIR__ . '\\navbox.php';
    }
?>
<div class="content">
<?php
    include __DIR__ . '\\sidebar.php';
    if ($src) {
        echo '<main>';
        include __DIR__ . '\\temat.php';
        echo '</main>';
    } else {
        include __DIR__ . '\\home.php';
    }
?>
</div>
<?php include __DIR__ . '\\foot.php'; ?>