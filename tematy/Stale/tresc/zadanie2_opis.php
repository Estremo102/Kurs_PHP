<h3>Słowo kluczowe const w PHP</h3>
<p>Słowo kluczowe const definiuje stałą w czasie kompilacji.</p>
<p>Stałe zdefiniowane za pomocą słowa kluczowego const muszą być deklarowane w zakresie najwyższego poziomu, ponieważ są definiowane w czasie kompilacji. Oznacza to, że nie można ich deklarować wewnątrz funkcji, pętli, instrukcji if/else ani bloków try/catch. Stałe zdefiniowane za pomocą słowa kluczowego const mogą być używane do definiowania stałych w klasach. Stałe zdefiniowane za pomocą słowa kluczowego const rozróżniają wielkość liter.</p>
<p>Składnia const <pre><code class="language-php">const CONSTANT_NAME = value;</code></pre></p>
<p>W poniższym kodzie utwórz stałe na oba poznane sposoby w wyznaczonych miejscach
<pre><code class="language-php"> // Utwórz tutaj stałą NAME i przypisz jej swoje imię.
    
function myTest() {
  // Utwórz tutaj stałą GREETING i przypisz jej wartość
}

myTest();

echo GREETING . NAME;</code></pre>
</p>