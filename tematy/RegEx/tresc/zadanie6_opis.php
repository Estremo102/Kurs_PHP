<h3>preg_split() i preg_grep()</h3>
<h4>preg_split()</h4>
<p>funkcja preg_split() działa podobnie do explode(), jednak umożliwia wykorzystanie RegEx. explode() jest szybsze, jednak preg_split oferuje większe możliwości dzięki wyrażeniom regularnym.</p>
<pre><code class="language-php">$str = "Ten tekst zostanie podzielony na pojedyczne słowa.";
$pattern = "/[\s:]/";
$components = preg_split($pattern, $str);
print_r($components);</code></pre>
<pre><code><?php
$str = "Ten tekst zostanie podzielony na pojedyczne słowa.";
$pattern = "/[\s:]/";
$components = preg_split($pattern, $str);
print_r($components);
?></code></pre>
<h4>preg_grep()</h4>
<p>Funkcja preg_grep() zwraca tablicę zawierającą tylko elementy wejściowe, które pasują do podanego wzorca.</p>
<pre><code class="language-php">$input = [
"Langosz",
"San Francisco",
"Mleko",
"Śpiewak w klatce",
"Grzeczny robak",
"Kaktus",
"Cisco Systems"
];

$result = preg_grep("/cisco/i", $input);
print_r($result);</code></pre>
<pre><code><?php
$input = [
"Langosz",
"San Francisco",
"Mleko",
"Śpiewak w klatce",
"Grzeczny robak",
"Kaktus",
"Cisco Systems"
];

$result = preg_grep("/cisco/i", $input);
print_r($result);
?></code></pre>
<p>Zadanie: W kodzie masz dostęp do zmiennej $lista z nazwami owoców oddzielonymi przecinkami, średnikami lub spacjami (również kilkoma naraz):</p>
<pre><code class="language-php">$lista = "jabłko, gruszka;śliwka  banan;;wiśnia,malina truskawka";</code></pre>
<p>Za pomocą preg_split() podziel ją na tablicę $owoce (bez pustych elementów), a następnie za pomocą preg_grep() wybierz z niej owoce kończące się na literę "a" i zapisz je w tablicy $na_a.</p>