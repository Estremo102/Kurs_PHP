<h3>Usuwanie elementów tablicy</h3>
<p>Możemy na kilka sposobów usuwać elementy z tablicy</p>
<ul>
    <li>array_splice() - usuwa fragment tablicy, zaczynając od pozycji początkowej i długości</li>
    <li>unset() - usuwa element powiązany z określonym kluczem</li>
    <li>array_diff() - zwraca elementy pierwszej tablicy, których nie ma w kolejnych tablicach, dzięki czemu można usunąć wybrane wartości</li>
    <li>array_pop() - usuwa ostatni element tablicy</li>
    <li>array_shift() - usuwa pierwszy element tablicy</li>
</ul>
<p>Zadanie: przetestuj, jak działają poszczególne funkcje. Utwórz tablicę i usuń z niej elementy każdym z powyższych sposobów (array_splice(), unset(), array_diff(), array_pop() i array_shift()), a po każdej operacji wyświetl tablicę za pomocą print_r().</p>