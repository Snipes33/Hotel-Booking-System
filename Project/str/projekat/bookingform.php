<?php


session_start();



$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');

$query = mysqli_query($conn, 'select * from bookings');

$bookingQuery = mysqli_fetch_assoc($query);

$hotelQuery=mysqli_query($conn,'select * from hotel');


$id=$_GET['id'];


if (isset($_POST['booking_date'])) {
    $booking_date = $_POST['booking_date'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $booking_payment_type = $_POST['booking_payment_type'];
    if(isset($_SESSION)){
        $users_user_id=$_SESSION["users_id"];
    }
    $hotel_hotel_id=$_POST['hotel_hotel_id'];
    if($id=='1'){
        $cost_per_night=100.00;
    }else if($id=='2'){
        $cost_per_night=300.00;
    }else{
        $cost_per_night=500.00;
    }




    mysqli_report(MYSQLI_REPORT_ERROR);

    $result = mysqli_query($conn,
        "insert into bookings (booking_date, check_in_date, check_out_date, booking_payment_type,users_user_id,hotel_hotel_id,cost_per_night) values ('$booking_date',' $check_in_date', '$check_out_date', '$booking_payment_type','$users_user_id','$hotel_hotel_id','$cost_per_night')");





    if ($result) {
        header('location: profile.php');
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
        h1{
            margin: 0 auto;
        }

        #firstpicture{
            max-width: 100%;
            height: auto;
        }
        #secondpicture{
            max-width: 100%;
            height: auto;
        }
        #thirdpicture{
            max-width: 100%;
            height: auto;
        }

    </style>
</head>
<body>
<main class="wrapper">
    <form action="" method="POST" enctype="multipart/form-data">
        <?php if ($_GET['id']==1) echo "<h1>STANDARD ROOM </h1>"?>
        <?php if ($_GET['id']==2) echo "<h1>DELUXE ROOM</h1>"?>
        <?php if ($_GET['id']==3) echo "<h1>PRESIDENTIAL SUITE</h1>"?>

            <?php if ($_GET['id']==1) echo "<img id='firstpicture' src='https://www.eliaermouhotel.com/uploads/photos/D1024/2019/02/standardroom_1878.jpg' alt='Image 1'>"; ?>
            <?php if ($_GET['id']==2) echo "<img id='secondpicture' src='https://design-milk.com/images/2018/07/serafina-beach-hotel-20-810x540.jpg' alt='Image 2'>";?>
            <?php if ($_GET['id']==3) echo "<img id='thirdpicture' src='https://do6raq9h04ex.cloudfront.net/sites/2/2021/09/1600x960-2-1.jpg' alt='Image 3'>"?>








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

        <button type="submit">BOOK ROOM</button>
    </form>
</main>
</body>
</html>
