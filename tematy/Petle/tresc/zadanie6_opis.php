<?php $tempi = $i?>
<h3>continue</h3>
<p>Za pomocą polecenia continue możemy pominąć bieżącą iterację i przejść do następnej:</p>
<pre><code class="language-php">$i = 0;
while ($i < 6) {
  $i++;
  if ($i == 3) continue;
  echo $i;
}</code></pre>
<pre><code><?php
$i = 0;
while ($i < 6) {
  $i++;
  if ($i == 3) continue;
  echo $i;
}?></code></pre>
<p>Zadanie: Masz tablicę $input zawierającą liczby i różne inne typy danych. Przejdź przez tablicę za pomocą pętli foreach. Jeśli element nie jest liczbą, pomiń go za pomocą instrukcji continue. Dla pozostałych elementów wypisz informację: „Liczba X jest poprawna”, a następnie dodaj je do tablicy $output.</p>
<?php $i = $tempi?>