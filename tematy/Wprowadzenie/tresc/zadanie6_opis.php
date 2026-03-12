<h3>Słowa kluczowe global i static</h3>
<p>Słowo kluczowe global służy do dostępu do zmiennej globalnej z poziomu funkcji. Aby to zrobić, użyj słowa kluczowego global przed zmiennymi (wewnątrz funkcji):</p>
<pre><code class="language-php">&lt?php
    $x = 5;
    function Test2() {
        global $x;
        echo $x;
    }
    Test2();
?&gt</code></pre>
Wynik powyższego kodu to:
<pre><code><?php
$x = 5;
    function Test2() {
        global $x;
        echo $x;
    }
    Test2();
    ?></code></pre>
<p>Słowo kluczowe static służy do deklarowania zmiennych statycznych wewnątrz funkcji. Zmienne statyczne zachowują swoją wartość między wywołaniami funkcji:</p>
<pre><code class="language-php">&lt?php
    function Test3() {
        static $x = 0;
        echo $x;
        $x++;
    }
    Test3();
    Test3();
    Test3();
?&gt</code></pre>
Wynik powyższego kodu to:
<pre><code><?php
    function Test3() {
        static $x = 0;
        echo $x;
        $x++;
    }
    Test3();
    Test3();
    Test3();
    ?></code></pre>
<p>Twoim zadaniem jest stworzenie zmiennej globalnej $x i przypisanie jej wartości 0, oraz funkcji która będzię tę zmienną zwiększać o taką wartość ile razy została wywołana. Następnie wywołaj funkcję 3 razy i za każdym razem wypisz wartość zmiennej $x oraz znacznik &ltbr&gt</p>
                