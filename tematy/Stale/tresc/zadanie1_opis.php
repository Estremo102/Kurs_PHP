<h3>Funkcja define()</h3>
<p>Stałe są podobne do zmiennych, z tą różnicą, że po zdefiniowaniu nie można ich zmienić ani usunąć. Stałe PHP można zdefiniować za pomocą funkcji define() lub słowa kluczowego const. Prawidłowa nazwa stałej zaczyna się od litery lub znaku podkreślenia (bez znaku $ przed nazwą stałej).</p>
<p>Funkcja define() definiuje stałą w czasie wykonywania. Funkcja define() zawsze definiuje stałe w zakresie globalnym i może być deklarowana w blokach warunkowych (if/else, pętle, funkcje), ale nie może być używana do definiowania stałych w klasach.</p>
<p>Składnia: <pre><code class="language-php">define("NAZWA_STALEJ", "wartość");</code></pre></p>
<p>Utwórz zmienną i przypisz jej wartość, a następnie wyświetl jej zawartość.</p>