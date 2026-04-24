<h3>Sortowanie tablic</h3>
<p>Bardzo często chcemy mieć dane w tablicy posortowane. Przykładowo może to umożliwić szybsze wyszukiwanie danych. Język PHP oferuje róźne funkcje sortujące.</p>
<ul>
    <li>sort() - sortuje tablicę indeksowaną w kolejności rosnącej</li>
    <li>rsort() - sortuje tablicę indeksowaną w kolejności malejącej</li>
    <li>asort() - sortuje tablicę asocjacyjną w kolejności rosnącej, według wartości</li>
    <li>ksort() - sortuje tablicę asocjacyjną w kolejności rosnącej, według klucza</li>
    <li>arsort() - sortuje tablicę asocjacyjną w kolejności malejącej, według wartości</li>
    <li>krsort() - sortuje tablicę asocjacyjną w kolejności malejącej, według klucza</li>
</ul>
<p>Wbudowane funkcje sortujące działają na oryginalnej tablicy, wywołując powyższe funkcje nie używamy więc operatora przypisania.</p>
<pre><code class="language-php">$cars = array("Volvo", "BMW", "Toyota");
sort($cars);
print_r($cars);</code></pre>
<pre><code><?php 
$cars = array("Volvo", "BMW", "Toyota");
sort($cars);
print_r($cars);
?></code></pre>
<p>Zadanie: Masz dostęp do zmiennych $indeksowana przechowującą tablicę indeksowaną i $asocjacyjna przechowującą tablicę asocjacyjną. Posortuj tablice odpowiednimi funkcjami.</p>