<p>
    <link rel="stylesheet" href="./style.css">

    <br>
    <p>Posiadasz już konto? <a class="button" href="../login">Zaloguj się</a></p>
    <br>
    <form action="./" method="post">
        Nazwa użytkownika:<br><input type="text" name="username"><br>
        Hasło:<br><input type="password" name="pass"><br>
        <input type="submit" value="Zarejestruj się">
    </form>

    <?php
        function main() {
            $conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');

            @$username = trim($_POST['username']);
            @$pass = trim($_POST['pass']);
    
            if(strlen($username) == 0 || strlen($pass) == 0){
                return;
            }
            if(strlen($username) < 8 || strlen($username) > 32) {
                echo("<p class='red'>Nazwa użytkownika musi mieć znajdować się w zakresie od 8 do 32 znaków.</p>");
                return;
            }
            if(strlen($pass) < 8 || strlen($pass) > 32) {
                echo("<p class='red'>Hasło musi mieć znajdować się w zakresie od 8 do 32 znaków.</p>");
                return;
            }
    
            $sql = "select * from susers where username='$username'";
            $result = $conn->query($sql);
    
            if($result->num_rows > 0) {
                echo("Taki użytkownik już istnieje");
                return;
            }
    
            $sql = "select * from susers where token='$token'";
            do{
                $token = random_int(10000, 9999999);
                $result = $conn->query($sql);
            }while($result->num_rows > 0);
    
            $sql = "insert into susers(username, pass, token) values ('$username', '$pass', '$token')";
            $conn->query($sql);
    
            header('Location: ../login');
    
            $conn->close();
        }
        main();
    ?>
</p>