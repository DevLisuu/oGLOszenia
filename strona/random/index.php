<p>
    <?php
    @$conn = new mysqli('localhost', 'root', '', 'ogloszeniowy');

    if($conn->connect_error) header('Location: ../home');

    $sql = "select * from ogloszenia order by RAND()";
    $result = $conn->query($sql);
    $firstResult = $result->fetch_assoc();

    if($firstResult->num_rows < 1) header('Location: ../home');
    
    header('Location: ../ogloszenie?id='.$firstResult['id']);
    ?>
</p>