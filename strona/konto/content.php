<article>
<a class="button" href="../logout">Wyloguj się</a>
<br><br>

<?php
    /**
     * Wyświetla dane i ogłoszenia danego użytkownika
     * @author Dominik Marszał
     */
    @$id = $_GET['id'];

    if(!isset($id)) {
        header('Location: ../home');
    }

    @$conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');
    
    if($conn->connect_error) header('Location: ../home');

    $sql = "select * from susers where id='$id';";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    if($result->num_rows < 1) {
        header('Location: ../home');
    }

    echo(
    "<h2>".$data['username']."</h2>
    <p>Data utworzenia konta: ".$data['data_utworzenia']
    .
    "</p><hr><br><h4>Ogłoszenia użytkownika ".$data['username'].":<br></h4>"
    );

    $sql = "select ogloszenia.id, ogloszenia.tytul, susers.username from ogloszenia join susers on ogloszenia.id_autora = susers.id where susers.id='$id' order by ogloszenia.data_dodania desc limit 5;";
    $result = $conn->query($sql);
    
    while($ogloszenie = $result->fetch_array(MYSQLI_ASSOC)) {
        echo("<a class='button' href='../ogloszenie?id=".$ogloszenie['id']."'>".$ogloszenie['tytul']." by ".$ogloszenie['username']."<br></a>");
    }
    
    $conn->close();
?>
</article>