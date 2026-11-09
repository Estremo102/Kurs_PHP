<?php
// opcje zadania losowane na podstawie nazwy użytkownika; wzorzec ma dopasować cały tekst
$opcje_regex = [
    [
        'opis' => 'kod pocztowy w formacie XX-XXX (dwie cyfry, myślnik, trzy cyfry)',
        'pasuje' => ['00-950', '62-800', '99-999'],
        'nie_pasuje' => ['00950', '0-950', '00-9500', 'a0-950', ' 00-950', '00-95a'],
    ],
    [
        'opis' => 'numer telefonu składający się z 9 cyfr, zapisanych razem lub w trzech grupach po 3 cyfry oddzielonych pojedynczą spacją',
        'pasuje' => ['123456789', '123 456 789', '600 100 200'],
        'nie_pasuje' => ['12345678', '1234567890', '123-456-789', '12 345 6789', 'abc456789', '123  456 789'],
    ],
    [
        'opis' => 'godzinę w formacie HH:MM od 00:00 do 23:59',
        'pasuje' => ['00:00', '08:30', '19:05', '23:59'],
        'nie_pasuje' => ['24:00', '23:60', '8:30', '12:5', '12-30', '123:00'],
    ],
    [
        'opis' => 'datę w formacie DD.MM.RRRR, gdzie dzień to 01–31, a miesiąc 01–12',
        'pasuje' => ['01.09.2025', '31.12.1999', '15.06.2000'],
        'nie_pasuje' => ['1.09.2025', '32.01.2020', '10.13.2020', '01-09-2025', '01.09.25', '00.01.2020'],
    ],
    [
        'opis' => 'kolor w zapisie szesnastkowym #RRGGBB (znak #, a po nim 6 cyfr 0–9 lub liter a–f, małych lub wielkich)',
        'pasuje' => ['#ff0000', '#1A2B3C', '#000000'],
        'nie_pasuje' => ['ff0000', '#ff000', '#ff00000', '#gg0000', '#ff 000'],
    ],
    [
        'opis' => 'login o długości od 3 do 16 znaków, składający się z liter (bez polskich znaków), cyfr i znaku _, zaczynający się od litery',
        'pasuje' => ['jan', 'Jan_Kowalski', 'a12', 'abcdefghijklmnop'],
        'nie_pasuje' => ['ab', '1jan', '_jan', 'abcdefghijklmnopq', 'jan kowalski', 'jan-k'],
    ],
];
?>
