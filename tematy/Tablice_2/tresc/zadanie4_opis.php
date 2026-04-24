<h3>Pętle po tablicach</h3>
<p>Aby przejść przez tablicę wielowymiarową, można użyć pętli for lub pętli foreach.</p>
<p>W tym przypadku używamy pętli for wewnątrz innej pętli for, aby pobrać elementy tablicy $cars (nadal musimy wskazać dwa indeksy):</p>
<pre><code class="language-php">for ($i = 0; $i < 4; $i++) {
  echo "&lt;p>&lt;b>Row number $i&lt;/b>&lt;/p>";
  echo "&lt;ul>";
    for ($j = 0; $j < 3; $j++) {
      echo "&lt;li>".$cars[$i][$j]."&lt;/li>";
    }
  echo "&lt;/ul>";
}</code></pre>
<pre><code><?php
for ($i = 0; $i < 4; $i++) {
  echo "<p><b>Row number $i</b></p>";
  echo "<ul>";
    for ($j = 0; $j < 3; $j++) {
      echo "<li>".$cars[$i][$j]."</li>";
    }
  echo "</ul>";
}
?></code></pre>
<p>Zadanie: W kodzie masz dostęp do zmiennej $tablica2D, wyświetl jej zawartość w postaci tabeli za pomocą pętli foreach.</p>