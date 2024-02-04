<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp</title>
    <style>
        body {
            background-color: #f1f1f1;
            font-family:'Castoro', serif;
        }

        .body-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .module {
            background-color: #fff;
            padding: 60px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .module h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 32px;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .form input[type="text"],
        .form input[type="password"] {
            padding: 16px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 18px;
        }

        .form button {
            padding: 16px;
            background-color:  #66b6d2;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .form button:hover {
            background-color: #66b6d2;
        }

        p{
            text-align: center;
        }
    </style>



</head>
<body>


<div class="body-content">
    <div class="module">
        <h1>LOG IN </h1>
        <form class="form" action="includes/login.inc.php"  method="post" autocomplete="off">
            <div class="alert alert-error"></div>
            <input type="text" placeholder="Username/Email.." name="username" required />
            <input type="password" placeholder="Password" name="password"  required />
            <button id="logindugme" type="submit" name="submit">Log In</button>
        </form>
        <?php

        if(isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields</p>";
            } else if ($_GET["error"] == "wrongLogin") {
                echo "<p>Incorrect login information</p>";
            }
        }

        ?>
    </div>

</div>
</body>
</html>