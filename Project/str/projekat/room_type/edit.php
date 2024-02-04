<?php


$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');


$query = mysqli_query($conn, 'select * from room_type where room_type_id = ' . $_GET['id']);

$room_type = mysqli_fetch_assoc($query);

if (isset($_POST['room_type_name'])) {
    $room_type_name = $_POST['room_type_name'];

    mysqli_report(MYSQLI_REPORT_ERROR);

    $result = mysqli_query($conn, "update room_type set room_type_name = '$room_type_name' where room_type_id = " . $_POST['id']);

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


<div class="wrapper">
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $room_type['room_type_id'] ?>">
        <label for="name">ROOM TYPE NAME</label>
        <input type="text" name="room_type_name" id="name" value="<?php echo $room_type['room_type_name'] ?>">
        <button type="submit">Save</button>
        <button type="reset">Cancel</button>
    </form>
</div>
</body>
</html>


