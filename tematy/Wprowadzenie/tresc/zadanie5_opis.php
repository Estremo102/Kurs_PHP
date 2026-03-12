<h3>Zasięg zmiennych PHP</h3>
<p>W PHP zmienne można deklarować w dowolnym miejscu skryptu. Zasięg zmiennej to część skryptu, w której można się do niej odwoływać/używać. W PHP istnieją trzy różne zasięgi zmiennych:</p>
<ul>
    <li>zmienne lokalne - są tworzone wewnątrz funkcji i są dostępne tylko w obrębie tej funkcji. Poza funkcją nie można się do nich odwoływać.</li>
    <li>zmienne globalne - są tworzone poza funkcjami i są dostępne w całym skrypcie. Aby uzyskać dostęp do zmiennej globalnej wewnątrz funkcji, należy użyć słowa kluczowego global.</li>
    <li>zmienne statyczne - są tworzone wewnątrz funkcji i zachowują swoją wartość między wywołaniami funkcji. Aby zadeklarować zmienną statyczną, należy użyć słowa kluczowego static.</li>
</ul>
<p>Twoim zadaniem jest utowrzenie zmiennej globalnej $x i przypisanie jej wartości 3 oraz zmiennej $x lokalnej wewnątrz funkcji i przypisanie jej wartości 5</p>
<pre><code class="language-php">&lt;?php
    function Test1() {
      echo "<p>Zmienna x wewnątrz funkcji wynosi: $x</p>";
    }
    Test1();
    
    echo "<p>Zmienna x na zewnątrz funkcji wynosi: $x</p>";
?&gt;</code></pre>
    