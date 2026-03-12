<h3>Liczby</h3>
<p>W PHP istnieją trzy główne typy liczbowe: Integer (np. 21), Float (np. 3.7) i Number Strings (np. "2"), a także dwa dodatkowe typy danych używane dla liczb: Infinity i NaN.</p>
<h3>Integer</h3>
<p>Liczba całkowita to liczba bez części dziesiętnej, z zakresu od -2147483648 do 2147483647 w systemach 32-bitowych oraz od -9223372036854775808 do 9223372036854775807 w systemach 64-bitowych. Wartość spoza tego zakresu zostanie zapisana jako liczba zmiennoprzecinkowa, ponieważ przekracza limit liczby całkowitej. Funkcja is_int() służy do sprawdzania, czy zmienna jest typu całkowitego.</p>
<h3>Float</h3>
<p>Zmienna typu float to liczba z przecinkiem dziesiętnym lub liczba w postaci wykładniczej np.: 2.0, 256.4, 10.358, 7.64E+5, 5.56E-5 to zmiennoprzecinkowe. Typ danych float zazwyczaj może przechowywać wartość do 1.7976931348623E+308 (w zależności od platformy) i ma maksymalną precyzję 14 cyfr. Funkcja is_float() służy do sprawdzania, czy zmienna jest typu float.</p>
<p>
    PHP ma następujące predefiniowane stałe dla liczb zmiennoprzecinkowych (od PHP 7.2):
    <ul>
        <li>PHP_FLOAT_MAX - największa reprezentowalna liczba zmiennoprzecinkowa</li>
        <li>PHP_FLOAT_MIN - najmniejsza reprezentowalna dodatnia liczba zmiennoprzecinkowa</li>
        <li>PHP_FLOAT_DIG - liczba cyfr dziesiętnych, które można zaokrąglić do liczby zmiennoprzecinkowej i z powrotem bez utraty precyzji</li>
        <li>PHP_FLOAT_EPSILON - najmniejsza reprezentowalna dodatnia liczba x, taka że x + 1,0 != 1,0</li>
    </ul>
</p>
<h3>Infinity</h3>
<p>Wartość jest nieskończona, jeśli znajduje się poza dozwolonym zakresem dla typu float PHP na tej platformie. Funkcja is_finite() zwraca prawdę jeśli wartość jest skończona, a funkcja is_infinite() zwraca prawdę jeśli wartość jest nieskończona.</p>
<h3>NaN</h3>
<p>NaN oznacza Not a Number (nie liczba). NaN jest używane w przypadku niewykonalnych operacji matematycznych. Np: pierwiastek z -1 wynosi i czyli liczbę spoza zbioru liczb rzeczywistych, więc sqrt(-1) zwróci NaN. Funkcja is_nan() służy do sprawdzania, czy wartość nie jest liczbą.</p>
<h3>Number String</h3>
<p>Ciągi liczbowe w PHP to zmienne typu string które można przekonwertować na typ liczbowy. Funkcja is_numeric() zwraca wartość true, jeśli zmienna jest liczbą lub ciągiem liczbowym.</p>
<h3>Zadanie</h3>
<p>Twoim zadaniem jest utworzenie zmiennych int, f, inf, nan i number i przypisanie im wartości wyżej opisywanych typów danych.</p>
            