<h3>Składnia</h3>
<h4>Czym jest RegEx?</h4>
<p>RegEx (Regular Expressions) czyli Wyrażenia regularne, pozwala ono na tworzenie wzorców, na podstawie których można wyszukiwać w tekście konkretnych schematów. Przykładowo można wyszukać lub zasąpić tekst.</p>
<h4>Składnia</h4>
<p>w PHP RegEx to ciągi złożone z ograniczników, wzorzec i opcjonalne modyfikatory.</p>
<pre><code class="language-php">"/wzorzec/modyfikatory"</code></pre>
<p>
    <ul>
        <li>ograniczniki - znaki które zamyjaką wzór (np. <code>/</code>)</li>
        <li>wzorzec - sekwencja znaków do wyszukania</li>
        <li>modyfikatory - sposób wykonania wyszukiwania</li>
    </ul>
    Przykład:
    <pre><code class="language-php">$wyr = "/zsht/i";</code></pre>
    Tutaj <code>/</code> jest ogranicznikiem, <code>zsht</code> jest wzorcem, a <code>i</code> modyfikatorem. <br>
    ogranicznik może byćdowolnym znakiem który nie jest liczbą, literą backslashashem lub spacją. Najczęstrzym ograncznikiem jest slash, ale gdy potrzeba go użyć we wzorcu, wtedy można użyć innych znaków takich jak # lub ~.
</p>
<p>Zadanie: W kodzie masz dostęp do zmiennej $stary z wyrażeniem regularnym, które sprawdza, czy ścieżka do pliku zaczyna się od tematy/RegEx/rozwiazania/:</p>
<pre><code class="language-php">$stary = "/^tematy\/RegEx\/rozwiazania\//";</code></pre>
<p>Ponieważ ogranicznikiem jest slash, każdy slash we wzorcu trzeba poprzedzić backslashem. Utwórz zmienną $nowy z tym samym wzorcem, ale użyj ogranicznika # lub ~, dzięki czemu slashe we wzorcu nie będą wymagały backslasha.</p>