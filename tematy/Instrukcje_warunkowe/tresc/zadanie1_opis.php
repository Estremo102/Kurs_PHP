<h3>Operatory PHP</h3>
<p>
    Zanim przejdziemy do instrukcji warunkowych, powtórzmy sobie operatory w PHP. Operatory to specjalne symbole używane do wykonywania operacji na zmiennych i wartościach. W PHP operatory te dzielą się na następujące grupy:
    <ul>
        <li>Operatory arytmetyczne</li>
        <li>Operatory przypisania</li>
        <li>Operatory porównania</li>
        <li>Operatory inkrementacji/dekrementacji</li>
        <li>Operatory logiczne</li>
        <li>Operatory łańcuchowe</li>
        <li>Operatory tablicowe</li>
        <li>Operatory warunkowe</li>
    </ul>
</p>
<a href="operatory.php">Operatory omawialiśmy na ostatniej lekcji, kod który pisaliśmy znajdziesz tutaj</a>
<h4>Operatory warunkowe</h4>
<p>
    Operator trójargumentowy można porównać do funkcji jeżeli z excela <pre><code>=JEŻELI(test_logiczny; wartość_jeżeli_prawda; wartość_jeżeli_fałsz)</code></pre>
    Składnia wygląda następująco: <pre>warunek ? wartość_gdy_true : wartość_gdy_false;</pre> Przykład: 
    <pre><code class="language-php">$isAdmin = ($userRole === 'admin') ? true : false;</code></pre> 
</p>
<p>
    Operator koalescencji null czyli operator łączenia z wartością domyślną przy nullu. W PHP operator ?? zwraca pierwszą wartość, która nie jest null. To mechanizm: „jeśli ta wartość istnieje i nie jest null, użyj jej; w przeciwnym razie użyj wartości domyślnej”. <br>
    Przykład:
    <pre><code class="language-php">$username = $_GET['user'] ?? 'guest';</code></pre>
    Znaczenie: „weź $_GET['user'], a jeśli nie istnieje lub jest null, użyj 'guest'”.
</p>
<p>Twoim zadaniem jest przetłumaczenie funkcji z excela na php. <code>=JEŻELI($A1>50;"Zaliczono";"Nie zaliczono") i wyświetlenie wyniku. W kodzie masz dostęp do zmiennej $A1</code></p>