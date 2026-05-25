<h3>Funkcje preg_match() i preg_match_all()</h3>
<h4>Funkcje RegEx</h4>
<ul>
    <li>preg_match() - Zwraca 1, jeśli wzorzec został znaleziony w ciągu znaków, i 0, jeśli nie.</li>
    <li>preg_match_all() - Zwraca liczbę przypadków znalezienia wzorca w ciągu znaków.</li>
    <li>preg_replace() - Zwraca nowy ciąg znaków, w którym dopasowane wzorce są zastępowane innym ciągiem znaków.</li>
    <li>preg_split() - Dzieli ciąg znaków na tablicę, używając dopasowań wyrażeń regularnych jako separatorów.</li>
    <li>preg_grep() - Zwraca tablicę zawierającą tylko elementy z wejścia, które pasują do podanego wzorca.</li>
</ul>
<h4>preg_match()</h4>
<p>Funkcja preg_match($wzorzec, $tekst) zwraca 1 gdy w zmiennej $tekst zostanie odnaleziony $wzorzec, w przeciwnym wypadku funkcja zwraca 0.</p>
<pre><code class="language-php">$str = "Funkcja preg_match($wzorzec, $tekst) zwraca 1 gdy w zmiennej $tekst zostanie odnaleziony $wzorzec, w przeciwnym wypadku funkcja zwraca 0.";
$pattern = "/preg_match/i";
echo preg_match($pattern, $str) . '&lt;br&gt;';
echo preg_match("/preg_match_all/i", $str);</code></pre>
<code><pre><?php
$str = 'Funkcja preg_match($wzorzec, $tekst) zwraca 1 gdy w zmiennej $tekst zostanie odnaleziony $wzorzec, w przeciwnym wypadku funkcja zwraca 0.';
$pattern = "/preg_match/i";
echo preg_match($pattern, $str) . '<br>';
echo preg_match("/preg_match_all/i", $str);
?></pre></code>
<h4>preg_match_all()</h4>
<p>preg_match_all($wzorzec, $tekst), nie tylko sprawdza czy wzorzec w tekście występuje, ale także ilukrotnie.</p>
<pre><code class="language-php">$lorem = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui fugit sunt asperiores repellendus, iure laborum veniam, totam harum quas libero perferendis officia, similique nulla beatae nam quam sint earum dolorem.';
echo preg_match_all("/lorem/i", $lorem);
</code></pre>
<code><pre><?php
$lorem = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui fugit sunt asperiores repellendus, iure laborum veniam, totam harum quas libero perferendis officia, similique nulla beatae nam quam sint earum dolorem.';
echo preg_match_all("/lorem/i", $lorem);
?></pre></code>
<p>Zadanie:</p>