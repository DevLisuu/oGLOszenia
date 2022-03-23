<?php
    @$login = $_POST['login'];
    @$password = $_POST['password'];

    $database = new mysqli("localhost", "root", "");
    if(!$database) {
        echo("Błąd połączenia z bazą danych: " . mysqli_connect_error());
        return;
    }
    
    echo $login;
    echo $password;

    $sql = "use ogloszenia";
    mysqli_query($database, $sql);

    $sql = "select login, password from users where login = '$login' and password = '$password'";
    $query = mysqli_query($database, $sql);

    $data = mysqli_fetch_assoc($query);
    
    echo "<br>";
    echo $data['login'];
    echo $data['password'];

    if($data['login'] === $login && $data['password'] === $password) {
        echo(`Zalogowano jako $login : $password`);
    }else{
        echo("op co zapomniał hasła");
    }

    mysqli_close($database);
?>