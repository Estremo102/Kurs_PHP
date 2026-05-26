<?php require_once 'randomByUsername.php'?>
<h3>date()</h3>
<h4>Funkcje czasu</h4>
<p>
    PHP ma wbudowane funkcje daty i godziny. W tym temacie omówimy sobie podstawowe funckcje do pracy z czasem: <br>
    <ul>
        <li>date() - formatuje datę</li>
        <li>mktime()</li>
        <li>strtotime()</li>
        <li>time()</li>
        <li>date_default_timezone_set()</li>
        <li>date_default_timezone_get()</li>
    </ul>
</p>
<h4>date()</h4>
<pre><code class="language-php">date(format, znacznikCzasu)</code></pre>
<table>
    <tr>
        <th>parametr</th>
        <th>opis</th>
    </tr>
    <tr>
        <td>format</td>
        <td>Wymagany. Określa format daty.</td>
    </tr>
    <tr>
        <td>znacznikCzasu</td>
        <td>Opcjonalny, domyślnie teraz.</td>
    </tr>
</table>
<p>
    Przykładowo chcąc wyświetlić dzisiejszą datę w formacie rok.miesiąc.dzień można posłużyć poniższym kodem:
    <pre><code class="language-php">echo date("Y.m.d")</code></pre>
    <pre><code><?php 
echo date("Y.m.d");
?></code></pre>
</p>
<p>
    Najczęściej używane znaki do formatowania daty to: 
    <ul>
        <li>d - dzień miesiąca (01-31)</li>
        <li>j - dzień miesiąca (1-31)</li>
        <li>m - miesiąc (01-12)</li>
        <li>F - miesiąc (słownie)</li>
        <li>Y - rok</li>
        <li>l - dzień tygodnia</li>
    </ul>
    Znaki takie jak <code>/,.-</code> służą jako separatory w formatowaniu. 
</p>
<p>Zadanie: Wyświetl dzisiejszą datę w formacie <?php randomByUsername([
"*MDY (miesiąc, dzień, rok)",
"*DMY (dzień, miesiąc, rok)",
"*RMD (rok, miesiąc, dzień)",
"*ISO (RRRR-MM-DD)",
"*USA (MM/DD/RRRR)",
"*EUR (DD.MM.YYYY)",
"*JIS (RRRR-MM-DD)"
]); ?></p>