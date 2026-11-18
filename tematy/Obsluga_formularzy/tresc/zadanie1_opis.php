<?php
$login = $_POST['login'] ?? null;
$haslo = $_POST['password'] ?? null;
?>

<h3>$_GET i $_POST</h3>
<p>Zmienne superglobalne $_GET i $_POST służą do zbierania danych z formularza.</p>
<pre><code class="language-html">&lt;form action="login.php" method="post">
Login: &lt;input type="text" name="login">&lt;br>
Hasło: &lt;input type="password" name="password">&lt;br>
&lt;input type="submit">
&lt;/form></code></pre>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?title=Obsługa+formularzy&src=Obsluga_formularzy'; ?>" method="post">
Login: <input type="text" name="login"><br>
Hasło: <input type="password" name="password"><br>
<input type="submit">
</form>

<?php if ($login !== null && $haslo !== null): ?>
Login: <?= htmlspecialchars($login, ENT_QUOTES, 'UTF-8') ?><br>
Hasło: <?= str_repeat('•', mb_strlen($haslo, 'UTF-8')) ?>
<?php endif; ?>

<p>Gdy użytkownik wypełni formularz, dane zostaną przekazane do pliku login.php, aby w nim je wyświetlić wystarczy użyć funkcji echo</p>
<pre><code class="language-php">&lt;?php
echo 'login: '.  $_POST["login"];  .'&lt;br>';
echo 'Hasło: '. str_repeat('•', mb_strlen($haslo, 'UTF-8'));
?></code></pre>

<p>Zadanie: Poniżej jest formularz wysyłający zapytanie do pliku rozwiazania/zadanie1.php, napisz kod który wyświetli div z odpowiednim kolorem tła</p>
<form action="<?= htmlspecialchars(str_replace(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '', str_replace('\\', '/', __DIR__ . '/../rozwiazania/zadanie1.php')), ENT_QUOTES, 'UTF-8') ?>" method="post">
Kolor tła:
<select name="color">
<option value="red">Czerwony</option>
<option value="green">Zielony</option>
<option value="blue">Niebieski</option>
<option value="yellow">Żółty</option>
</select>
<input type="submit" value="Wyślij">
</form>