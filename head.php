<?php header('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
            $title = isset($title) ? $title : ucfirst(explode('.', basename($_SERVER['PHP_SELF']))[0]);
            $title = $title == 'Index' ? 'Strona Główna' : $title;
            $title = str_replace("_", " ", $title);
            echo $title;
            ?>
    </title>
    <link rel="stylesheet" href="/php/style.css">
    <link rel="stylesheet" href="/php/prism.css">
    <script src="script.js" defer></script>
    <script src="/php/prism.js" defer></script>
    <link rel="shortcut icon" href="/php/images/PHP-logo.svg" type="image/x-icon">
</head>
<body>
    <header>
        <a href="/php/index.php"><img src="/php/images/PHP-logo.svg"></a> <h1> <?php echo "Kurs PHP - $title"; ?> </h1>
    </header>