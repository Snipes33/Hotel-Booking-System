<?php


$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');

$query = mysqli_query($conn, 'select * from bookings where booking_id = ' . $_GET['id']);

$booking = mysqli_fetch_assoc($query);



$usersQuery = mysqli_query($conn, 'select * from users');


if (isset($_POST['booking_id'])) {
    $booking_date = $_POST['booking_date'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $booking_payment_type = $_POST['booking_payment_type'];

    mysqli_report(MYSQLI_REPORT_ERROR);

    $result = mysqli_query($conn, "update bookings set 
                    booking_date = '$booking_date',
                    check_in_date = '$check_in_date',
                    check_out_date = '$check_out_date' ,
                    booking_payment_type = '$booking_payment_type'
                    where booking_id = " . $_POST['booking_id']);

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
            box-sizing: border-box; /* Add box-sizing property */
            background-color: #f9f9f9; /* Add background color */
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
    <!-- empty action means submit to the current URL -->
    <form action="" method="POST">
        <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id'] ?>">
        <div>
            <label for="booking_date">Booking date</label>
            <input type="date" name="booking_date" id="booking_Date" value="<?php echo date('Y-m-d'); ?>" readonly />
        </div>

        <div>
            <label for="check_in_date">CHECK IN DATE</label>
            <input type="date" name="check_in_date" id="price" value="<?php echo $booking['check_in_date'] ?>">
        </div>
        <div>
            <label for="check_out_date">CHECK OUT DATE</label>
            <input type="date" name="check_out_date" id="quantity"  value="<?php echo $booking['check_out_date'] ?>">
        </div>
        <div>
            <label for="booking_payment_type">Payment type</label>
            <select id="booking_payment_type" name="booking_payment_type">
                <option value="Pay by card" name="booking_payment_type">Pay by card</option>
                <option value="Pay cash" name="booking_payment_type">Pay cash</option>
            </select>
        </div>





        <button type="submit">Save</button>
        <button type="reset">Cancel</button>
    </form>
</main>
</body>
</html>
