<h3>Stałe tablicowe</h3>
<p>Możesz również tworzyć stałe tablicowe za pomocą define() lub const.</p>
<p>Przykład użycia: <pre><code class="language-php">// Using define()
define("CARS", array("Volvo", "BMW", "Toyota"));
echo CARS[0];

// Using const
const ANIMALS = array("Cat", "Dog", "Horse");
echo ANIMALS[1];</code></pre></p>
<p>Twoim zadaniem jest utworzenie stałej tablicowej, a następnie próba modyfikacji jednej z jej komórek i jej wyświetlenie. Jeśli to nie możliwe, zakomentuj linijkę która powoduje błąd. Zwróć uwagę czy to jest możliwe oraz porównaj zachowanie ze stałymi tablicami w JS.</p>