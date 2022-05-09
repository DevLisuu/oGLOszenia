<article>
<p>
    <b>Serwis ogłoszeniowy</b> - typ serwisu internetowego, pozwalający na zamieszczanie ogłoszeń i ich przeglądanie, a przez to kojarzenie stron transakcji (kupującego ze sprzedającym). Ogłoszeniodawcy zwykle zamieszczają przedmioty w odpowiednich kategoriach, co ułatwia kupującym znalezienie danego przedmiotu. Szczególnym rodzajem serwisów ogłoszeniowych są serwisy aukcyjne.
    <br><br><br>
</p>


<?php
    /**
     * Wyświetla najnowsze ogłoszenia na stronie
     */
    $conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');

    $sql = "select * from ogloszenia join susers on ogloszenia.id_autora = susers.id order by data_dodania limit 10;";
    $result = $conn->query($sql);
    while($ogloszenie = $result->fetch_assoc()) {
        echo("<p><b>".$ogloszenie['tytul']."</b><br>".$ogloszenie['username']."<br></p>");
    }
?>
</article>