<h3>Domyślna wartość parametru</h3>
<p>Możemy parametrom funkcji przypisywać domyślne wartości, które zostaną przypisane gdy nie zostaną one podane podczas wywoływania funkcji. Przykład:</p>
<pre><code class="language-php">&lt;?php
function hello($name = "nieznajomy") {
    echo "Witaj {$name}<br>";
}

hello();
hello("Jan");
?&gt;</code></pre>
<pre><code><?php
function hello($name = "nieznajomy") {
    echo "Witaj {$name}<br>";
}

hello();
hello("Jan");
?></code></pre>
<p>
    Pamiętasz funkcję sqrt()? Jeśli nie, przypomnij sobie ją w temacie Funkcje matematyczne. Twoim zadaniem jest napisanie funkcji która pozwoli liczyć pierwiastki także innego stopnia niż pierwiastek kwadratowy. funkcja pierwiastek powinna przyjmować 2 argumenty, drugi powinien mieć wartość domyślną równą 2. <br>
    Podpowiedź: pierwiastkowanie to potęgowanie przez odwrotność. Użyj operatora potęgowania
</p>