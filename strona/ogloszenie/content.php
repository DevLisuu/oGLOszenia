<article>
<?php
    /**
     * Wyświetla ogłoszenie z bazy danych
     * @author Dominik Marszał
     */
    @$id = $_GET['id'];

    if(!isset($id)) {
        header('Location: ../home');
    }

    @$conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');

    if($conn->connect_error) header('Location: ../home');
    
    $sql = "select * from ogloszenia join susers on ogloszenia.id_autora = susers.id where ogloszenia.id='$id';";
    $result = $conn->query($sql);

    if($result->num_rows < 1) {
        header('Location: ../home');
    }

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
    
    $conn->close();
?>
</article>