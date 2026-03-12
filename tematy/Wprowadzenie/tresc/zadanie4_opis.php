<h3>Typy danych w PHP</h3>
<p>PHP obsługuje następujące typy danych:
    <ul>
        <li>String - ciąg znaków, np. "Hello world!"</li>
        <li>Integer - liczba całkowita, np. 42</li>
        <li>Float - liczba zmiennoprzecinkowa, np. 3.14</li>
        <li>Boolean - wartość logiczna, true lub false</li>
        <li>Array - tablica, np. array("jabłko", "banan", "gruszka")</li>
        <li>Object - obiekt, np. instancja klasy</li>
        <li>NULL - specjalna wartość oznaczająca brak wartości</li>
        <li>Resource - specjalna zmienna, zawierająca referencję do zasobu zewnętrznego. </li>
    </ul>
</p>
<p>Aby uzyskać typ danych zmiennej, należy użyć funkcji var_dump().</p>
<pre><code class="language-php">&lt?php
    var_dump(5) . "&ltbr&gt";
    var_dump("John") . "&ltbr&gt";
    var_dump(3.14) . "&ltbr&gt";
    var_dump(true) . "&ltbr&gt";
    var_dump([2, 3, 56]) . "&ltbr&gt";
    var_dump(NULL) . "&ltbr&gt";
?&gt</code></pre>
<p>wynik działania powyższego kodu:</p>
<pre><?php
        var_dump(5) . "<br>";
        var_dump("John") . "<br>";
        var_dump(3.14) . "<br>";
        var_dump(true) . "<br>";
        var_dump([2, 3, 56]) . "<br>";
        var_dump(NULL) . "<br>";
    ?>
</pre>
<p>Twoim zadaniem jest wyświetlenie typu danych tablicy która będzie zawierać wszystkie zmienne z powyższego przykładu z pominięciem tablicy</p>
                