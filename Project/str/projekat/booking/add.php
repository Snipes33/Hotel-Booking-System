<?php




$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');

$query = mysqli_query($conn, 'select * from bookings');

$bookingQuery = mysqli_fetch_assoc($query);

$hotelQuery=mysqli_query($conn,'select * from hotel');

$usersQuery = mysqli_query($conn, 'select * from users');


if (isset($_POST['booking_date'])) {
    $booking_date = $_POST['booking_date'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $booking_payment_type = $_POST['booking_payment_type'];
    $users_user_id = $_POST['users_user_id'];
    $hotel_hotel_id=$_POST['hotel_hotel_id'];
    $cost_per_night=$_POST['cost_per_night'];



    mysqli_report(MYSQLI_REPORT_ERROR);

    $result = mysqli_query($conn,
        "insert into bookings (booking_date, check_in_date, check_out_date,booking_payment_type,users_user_id,hotel_hotel_id,cost_per_night) values ('$booking_date',' $check_in_date', '$check_out_date', '$booking_payment_type','$users_user_id','$hotel_hotel_id','$cost_per_night')");




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
    <form action="" method="POST" enctype="multipart/form-data">

        <div>
            <label for="booking_date">Booking date</label>
            <input type="date" name="booking_date" id="booking_Date" value="<?php echo date('Y-m-d'); ?>" readonly />
        </div>
        <div>
            <label for="check_in_date">Check in date</label>
            <input type="date" name="check_in_date" id="check_in_date" >
        </div>
        <div>
            <label for="check_out_date">Check out date</label>
            <input type="date" name="check_out_date" id="check_out_date" >
        </div>
        <div>
            <label for="booking_payment_type">Payment type</label>
            <select id="booking_payment_type" name="booking_payment_type">
                <option value="Pay by card" name="booking_payment_type">Pay by card</option>
                <option value="Pay cash" name="booking_payment_type">Pay cash</option>
            </select>
        </div>


        <div>
            <label for="cost_per_night">Cost per night</label>
            <input type="text" name="cost_per_night" id="cost_per_night">
        </div>
        <div>
            <label for="users_user_id">User</label>
            <select name="users_user_id" id="users_user_id">
                <option value="">Select a user</option>
                <?php
                while ($user = mysqli_fetch_assoc($usersQuery)):
                ?>
                    <option value="<?php echo $user['users_id'] ?>"><?php echo $user['users_first_name'] ?></option>

                <?php
                endwhile;
                ?>
            </select>
        </div>

        <div>
            <label for="hotel_hotel_id">Hotel</label>
            <select name="hotel_hotel_id" id="hotel_hotel_id">
                <option value="">Select a hotel</option>
                <?php
                while ($hotel = mysqli_fetch_assoc($hotelQuery)):
                    ?>
                    <option value="<?php echo $hotel['hotel_id'] ?>"><?php echo $hotel['hotel_name'] ?></option>

                <?php
                endwhile;
                ?>
            </select>
        </div>

        <button type="submit">Save</button>
    </form>
</main>
</body>
</html>
