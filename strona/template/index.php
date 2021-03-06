<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoudAds - ogłoszenia</title>
    <link rel="stylesheet" href="../template/style.css">
</head>
<body>
    <header>
        <div class='lougo'>
            <a class='header-element' onClick="toggleMobileNav()">LoudAds</a>
        </div>
        <nav>
            <a class='header-element tecza' href='../random'>Losowe ogłoszenie</a>
            <a class='header-element' href='../home'>Strona Główna</a>
            <a class='header-element' href='../dodaj'>Dodaj ogłoszenie</a>
            <?php
                include('../template/session.php');
            ?>
        </nav>
    </header>
    <main>
        <?php
            include('./content.php');
        ?>
    </main>
    <footer>Louda © No rights reserved</footer>

    <script>Notification.requestPermission()</script>
    <script src="../template/responsive.js"></script>
</body>
</html>