<h3>include i require</h3>
<p>
    Polecenia include i require pobierają zawartość ze wskazanego pliku i wstawiają go na stronę. Jest to przydatne przy fragmentach strony które często się powtarzają. Różnicą między include, a require jest zachowanie w przypadku wystąpienia błędu. W przypadku include pojawi się ostrzeżenie, jednak skrypt będzie wykonywany dalej. W przypadku require pojawi się błąd krytyczny i wykonywanie skryptu zostanie zatrzymane. <br>
    Składnia wygląda następująco:
</p>
<pre><code class="language-php">include 'filename';
require 'filename';</code></pre>
<p>Przykładowym zastosowaniem może być utworzenie stopki strony i załączanie jej na podstronach.</p>
<pre><code class="language-php">&lt;?php
echo "&lt;p>Copyright &amp;copy; 2025-" . date("Y") . " estremo.pl&lt;/p>";
?></code></pre>
<pre><code class="language-html">&lt;!DOCTYPE html>
&lt;html lang="en">
&lt;head>
    &lt;meta charset="UTF-8">
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0">
    &lt;title>Document&lt;/title>
&lt;/head>
&lt;body>
    &lt;h2>Lorem Ipsum&lt;/h2>
    &lt;p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus iure in quam perferendis veritatis modi ipsam voluptatem aperiam omnis incidunt similique minima, ad adipisci porro magni doloribus nostrum iusto laborum.&lt;/p>
    &lt;p>Quia maxime laborum ratione, neque quos aperiam, doloribus perferendis voluptas, facere porro reprehenderit numquam commodi dignissimos animi quod minus incidunt ab soluta modi quidem voluptatum illo? Dolorum autem recusandae sequi.&lt;/p>
    &lt;?php include 'footer.php';?>
&lt;/body>
&lt;/html></code></pre>
<p>Rezultat:</p>
<pre><code><h2>Lorem Ipsum</h2>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus iure in quam perferendis veritatis modi ipsam voluptatem aperiam omnis incidunt similique minima, ad adipisci porro magni doloribus nostrum iusto laborum.&lt;/p>
    <p>Quia maxime laborum ratione, neque quos aperiam, doloribus perferendis voluptas, facere porro reprehenderit numquam commodi dignissimos animi quod minus incidunt ab soluta modi quidem voluptatum illo? Dolorum autem recusandae sequi.&lt;/p>
    <?php echo "<p>Copyright &copy; 2025-" . date("Y") . " estremo.pl</p>";?></code></pre>
<p>Zadanie: Innym zastosowaniem include może być pasek nawigacyjny. Podłącz plik "navbox.php" i zobacz co się stanie.</p>