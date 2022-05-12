<link rel="stylesheet" href="style.css">

<article>
<form action="./" method="get">
    <h2><input type="text" maxlength="50" name="tytul"></h2>

    <br>

    <p>Autor: Ty</p>
    <p id="data">Data utworzenia: Dziś</p>

    <br>
    <hr>
    <br>

    <p><textarea maxlength="1024" rows="10" name="tresc"></textarea><p>

    <input type="submit" value="Dodaj ogłoszenie!">
</form>


<script>
    function addDate() {
        /**
         * Uzupełnia date w elemencie #datta na dzisiejszą date
         * @author Dominik Marszał
         */
        const element = document.querySelector('#data');
        const today = new Date();
        const data = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        element.innerText = `Data utworzenia: ${data}`;
    }
    addDate();    
</script>


<?php
    function addAnnouncement() {
        /**
         * Dodaje ogłoszenie do bazy danych jeśli warunki są spełnione
         * @author Dominik Marszał
         */
        @$conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');

        if($conn->connect_error) {
            header('Location: ../home');
        }

        @$username = $_SESSION['username'];
        @$token = $_SESSION['token'];

        $sql = "select * from susers where username='$username' and token='$token'";
        $result = $conn->query($sql);

        if($result->num_rows < 1) {
            header('Location: ../home');
        }

        $data = $result->fetch_assoc();
        @$tytul = $_GET['tytul'];
        @$tresc = $_GET['tresc'];

        if(strlen($tytul) == 0 || strlen($tresc) == 0){
            return;
        }

        $sql = "insert into ogloszenia(tytul, tresc, id_autora) values ('".$tytul."', '".$tresc."', ".$data['id'].")";
        $conn->query($sql);

        header('Location: ../home');

        $conn->close();
    }
    addAnnouncement();
?>
</article>