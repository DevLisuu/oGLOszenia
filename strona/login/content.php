<p>
    <br>
    <p>Nie posiadasz konta? <a class="button" href="../register">Zarejestruj się</a></p>
    <br>
    <form action="./" method="post">
        Nazwa użytkownika:<br><input type="text" name="username"><br>
        Hasło:<br><input type="password" name="pass"><br>
        <input type="submit" value="Zaloguj się">
    </form>

    <?php
        $conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');

        if($conn->connect_error) {
            exit("Connection failed: " . $conn->connect_error);
        }

        @$username = trim($_POST['username']);
        @$pass = trim($_POST['pass']);

        if(strlen($username) == 0 || strlen($pass) == 0){
            exit;
        }

        $sql = "select * from susers where username='$username' and pass='$pass'";
        $result = $conn->query($sql);

        if($result->num_rows <= 0) {
            echo("<p class='red'>Niepoprawne hasło lub nazwa użytkownika.</p>");
            exit;
        }

        while($row = $result->fetch_assoc()) {
            if($row['username'] == $username && $row['pass'] == $pass) {
                session_start();
                $_SESSION['username'] = $row['username'];
                $_SESSION['token'] = $row['token'];
                
                header('Location: ../home');
                exit;
            }
        }

        $conn->close();
    ?>
</p>