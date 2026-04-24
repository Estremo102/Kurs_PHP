<h3>Tablice wielowymiarowe</h3>
<p>
    Tablica wielowymiarowa to tablica zawierająca jedną lub więcej tablic. <br>
    PHP obsługuje tablice wielowymiarowe o głębokości dwóch, trzech, czterech, pięciu lub więcej poziomów. Jednak tablice o głębokości większej niż trzy poziomy są trudne w obsłudze dla większości użytkowników.
</p>
<h4>Tablica dwuwymiarowa</h4>
<p>
    Tablica dwuwymiarowa to tablica tablic. Przykładowo taka tabela
    <table>
        <tr>
            <th>Nazwa</th>
            <th>Na stanie</th>
            <th>Sprzedane</th>
        </tr>
        <tr>
            <td>Volvo</td>
            <td>32</td>
            <td>13</td>
        </tr>
        <tr>
            <td>BMW</td>
            <td>31</td>
            <td>43</td>
        </tr>
        <tr>
            <td>Saab</td>
            <td>6</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Land Rover</td>
            <td>42</td>
            <td>72</td>
        </tr>
    </table>
    Utworzenie tablicy na podstawie powyższej tabeli wyglądałoby następująco:
</p>
<pre><code class="language-php">$cars = array (
  array("Volvo", 32, 13),
  array("BMW", 31, 43),
  array("Saab", 6, 2),
  array("Land Rover", 42, 72)
);

echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".&lt;br&gt;";
echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".&lt;br&gt;";
echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".&lt;br&gt;";
echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".&lt;br&gt;";</code></pre>
<pre><code><?php
$cars = array (
  array("Volvo", 32, 13),
  array("BMW", 31, 43),
  array("Saab", 6, 2),
  array("Land Rover", 42, 72)
);

echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";
?></code></pre>
<p>Zadanie: Napisz funkcję która przyjmuje tablicę dwuwymiarową oraz numer indeksu do wyszukania samochodu i zmniejszająca ilość samochodów na stanie i zwiększającą ilość sprzedanych.</p>