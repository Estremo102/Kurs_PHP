<?php
$rand = array(
    array(1, 2, 3, 4, 5, 6, 7, 8),
    array("a", "b", "c"),
    array(
        "imie" => "Kamil",
        "wiek" => 25,
        "miasto" => "Gdańsk"
    ),
    array(true, false, null, 3.14, "tekst"),
    array(
        "kolory" => array("red", "green", "blue"),
        "liczby" => array(10, 20, 30)
    ),
    array(
        (object)["model" => "Audi", "rok" => 2010],
        (object)["model" => "BMW", "rok" => 2015]
    ),
    (object)[
        "nazwa" => "Laptop",
        "producent" => "Dell",
        "cena" => 3999.99
    ]
);
$input = $rand[rand(0,7)];
?>