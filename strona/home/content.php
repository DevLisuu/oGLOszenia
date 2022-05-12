<article class="children-centered children-text-centered">
<p class="text-centered">
    LoudAds to darmowe ogłoszenia lokalne w kategoriach:<br> Moda, Zwierzęta, Dla Dzieci, Sport i Hobby, Muzyka i Edukacja.<br> Szybko znajdziesz tu ciekawe ogłoszenia i łatwo skontaktujesz się z ogłoszeniodawcą.<br> Na LoudAds czeka na Ciebie praca biurowa, mieszkania, pokoje, samochody.<br> Jeśli chcesz coś sprzedać - w prosty sposób dodasz bezpłatne ogłoszenia.<br> Chcesz coś kupić - tutaj znajdziesz ciekawe okazje, taniej niż w sklepie.<br> Sprzedawaj po sąsiedzku na LoudAds
</p>

<br><br>

<h2>Najnowsze 5 ogłoszeń</h2>

<?php
    function displayAnnouncements() {
        /**
         * Wyświetla najnowsze ogłoszenia na stronie
         * @author Dominik Marszał
         */
        @$conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');
        
        if($conn->connect_error) return;

        $sql = "select ogloszenia.id, ogloszenia.tytul, susers.username from ogloszenia join susers on ogloszenia.id_autora = susers.id order by ogloszenia.data_dodania desc limit 5;";
        $result = $conn->query($sql);
        
        while($ogloszenie = $result->fetch_array(MYSQLI_ASSOC)) {
            echo("<a class='button' href='../ogloszenie?id=".$ogloszenie['id']."'>".$ogloszenie['tytul']." by ".$ogloszenie['username']."<br></a>");
        }
        
        $conn->close();
    }
    displayAnnouncements();
?>
</article>