<h3>$_POST</h3>
<p>zmienna $_POST zawiera tablicę zmiennych otrzymanych za pomocą metody HTTP POST. Jeśli atrybut formuarza method jest ustawiony na "post", formularz przesyła dane za jej pomocą.</p>
<p>Przykład: formularz z polem email i odczyt przesłanej wartości:</p>
<pre><code class="language-php">&lt;form method="post"&gt;
    &lt;input type="email" name="email"&gt;
    &lt;button type="submit"&gt;Wyślij&lt;/button&gt;
&lt;/form&gt;
&lt;?php
if (isset($_POST["email"])) {
    echo "Podany email: " . $_POST["email"];
}
?&gt;</code></pre>
<p><span class="important">Zadanie: </span> Utwórz formularz wysyłający dane metodą POST z polem tekstowym o nazwie "imie" i przyciskiem. Jeśli formularz został wysłany, wyświetl pod nim napis "Witaj, {imie}".</p>
<p>Wynik zadania jest wyświetlany wewnątrz tej strony, więc wysłanie formularza stąd nie trafi do Twojego kodu. Aby przetestować formularz, otwórz swój plik bezpośrednio w przeglądarce: <a href="tematy/Zmienne_superglobalne/rozwiazania/zadanie5.php">tematy/Zmienne_superglobalne/rozwiazania/zadanie5.php</a></p>