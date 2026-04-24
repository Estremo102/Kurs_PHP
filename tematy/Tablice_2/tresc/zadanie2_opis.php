<h3>Algorytmy sortujące</h3>
<p>Istnieją różne algorytmy sortujące. Można je podzielić ze względu na stabilność, złożoność obliczeniową, złożoność pamięciową, sposób przechowywania danych oraz sposób podejścia.</p>
<h4>stabilność</h4>
<p>
    Stablne algorytmy zachowują kolejność równych sobie elementów (np Merge Sort, Insertion Sort). <br>
    Niestabilne mogą tą kolejność zmieniać (np Quick Sort, Heap Sort).
</p>
<h4>złożoność obliczeniowa</h4>
<p>
    Efektywne algorymy to algorytmy o złożoności obliczeniowej O(n log n) (Quick Sort, Merge Sort, Heap Sort). <br> 
    Proste O(n<sup>2</sup>) (Bubble Sort, Selection Sort)
</p>
<h4>Złożoność pamięciowa</h4>
<p>
    W miejscu nie wymagają dodatkowej pamięci proporcjonalnej do liczby elementów (Quick Sort, Bubble Sort)<br>
    Potrzebujące dodatkowej pamięci (Merge Sort)
</p>
<h4>Sposób działania</h4>
<p>
    Przez porównywanie są oparte na porównywanu elementów (większość algorytmów)<br>
    Niestandardowe (bucket sort)
</p>
<h4>Miejsce przechowywania danych</h4>
<p>
    Wewnętrzne sortują w pamięci RAM<br>
    Zewnętrzne sortują duże zbiory danych na dysku gdu nie mieszczą się one w pamięci RAM
</p>
<h4>Sposób podejścia</h4>
<p>
    Rekurencyjne dzielą zbiór na mniejsze (Quick Sort, Merge Sort)<br>
    Iteracyjne wykorzystują pętle
</p>
<p>Zadanie: Wybierz jeden z algorytmów sortujących i zapoznaj się z jego sposobem działania, a następnie spróbuj go zaimplementować.</p>