<link rel="stylesheet" href="./style.css">

<article class="children-centered text-centered">
<p>Posiadasz już konto?</p>
<a class="button" href="../login">Zaloguj się</a>
<br><br>
<form action="./" method="post">
    <label>Nazwa użytkownika:</label><br><input type="text" maxlength="16" minlength="8" pattern="[a-zA-Z0-9]+" name="username"><br>
    <label>Hasło:</label><br><input type="password" maxlength="32" minlength="8" pattern="[a-zA-Z0-9]+" name="pass"><br>
    <input type="submit" value="Zarejestruj się">
</form>
<br>

<?php
    function registerUser() {
        /**
         * Funkcja rejestrująca użytkownika jeśli warunki są spełnione
         * @author Dominik Marszał
         */
        @$conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');
        
        if($conn->connect_error) return;

        @$username = trim($_POST['username']);
        @$pass = trim($_POST['pass']);

        if(strlen($username) == 0 || strlen($pass) == 0){
            return;
        }

        $sql = "select * from susers where username='$username'";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            echo("<p class='red'>Taki użytkownik już istnieje</p>");
            return;
        }

        $sql = "select * from susers where token='$token'";
        do {
            $token = random_int(10000, 9999999);
            $result = $conn->query($sql);
        } while($result->num_rows > 0);

        $sql = "insert into susers(username, pass, token) values ('$username', '$pass', '$token')";
        $conn->query($sql);

        header('Location: ../login');

        $conn->close();
    }
    registerUser();
?>
</article>