<?php
$zestawy = array(
    array(1, 2, 3, 4, 5, 6, 7, 8),
    array("a", "b", "c"),
    array(
        "imie" => "Kamil",
        "wiek" => 25,
        "miasto" => "Gdańsk"
    ),
    (object)[
        "nazwa" => "Laptop",
        "producent" => "Dell",
        "cena" => 3999.99
    ]
);
$input = $zestawy[rand(0, count($zestawy) - 1)];
?>
