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
<p>Zadanie: Funkcje 4 ale regexem</p>