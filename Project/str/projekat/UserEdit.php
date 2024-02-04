<?php


$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');

$query = mysqli_query($conn, 'select * from users where users_id = ' . $_GET['id']);

$users = mysqli_fetch_assoc($query);

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $users_first_name=$_POST['users_first_name'];
    $users_last_name=$_POST['users_last_name'];
    $users_address=$_POST['users_address'];
    $users_contact_number=$_POST['users_contact_number'];
    $users_email_address=$_POST['users_email_address'];
    mysqli_report(MYSQLI_REPORT_ERROR);

    $result = mysqli_query($conn, "update users set username = '$username', users_first_name='$users_first_name',users_last_name='$users_last_name',users_address='$users_address',users_contact_number='$users_contact_number',users_email_address='$users_email_address' where users_id = " . $_POST['id']);

    if ($result) {
        header('location: includes/logout.inc.php');
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


<div class="wrapper">
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $users['users_id'] ?>">
        <label for="name">USERNAME</label>
        <input type="text" name="username" id="name" value="<?php echo $users['username'] ?>">
        <label for="users_first_name">FIRST NAME</label>
        <input type="text" name="users_first_name" id="users_first_name" value="<?php echo $users['users_first_name'] ?>">
        <label for="users_last_name">LAST NAME</label>
        <input type="text" name="users_last_name" id="users_last_name" value="<?php echo $users['users_last_name'] ?>">
        <label for="users_address">Address</label>
        <input type="text" name="users_address" id="users_address" value="<?php echo $users['users_address'] ?>">
        <label for="users_contact_number">Contact Number</label>
        <input type="text" name="users_contact_number" id="users_contact_number" value="<?php echo $users['users_contact_number'] ?>">
        <label for="users_contact_number">Contact Number</label>
        <input type="text" name="users_contact_number" id="users_contact_number" value="<?php echo $users['users_contact_number'] ?>">
        <label for="users_email_address">Email</label>
        <input type="text" name="users_email_address" id="users_email_address" value="<?php echo $users['users_email_address'] ?>">

        <button type="submit">Save</button>
        <button type="reset">Cancel</button>
    </form>
</div>
</body>
</html>

