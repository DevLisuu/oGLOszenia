<link rel="stylesheet" href="./style.css">

<article class="children-centered text-centered">
    <p>Nie posiadasz konta?</p>
    <a class="button" href="../register">Zarejestruj się</a>
    <br><br>
    <form action="./" method="post">
        Nazwa użytkownika:<br><input type="text" name="username"><br>
        Hasło:<br><input type="password" name="pass"><br>
        <input type="submit" value="Zaloguj się">
    </form>

    <?php
    function main() {
        @$username = trim($_POST['username']);
        @$pass = trim($_POST['pass']);
        
        if(strlen($username) == 0 || strlen($pass) == 0){
            return;
        }

        $conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');

        $sql = "select * from susers where username='$username' and pass='$pass'";
        $result = $conn->query($sql);

        if($result->num_rows <= 0) {
            echo("<p class='red'>Niepoprawne hasło lub nazwa użytkownika.</p>");
            return;
        }

        $firstResult = $result->fetch_assoc();
        
        session_start();
        $_SESSION['username'] = $firstResult['username'];
        $_SESSION['token'] = $firstResult['token'];
        
        header('Location: ../home');

        $conn->close();
    }
    main();
?>
</article>