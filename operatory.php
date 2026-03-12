<?php
    // operatory arytmetyczne
    echo 'operator dodawania: ' . 2 + 2 . '<br>'; // + operator dodawania
    echo 'operator odejmowania: ' . 2 - 2 . '<br>'; // + operator odejmowania
    echo 'operator mnożenia: ' . 2 * 2 . '<br>'; // + operator mnożenia
    echo 'operator dzielenia: ' . 2 / 2 . '<br>'; // + operator dzielenia
    echo 'operator modulo: ' . 2 % 2 . '<br>'; // + operator modulo
    echo 'operator potęgowania: ' . 2 ** 2 . '<br>'; // + operator potęgowania

    echo '<br>';

    //operatory przypisania
    $x = 21;
    echo  $x . '<br>';
    $x += 16;
    echo  $x . '<br>';
    $x -= 33;
    echo  $x . '<br>';
    $x *= 5;
    echo  $x . '<br>';
    $x /= 6;
    echo  $x . '<br>';
    $x %= 1;
    echo  $x . '<br>';

    echo '<br>';

    echo '== Operator równości, 2 == \'2\' → ';
    var_dump(2 == '2');
    echo '<br>=== Operator identyczności, 2 === \'2\' → ';
    var_dump(2 === '2');
    echo '<br>!= Operator nierówności, 2 != \'2\' → ';
    var_dump(2 != '2');
    echo '<br>!== Operator nieidentyczności, 2 !== \'2\' → ';
    var_dump(2 !== '2');
    echo '<br>&lt;&gt; Operator nierówności, 2 &lt;&gt; \'2\' → ';
    var_dump(2 <> '2');
    echo '<br>&lt; Operator mniejszości, 2 &lt; \'3\' → ';
    var_dump(2 < '3');
    echo '<br>&gt; Operator większości, 2 &gt; \'3\' → ';
    var_dump(2 > '3');
    echo '<br>&lt;= Operator mniejszości lub równości, 2 &lt;= \'2\' → ';
    var_dump(2 <= '2');
    echo '<br>&gt;= Operator większości lub równości, 2 &gt;= \'2\' → ';
    var_dump(2 >= '2');
    echo '<br>&lt;=&gt; Operator Spaceship, 2 &lt;=&gt; 2 → ';
    var_dump(2 <=> 2);
    echo '<br>10 &lt;=&gt; 20 → ';
    var_dump(10 <=> 20);
    echo '<br>200 &lt;=&gt; 100 → ';
    var_dump(200 <=> 100);

    echo '<br>';

    //Operatory inkrementacji i dekrementacji
    echo $x;
    echo '<br>' . $x++;
    echo '<br>' . $x;
    echo '<br>' . ++$x;
    echo '<br>' . $x;
    echo '<br>' . $x--;
    echo '<br>' . $x;
    echo '<br>' . --$x;
    echo '<br>' . $x;

    echo '<br>';
    
    //Operatory logiczne
    echo '<br>true and true → ';
    var_dump(true and true);
    echo '<br>true && true → ';
    var_dump(true && true);
    echo '<br>true or true → ';
    var_dump(true or true);
    echo '<br>true || true → '; 
    var_dump(true || true);
    echo '<br>true xor true → '; 
    var_dump(true xor true);
    echo '<br>!true → ';
    var_dump(!true);

    echo '<br>';

    //Operatory ciągów znaków
    echo '<br>' . 'tekst 1 ' . 'tekst 2' . '<br>';
    $x .= '<br>';
    echo $x . $x;

    echo '<br>';

    //operatory tablic
    $x = array("a" => 1, "b" => 2);
    $y = array("c" => 3, "d" => 4);
    print_r($x + $y);
    echo '<br>';
    $x = array(1, 2);
    $y = array(3, 4, 5);
    print_r($x + $y);
    echo '<br>';
    echo '<br>';
    var_dump($x == $y);
    var_dump($x === $y);
    var_dump($x != $y);
    var_dump($x <> $y);
    var_dump($x !== $y);

    echo '<br>';

    //Operatory warunkowe
    //warunek logiczny ? jeżeli prawda : jeżeli fałsz
    $x = 2;
    echo '<br>';
    echo $x == 2 ? 'x wynosi 2' : 'x nie wynosi 2';
    $x = 3;
    echo '<br>';
    echo $x == 2 ? 'x wynosi 2' : 'x nie wynosi 2<br>';

    $y = $x ?? 2;
    echo $y . '<br>';
    $x = NULL;
    $y = $x ?? 2;
    echo $y . '<br>';
    $name = $_GET["user"] ?? "nieznajomy";
    echo "Witaj $name!";
?>