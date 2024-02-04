<?php
session_start()
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav>
        <input id="nav-toggle" type="checkbox">
        <div class="logo">
            <img class="logo" src="img/crnilogo.png" alt="logo" width="100px">
        </div>
        <ul class="links">
            <li><a href="index.php">HOME</a></li>
            <li><a href="rooms.php">ROOMS</a></li>
            <li><a href="#bottom">CONTACT</a></li>
            <?php
             if(!isset($_SESSION["username"])){
                 echo " <li><a href='Login.php' >LOG IN</a></li>";
                 echo  "<li><a href='SignUp.php''>SIGN UP</a></li>";
             }
            ?>
            <?php
                    if(isset($_SESSION["username"])){
                        echo "<li><a href='profile.php'>PROFILE</a></li>";

                    }

            ?>





        </ul>


        <label for="nav-toggle" class="icon-burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </label>
    </nav>
</header>
</body>
</html>
