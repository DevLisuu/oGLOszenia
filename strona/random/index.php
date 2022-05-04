<p>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');

    $sql = "select * from ogloszenia order by RAND()";
    $result = $conn->query($sql);
    $firstResult = $result->fetch_assoc();
    
    header('Location: ../ogloszenie?id='.$firstResult['id']);
    ?>
</p>