<h3>Odczyt pliku</h3>
<p>Jak można było zaobserwować, w poprzednim zadaniu fopen(). W przeciwieństwie do readfile(), sam z siebie nie wyświetla zawartości pliku. Do tego przydadzą się funkcje odczytu. Na przykład fread(). Przyjmuje on 2 argumenty. Pierwszy z nich przyjmuje nazwę pliku, wraz ze ścieżką jeśli to konieczne, a drgi określa maksymalną liczbę bajtów do odczytu. Chcąc odczytać cały plik, możemy jako drugi argument podać wynik funkcji filesize("NazwaPl.iku"), lub możemy określić ile bajtów chcemy odczytać.</p>
<p>Poza fread() odczytującym cały plik, możemy też odczytywać pojedyncze linie za pomocą fgets() lub za pomocą fgetc() pojedyncze znaki. Obie funkcje przesuwają znacznik pliku o tyle ile danych odczytały.</p>
<p>Funkcja feof() sprawdza czy znacznik dotarł już do końca pliku, dzięki czemu w połączeniu z fgets() i fgetc() można wyświetlać kod linijka po linijce lub znak po znaku, przerywając pętle po dotarciu do końca pliku.</p>
<pre><code class="language-php">$myfile = fopen("plik.txt", "r") or die("Unable to open file!");
while(!feof($myfile)) {
  echo fgets($myfile) . "&lt;br>";
}
fclose($myfile);</code></pre>
<h4>Zamykanie pliku</h4>
<p>Warto pamiętać by zamykać otwarte pliki, po zakończeniu pracy z nimi. Do tego celu służy funkcja fclose(). Przyjmuje ona nazwę pliku, lub jak w poniższym przykładzie zmienną przechowującą wynik funkcji fopen().</p>
<pre><code class="language-php">$myfile = fopen("plik.txt", "r");
// kod pracujący z plikiem ....
fclose($myfile);</code></pre>
<p>Zadanie: Otwórz plik <?php randomByUsername([
'style.css w trybie r',
'style.css w trybie r+'
// można w przyszłości więcej plików do losowania dodać
]);?>, następnie <?php randomByUsername([
'Odczytaj i wyświetl co drugą linijkę z pliku.',
'Odczytaj i wyświetl co trzecia linijkę z pliku.',
'Odczytaj i wyświetl co czwartą linijkę z pliku.',
'Odczytaj i wyświetl pierwsze 21 bajtów pliku.',
'Odczytaj i wyświetl pierwsze 37 bajtów pliku.',
'Odczytaj i wyświetl pierwsze 50 bajtów pliku.',
'Odczytaj i wyświetl pierwsze 60 bajtów pliku.',
'Odczytaj i wyświetl pierwsze 67 bajtów pliku.',
'Odczytaj i wyświetl co drugi znak w pliku.',
'Odczytaj i wyświetl wszystkie znaki z pliku które są samogłoskami.'
]);?> Pamiętaj o zamknięciu połączenia.</p>