<article>


<?php
    /**
     * Wyświetla dane i ogłoszenia danego użytkownika
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
    "</p><hr><p>Ogłoszenia użytkownika ".$data['username'].":<br></p>"
    );
?>
</article>