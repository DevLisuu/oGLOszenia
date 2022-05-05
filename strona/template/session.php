<?php
    session_start();

    $conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');
    
    @$username = $_SESSION['username'];
    @$token = $_SESSION['token'];

    $sql = "select * from susers where username='$username' and token='$token'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        echo('<a class="header-button" href="../logout">Konto</a>');
    }else{
        echo('<a class="header-button" href="../login">Zaloguj się</a>');
    }
?>