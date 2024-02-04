<?php


session_start();

if (!isset($_SESSION['user_admin']) || !$_SESSION['user_admin']) {

    header('Location: Login.php');
    exit;
}
$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');


$room_type_query = mysqli_query($conn, 'select * from room_type');
$hotelquery = mysqli_query($conn, 'select * from hotel');


if (isset($_POST['room_number'])) {



    $room_number= $_POST['room_number'];
    $room_type_id= $_POST['room_type_id'];
    $hotel=$_POST['hotel_id'];


    $result = mysqli_query($conn, "insert into rooms (room_number,rooms_type_rooms_type_id,hotel_hotel_id) values ('$room_number','$room_type_id',$hotel) ");


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
        <label for="name">Room number</label>
        <input type="text" name="room_number" id="name">

        <div>
            <label for="room_type_name">Type of room</label>
            <select name="room_type_id" id="room_type_id">
                <option value="">Select a type of room</option>
                <?php
                while ($room_type= mysqli_fetch_assoc($room_type_query)):
                    ?>
                    <option value="<?php echo $room_type['room_type_id'] ?>"><?php echo $room_type['room_type_name'] ?></option>
                <?php
                endwhile;
                ?>
            </select>
        </div>

        <div>
            <label for="hotel_id">Hotel</label>
            <select name="hotel_id" id="category_id">
                <option value="">Select a hotel</option>
                <?php
                while ($hotel = mysqli_fetch_assoc($hotelquery)):
                    ?>
                    <option value="<?php echo $hotel['hotel_id'] ?>"><?php echo $hotel['hotel_name'] ?></option>
                <?php
                endwhile;
                ?>
            </select>
        </div>



        <button type="submit">Submit</button>
    </form>
</main>

</body>
</html>