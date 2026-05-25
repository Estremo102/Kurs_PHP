<h3>Jaskinia platońska</h3>
<p>Choć na pierwszy rzut oka starożytna filozofia grecka i programowanie obiektowe wydają się czymś zupełnie innym, to jednak zrozumienie jednej rzeczy może pomóc pojąć drugą. Platon w Politea (VII, 514 i n.) przedstawił światu metaforę jaskini.</p>
<img src="images/jaskinia_platona.jpg" alt="Jaskinia Platona">
<a href="https://pl.wikipedia.org/wiki/Jaskinia_plato%C5%84ska#/media/Plik:An_Illustration_of_The_Allegory_of_the_Cave,_from_Plato%E2%80%99s_Republic.jpg">autor: 4edges, Praca własna, licencja CC BY 4.0</a>
<p>Programowanie obiektowe bardzo przypomina w swoich założeniach spojrzenie na świat przedstawione przez platona. Ludzie obserwują grę cieni na ścianie jaskini. Znając tylko taki świat biorą go za rzeczywisty, jednak gdyby komuś udało się obrócić i spojrzeć w tył co ten cień rzuca, zobaczyłby, że jest to coś jeszcze bardziej rzeczywiste. Gdyby zaczął próbować wyjść z jaskini dopiero wtedy zobaczyłby świat jakim jest. Jednak przyzwyczajenie oczu do ostrego światła słońca wymaga czasu, dlatego zacznijmy po kolei. Dziś przyjżyjmy się cieniom.</p>
<p>Obiekty w JS możemy potraktować jak takie cienie, mogą one przybierać różne kształty, a także się poruszać. Obiekty przechowują w sobie właściwości czyli zmienne, które je opisują, a także metody - specjalne funkcje które możemy wywoływać, by wykonać określone akcje.</p>
<p>Na ilustracji powyżej widzimy cienie konia i psa, przyjżyjmy się więc psu. Pies ma ogon, łapy, może szczekać, waży określoną ilość kg i urodził się w konkretnym czasie. Często ma jakieś imie. Może szczekać, biegać czy mieć urodziny. Napiszmy więc obiekt który będzie przechowywał informacje o:</p>
<ol>
    <li>Imię</li>
    <li>Waga</li>
    <li>Szybkość</li>
</ol>
a także potrafi: 
<ul>
    <li>dać łapę</li>
    <li>szczeknąć</li>
</ul>
<pre><code class="language-php">class Pies {
    // Właściwości
    public $imie;
    public $waga;
    public $szybkosc;
    // Metody
    function dajLape() {
        echo "Daje Łapę";
    },
    dajGlos() {
        echo "Hau! Jestem " . $this->imie;
    }
}</code></pre>
<p>Powyższy kod to klasa Pies. Jest ona ideą psa, na podstawie której można tworzyć obiekty będące konkretnymi psami, o określonym imieniu, wadze i szybkości, mogące podawać łapę i dawać głos.</p>
<p>Zadanie: utwórz klasę [wylosowana rzecz] w której utworzysz 4 właściwości i 2 metody.</p>