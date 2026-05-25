<h3>Składnia</h3>
<h4>Czym jest RegEx?</h4>
<p>RegEx (Regular Expressions) czyli Wyrażenia regularne, pozwala ono na tworzenie wzorców, na podstawie których można wyszukiwać w tekście konkretnych schematów. Przykładowo można wyszukać lub zasąpić tekst.</p>
<h4>Składnia</h4>
<p>w PHP RegEx to ciągi złożone z ograniczników, wzór i opcjonalne modyfikatory.</p>
<pre><code class="language-php">"/wzor/modyfikatory"</code></pre>
<p>
    <ul>
        <li>ograniczniki - znaki które zamyjaką wzór (np. <code>/</code>)</li>
        <li>wzór - sekwencja znaków do wyszukania</li>
        <li>modyfikatory - sposób wykonania wyszukiwania</li>
    </ul>
    Przykład:
    <pre><code class="language-php">$wyr = "/zsht/i";</code></pre>
    Tutaj <code>/</code> jest ogranicznikiem, <code>zsht</code> jest wzorem, a <code>i</code> modyfikatorem. <br>
    ogranicznik może byćdowolnym znakiem który nie jest liczbą, literą backslashashem lub spacją. Najczęstrzym ograncznikiem jest slash, ale gdy potrzeba go użyć we wzorze, wtedy można użyć innych znaków takich jak # lub ~.
</p>
<p>Zadanie: todo zamiana / na ~ lub # w gotowym wyrażeniu regularnym zawierającym slash</p>