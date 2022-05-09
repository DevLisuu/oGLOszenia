<article>
<?php
    /**
     * Wyświetla ogłoszenie z bazy danych
     */
    @$id = $_GET['id'];

    if(!isset($id)) {
        header('Location: ../home');
    }

    $conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');

    $sql = "select * from ogloszenia join susers on ogloszenia.id_autora = susers.id where ogloszenia.id='$id';";
    $result = $conn->query($sql);
    $card = $result->fetch_assoc();

    echo(
    '<h2>'.$card['tytul'].'</h2>
    <p>Autor: '.$card['username'].'<br>Data utworzenia: '.$card['data_dodania']
    .
    "</p><hr><p>"
    .
    $card['tresc']
    .
    "</p>"
    );
?>
</article>