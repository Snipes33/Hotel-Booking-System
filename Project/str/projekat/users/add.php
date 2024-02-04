<?php



session_start();

if (!isset($_SESSION['user_admin']) || !$_SESSION['user_admin']) {

    header('Location: Login.php');
    exit;
}

if (isset($_POST['username'])) {


    $conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');


    $username = $_POST['username'];
    $password=$_POST['password'];
    $first_name=$_POST['users_first_name'];
    $last_name=$_POST['users_last_name'];
    $users_address=$_POST['users_address'];
    $users_contact=$_POST['users_contact_number'];
    $users_email=$_POST['users_email_address'];
    $user_admin = mysqli_real_escape_string($conn, $_POST['admin'] ?? 0);
    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);


    $result = mysqli_query($conn, "insert into users (username,password,users_first_name,users_last_name,users_address,users_contact_number,users_email_address,user_admin) values ('$username','$hashedPassword','$first_name','$last_name','$users_address','$users_contact','$users_email','$user_admin')");

    if ($result) {
        header('location: list.php');
        exit();
    } else {
        echo 'Fail';
    }


    exit;
}

?>
<!doctype html>
<html lang="en">
<head>


    <style>

        body {
            font-family: 'Castoro', serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .wrapper {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .wrapper h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .wrapper form {
            display: grid;
            grid-gap: 10px;
        }

        .wrapper label {
            font-weight: bold;
            color: #555;
        }

        .wrapper input[type="date"],
        .wrapper input[type="text"],
        .wrapper select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        .wrapper button[type="submit"],
        .wrapper button[type="reset"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .wrapper button[type="submit"]:hover,
        .wrapper button[type="reset"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<main class="wrapper">

    <form action="" method="POST">
        <label for="name">Username</label>
        <input type="text" name="username" id="name">

        <label for="name">Password</label>
        <input type="text" name="password" id="name">

        <label for="name">First name</label>
        <input type="text" name="users_first_name" id="name">

        <label for="name">Last name</label>
        <input type="text" name="users_last_name" id="name">

        <label for="name">Users Address</label>
        <input type="text" name="users_address" id="name">

        <label for="name">Contact Number</label>
        <input type="text" name="users_contact_number" id="name">

        <label for="name">Email address</label>
        <input type="text" name="users_email_address" id="name">

        <div>
            <label for="admin">Admin privileges</label>
            <input type="checkbox" value="1" name="admin" id="admin">
        </div>



        <button type="submit">Submit</button>



    </form>
</main>
</body>
</html>