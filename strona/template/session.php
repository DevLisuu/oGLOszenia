<?php
    function main() {
        /**
         * Zamienia przycisk "Zaloguj się" na "Konto" jeżeli użytkownik jest zalogowany
         */
        session_start();

        @$conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');
        
        if($conn->connect_error) {
            echo("<a class='header-button' href='../login'>Zaloguj się</a>");
            return;
        }

        @$username = $_SESSION['username'];
        @$token = $_SESSION['token'];

        $sql = "select * from susers where username='$username' and token='$token'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();

        if($result->num_rows > 0) {
            echo("<a class='header-button' href='../konto?id=".$data['id']."'>Konto</a>");
        }else {
            session_destroy();
            echo("<a class='header-button' href='../login'>Zaloguj się</a>");
        }
    }
    main();
?>