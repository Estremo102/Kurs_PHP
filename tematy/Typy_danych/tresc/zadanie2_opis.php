<h3>Ciągi znaków</h3>
<p>Ciągi znaków w PHP są ujęte w podwójne lub pojedyncze cudzysłowy. W PHP istnieje duża różnica między cudzysłowami podwójnymi a pojedynczymi. Podwójne cudzysłowy przetwarzają znaki specjalne, a pojedyncze nie.</p>
<p>Możesz używać podwójnych lub pojedynczych cudzysłowów, ale powinieneś być świadomy różnic między nimi. Ciągi znaków w podwójnych cudzysłowach wykonują operacje na znakach specjalnych. Np. gdy w ciągu znajduje się zmienna, funkcja zwraca wartość tej zmiennej:</p>
<pre><code class="language-php">$cena = 21;
echo "Produkt kosztuje $cena złotych";</code></pre>
<p>Ciągi znaków w pojedynczych cudzysłowach nie wykonują takich akcji, zwracają ciąg znaków tak, jak został napisany, z nazwą zmiennej. Dzięki temu jest wydajniejszy od podwójnego cudzysłowia.</p>
<p>
    Funkcja PHP strlen('tekst') zwraca długość ciągu znaków. <br>
    Funkcja PHP str_word_count('tekst') zlicza liczbę słów w ciągu znaków. <br>
    Funkcja PHP strpos('tekst', 'poszukiwany tekst') wyszukuje określony tekst w ciągu znaków. <br>
    W przypadku znalezienia dopasowania funkcja zwraca pozycję znaku pierwszego dopasowania. W przypadku braku dopasowania zwróci FALSE.
</p>
<p>
    Uwaga: funkcje strlen() i strpos() liczą bajty, a nie znaki, więc polskie litery (zapisywane na 2 bajtach) zawyżają wynik. Aby liczyć znaki, użyj ich odpowiedników mb_strlen() i mb_strpos(). Funkcja str_word_count() również nie rozpoznaje polskich liter i traktuje je jak separatory słów.
</p>
<p>
    Dana jest zmienna $tekst o wartości:
</p>
<pre><code class="language-php">$tekst = "Nie wiadomo czy ta historia jest prawdziwa. Sam Herodot zastrzega się, że usłyszał ją od  egipskich kapłanów, ale jej echo do dziś pobrzmiewa w nazwie geometria.";</code></pre>
<p>
    Twoim zadaniem jest sprawdzenie długości tekstu, liczby słów oraz pozycji słowa "że" w zmiennej $tekst. <br>
    Wyniki zapisz kolejno w zmiennych $len, $words, $pos, a następnie wypisz je oddzielone spacjami.
</p>
            