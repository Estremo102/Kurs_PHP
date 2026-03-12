<h3>instrukcja if</h3>
<p>
    <h4>Instrukcje warunkowe</h4>
    Instrukcje warunkowe służą do wykonywania różnych akcji w oparciu o różne warunki. W PHP mamy następujące instrukcje warunkowe:
    <ul>
        <li>Instrukcja if – wykonuje pewien kod, jeśli jeden z warunków jest spełniony</li>
        <li>Instrukcja if...else – wykonuje pewien kod, jeśli warunek jest spełniony, a inny kod, jeśli ten warunek jest fałszywy</li>
        <li>Instrukcja if...elseif...else – wykonuje różne kody dla więcej niż dwóch warunków</li>
        <li>Instrukcja switch – wybiera jeden z wielu bloków kodu do wykonania</li>
    </ul>
</p>
<p>
    <h4>Instrukcja if</h4>
    if wykonuje kod tylko jeśli warunek logiczny jest prawdziwy
    <pre><code class="language-php">if (warunek_logiczny) {
    // kod który wykona się jeśli warunek logiczny jest prawdziwy
}</code></pre>
    przykład:
    <pre><code class="language-php">$zmienna = true;
        
if ($zmienna) {
    echo "Miłego dnia!";
}</code></pre>
</p>
<p>Zadanie: W kodzie masz dostęp do zmiennej $warunek_logiczny. Jest to zmienna typu boolean. Jeśli jest prawdą wyświetl napis "Warunek logiczny jest prawdziwy".</p>