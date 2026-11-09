<h3>preg_replace()</h3>
<p>W temacie <a href="?title=Funkcje&src=Funkcje#zadanie4">Funkcje</a> pojawiło się zadanie które można było wykonać używając regexa. preg_replace() został okreśony jako  bardziej rozbudowana wersja str_replace(). Działanie obu funkcji jest bardzo podobne, z tą różnicą, że preg_replace() podmienia tekst dopasowany do wzorca RegEx. Przykład:</p>
<pre><code class="language-php">$str = "Tutaj jest ściernisko";
$pattern = "/ściernisko/i";
echo preg_replace($pattern, "San Francisco", $str);</code></pre>
<pre><code><?php 
    $str = "Tutaj jest ściernisko";
    $pattern = "/ściernisko/i";
    echo preg_replace($pattern, "San Francisco", $str); 
?></code></pre>
<p>Zadanie: Wykonaj podobne zadanie jak w temacie Funkcje, ale za pomocą wyrażeń regularnych. W kodzie masz dostęp do zmiennej $tekst:</p>
<pre><code class="language-php">$tekst = "   Ala   ma    kota   ";</code></pre>
<p>Za pomocą preg_replace() usuń spacje z początku i końca tekstu oraz zamień wielokrotne spacje na jedną. Wynik zapisz w zmiennej $oczyszczony. Nie używaj funkcji trim(), explode(), implode() ani str_replace().</p>