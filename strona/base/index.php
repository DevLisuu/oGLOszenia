<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Louda Ogłoszenia</title>
    <link rel="stylesheet" href="../base/style.css">
</head>
<body>
    <header>
        <div id="lougo">
            <a class="header-element" href="../home">Louda</a>
        </div>
        <nav>
            <a class="header-element tecza" href="../random">Losowe ogłoszenie</a>
            <a class="header-element" href="../ogloszenie?id=1">Wyszukiwanie</a>
            <a class="header-element" href="https://youtu.be/6EjK9-WPFXo">O Stronie</a>
            <div class="header-button">
                <?php
                    include('../base/token.php')
                ?>
            </div>
        </nav>
    </header>
    <main>
        <?php
            include('./content.php');
        ?>
    </main>
    <footer>Louda © All rights reserved</footer>

    <script>Notification.requestPermission();</script>
</body>
</html>