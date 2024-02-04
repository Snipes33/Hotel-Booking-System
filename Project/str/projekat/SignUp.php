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
            font-family: Arial, sans-serif;
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
            max-width: 800px;
            margin: 0 auto;
        }

        .module h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 32px;
        }

        .form {
            display: flex;
            flex-direction: column;
            width: 700px;
        }

        .form input[type="text"],
        .form input[type="password"],
        .form input[type="email"] {
            padding: 16px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 18px;
        }

        .form input[type="submit"] {
            padding: 16px;
            background-color: #66b6d2;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .form input[type="submit"]:hover {
            background-color:#66b6d2;
        }

        p{
            text-align: center;
        }
    </style>


</head>
<body>


<div class="body-content">
    <div class="module">
        <h1>CREATE AN ACCOUNT </h1>
        <form class="form" action="includes/signup.inc.php" method="post" autocomplete="off">
            <div class="alert alert-error"></div>
            <input type="text" placeholder="Username" name="username" required />
            <input type="text" placeholder="Name" name="name" required />
            <input type="text" placeholder="Surname" name="surname" required />
            <input type="text" placeholder="Address" name="address" required />
            <input type="text" placeholder="Contact Number" name="contact" required />
            <input type="email" placeholder="Email" name="email" required />
            <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
            <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
            <input type="submit" value="Register" name="submit" class="btn btn-block btn-primary" />
        </form>
        <?php

        if(isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields</p>";
            } else if ($_GET["error"] == "invaliduid") {
                echo "<p>Choose a proper username!</p>";
            } else if ($_GET["error"] == "invalidemail") {
                echo "<p>Choose a proper email!</p>";
            } else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p>Passwords do not match!</p>";
            } else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something went wrong,try again.</p>";
            } else if ($_GET["error"] == "usernametaken") {
                echo "<p>Account already exists!</p>";
            } else if ($_GET["error"] == "none") {
                echo "<p>You have signed up!</p>";
                header("location: Login.php");
            }
        }

        ?>
    </div>

</div>
</body>
</html>