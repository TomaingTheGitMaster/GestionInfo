<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Page Title</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/StylesPages.css">
    </head>

    <body class="Menu2">
        <h1 class="title"> Acceuil </h1>
        <?php
            
              if(isset($_SESSION['pseudo']) && (isset($_SESSION['date'])))
                { 
                    ?>
                    <p class="Logvalue1">Login : <?= $_SESSION['pseudo']; ?> </p>
                    <p class="Logvalue1">Date : <?= $_SESSION['date']; ?> </p>
                    <?php
                }
            ?>
        <nav class="menu-nav">
            <ul>
                <li class="button">
                    <a href="Baptiste.php">
                        Baptiste
                    </a>
                </li>
                <li class="button">
                    <a href="Simon.php">
                        Simon
                    </a>
                </li>
                <li class="button">
                    <a href="Enzo.php">
                        Enzo
                    </a>
                </li>
                <li class="button">
                    <a href="Romain.php">
                        Romain
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <h1 class="Video-title">
                Nos vidéos :
            </h1>
            <div class="Video-box">
                <iframe class="Video" width="560" height="315" src="https://www.youtube.com/embed/Uog_3h5AUJM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <iframe class="Video" width="560" height="315" src="https://www.youtube.com/embed/KSQabjXEy00" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <iframe class="Video" width="560" height="315" src="https://www.youtube.com/embed/ArfW-VA4i2c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
        

    </body>

    <footer>
        <nav class="menu-nav">
            <ul>
                <li class="button">
                    <a href="Loginfo.php">
                        Log Information
                    </a>
                </li>
                <li class="button">
                    <a href="Index.php">
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
    </footer>
</html>
