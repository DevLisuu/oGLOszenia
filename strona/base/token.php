<?php
    session_start();

    $conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');

    if($conn->connect_error) {
        exit("Connection failed: " . $conn->connect_error);
    }
    
    @$username = $_SESSION['username'];
    @$token = $_SESSION['token'];

    $sql = "select * from susers where username='$username' and token='$token'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        echo('<a class="login" href="../logout">Wyloguj się</a>');
    }else{
        echo('<a class="login" href="../login">Zaloguj się</a>');
    }
?>