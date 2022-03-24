<?php
    @$login = $_POST['login'];
    @$password = $_POST['password'];

    $database = new mysqli("localhost", "root", "", "ogloszenia");
    if(!$database) {
        echo("Błąd połączenia z bazą danych: " . mysqli_connect_error());
        return;
    }

    $sql = "select login, password from users where login = '$login' and password = '$password'";
    $query = mysqli_query($database, $sql);
    $data = mysqli_fetch_assoc($query);
    
    if(!isset($data['login']) && !isset($data['password'])) {
        echo("Forgor password");
    }elseif($data['login'] == $login && $data['password'] == $password) {
        echo("Logged in as '$login'");
    }else{
        echo("ERROR CODE: ARAB");
    }

    mysqli_close($database);
?>