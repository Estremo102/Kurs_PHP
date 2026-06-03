<h3>Utworzenie pliku</h3>
<p>Funkcja fopen() służy także do tworzenia plików. Jeśli w trybie <code>w</code> lub <code>a</code> spróbujemy otworzyć plik, który nie istnieje, zostanie on utworzony.</p>
<pre><code class="language-php">$myfile = fopen('tematy\Obsluga_plikow\\'. date("Y.m.d_His").".txt", "w");</code></pre>
<?php $myfile = fopen('tematy\Obsluga_plikow\\'. date("Y.m.d_His").".txt", "w"); ?>
<p>Powyższy kod tworzy podczas otwarcia strony plik z nazwą wskazującą datę i godzinę jej otwarcia.</p>
<p>Zadanie: Napisz kod, który w folderze rozwiazania utworzy plik txt z nazwą zwróconą przez funkcję <code>get_current_user();</code>.</p>