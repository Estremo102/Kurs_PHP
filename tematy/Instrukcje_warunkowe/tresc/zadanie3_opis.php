<h3>Operatory w instrukcji warunkowej</h3>
<p>W nawiasie po słowie kluczowym if wartość powinna mieć wartość true lub false. Wartości te możemy po prostu wprowadzić, tak jak w poprzednim zadaniu, gdzie instrukcja warunkowa otrzymywała zmienną typu boolean.</p>
<p>Najczęściej jednak za pomocą operatorów logicznych uzyskujemy wartości logiczne z innych danych. Przykładowo możemy porównać czy dana zmienna jest równa konkretnej liczbie:</p>
<pre><code class="language-php">$t = 14;

if ($t == 14) {
  echo "Miłego dnia!";
}</code></pre>
<p>Do porównania dwóch wartości używamy operatorów porównania:</p>
<table>
    <tr>
        <th>Operator</th>
        <th>Nazwa</th>
        <th>Opis</th>
    </tr>
    <tr>
        <td>==</td>
        <td>Równość</td>
        <td>Sprawdza czy dwie wartości są równe</td>
    </tr>
    <tr>
        <td>===</td>
        <td>Identyczność</td>
        <td>Sprawdza czy dwie wartości są równe i tego samego typu</td>
    </tr>
    <tr>
        <td>!= / <></td>
        <td>Nierówność</td>
        <td>Sprawdza czy dwie wartości są różne</td>
    </tr>
    <tr>
        <td>!==</td>
        <td>Nieidentyczność</td>
        <td>Sprawdza czy dwie wartości nie są identyczne</td>
    </tr>
    <tr>
        <td><</td>
        <td>Mniejsze niż</td>
        <td>Sprawdza czy pierwsza wartość jest mniejsza od drugiej</td>
    </tr>
    <tr>
        <td>></td>
        <td>Większe niż</td>
        <td>Sprawdza czy pierwsza wartość jest większa od drugiej</td>
    </tr>
    <tr>
        <td><=</td>
        <td>Mniejsze lub równe</td>
        <td>Sprawdza czy pierwsza wartość jest mniejsza lub równa drugiej</td>
    </tr>
    <tr>
        <td>>=</td>
        <td>Większe lub równe</td>
        <td>Sprawdza czy pierwsza wartość jest większa lub równa drugiej</td>
    </tr>
</table>
<p>Możemy łączyc kilka warunków logicznych za pomocą operatorów logicznych</p>
<table>
    <tr>
        <th>Operator</th>
        <th>Nazwa</th>
        <th>Opis</th>
    </tr>
    <tr>
        <td>&& / and</td>
        <td>AND (i)</td>
        <td>Zwraca true jeśli oba warunki są spełnione</td>
    </tr>
    <tr>
        <td>|| / or</td>
        <td>OR (lub)</td>
        <td>Zwraca true jeśli co najmniej jeden warunek jest spełniony</td>
    </tr>
    <tr>
        <td>xor</td>
        <td>XOR (alternatywa wykluczająca)</td>
        <td>Zwraca true jeśli dokładnie jeden z warunków jest spełniony</td>
    </tr>
    <tr>
        <td>!</td>
        <td>NOT (negacja)</td>
        <td>Zwraca negację warunku - odwraca false na true i vice versa</td>
    </tr>
</table>
<p>Przykład:</p>
<pre><code class="language-php">$a = 200;
$b = 33;
$c = 500;

if ($a > $b && $a < $c ) {
  echo "Oba warunki są prawdziwe";
}</code></pre>
<p>Zadanie: W kodzie masz dostęp do zmiennych $a, $b oraz $c które przyjmują losowe wartości liczbowe. Jeśli nie jest prawdą, że $a jest mniejsze od $b oraz $b jest mniejsze od $c wyświetl napis "wylosowane liczby nie są ciągiem rosnącym"</p>