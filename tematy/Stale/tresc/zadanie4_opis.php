<h3>Magiczne stałe w PHP</h3>
<p>PHP ma dziewięć predefiniowanych stałych, których wartość zmienia się w zależności od miejsca użycia, zwanych również „magicznymi stałymi”. Magiczne stałe dostarczają informacji o bieżącym stanie skryptu, takich jak nazwa pliku, nazwa katalogu, numer wiersza, nazwa funkcji, nazwa klasy i inne. Magiczne stałe zawsze zaczynają się i kończą podwójnym podkreśleniem (__), z wyjątkiem stałej ClassName::class. Magiczne stałe nie rozróżniają wielkości liter, co oznacza, że ​​__LINE__ zwraca to samo, co __line__. Poniżej jest lista stałych magicznych wraz z opisami i przykładami:</p>
<ul>
    <li>__CLASS__ Jeśli użyta wewnątrz klasy, zwracana jest nazwa klasy.</li>
    <li>__DIR__ Katalog pliku.</li>
    <li>__FILE__ Nazwa pliku wraz z pełną ścieżką.</li>
    <li>__FUNCTION__ Jeśli użyta wewnątrz funkcji, zwracana jest nazwa funkcji.</li>
    <li>__LINE__ Numer bieżącego wiersza pliku.</li>
    <li>__METHOD__ Jeśli użyta wewnątrz funkcji należącej do klasy, zwracana jest zarówno nazwa klasy, jak i funkcja.</li>
    <li>__NAMESPACE__ Jeśli użyta wewnątrz przestrzeni nazw, zwracana jest nazwa tej przestrzeni.</li>
    <li>__TRAIT__ Jeśli użyta wewnątrz cechy, zwracana jest nazwa cechy.</li>
    <li>ClassName::class Zwraca nazwę określonej klasy i nazwę przestrzeni nazw, jeśli istnieje.</li>
</ul>
<p>Wyświetl wszystkie stałe i sprawdź które zwrócą jakąś wartość, a które zwrócą NULL</p>