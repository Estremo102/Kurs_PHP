<h3>Różne sposoby tworzenia tablic</h3>
<p>W PHP istnieje kilka sposobów tworzenia tablic. Pierwszym z nich jest użycie funkcji array()</p>
<pre><code class="language-php">$cars = array("Volvo", "BMW", "Toyota");</code></pre>
<p>Można także użyć kwadratowych nawiasów</p>
<pre><code class="language-php">$cars = ["Volvo", "BMW", "Toyota"];</code></pre>
<p>Jeśli jest taka potrzeba, dla czytelności można rozbić to na kilka linijek</p>
<pre><code class="language-php">$cars = array("Volvo", "BMW", "Toyota");</code></pre>
<pre><code class="language-php">$cars = [
    "Volvo",
    "BMW",
    "Toyota"
];</code></pre>
<p>Przecinek po ostatnim elemencie nie jest potrzebny, ale można go dodać.</p>
<p>Tablice asocjacyjne również można rozdzielić na osobne linijki</p>
<pre><code class="language-php">$myCar = [
  "brand" => "Ford",
  "model" => "Mustang",
  "year" => 1964
];</code></pre>
<p>Tworzenie pustej tablicy możemy wykorzystać by najpierw stworzyć tablice, a dopiero później dodać do niej elementy</p>
<pre><code class="language-php">$myCar = [];
$myCar["brand"] = "Ford";
$myCar["model"] = "Mustang";
$myCar["year"] = 1964;</code></pre>
<p>Można tworzyć tablice mieszane, częściowo asocjacyjne, częściowo indeksowane</p>
<p>Zadanie: Utwórz tablicę a następnie:
  <ul>
    <li>dodaj dwa elementy o indeksach 0 i 1</li>
    <li>dodaj element na podstawie klucza</li>
    <li>dodaj elementy o indeksach 2 i 4</li>
    <li>dodaj element za pomocą pustych kwadratowych nawiasów i zobacz jaki indeks otrzyma nowy element</li>
    <li>dodaj element na podstawie klucza</li>
    <li>dodaj element za pomocą kwadratowych nawiasów i zobacz jaki indeks otrzyma nowy element</li>
  </ul>
</p>