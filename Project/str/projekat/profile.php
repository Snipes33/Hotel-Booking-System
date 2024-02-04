<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page</title>
    <style>
        body {
            font-family:'Castoro', serif;
            background-color: #f2f2f2;
            margin: 100px;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

        }



        .account-info {
            margin-top: 30px;
        }

        .account-info h2 {
            font-size: 20px;
            color: #333333;
            margin-bottom: 15px;
        }

        .account-info p {
            font-size: 16px;
            color: #666666;
            margin-bottom: 10px;
        }

        .logout {
            text-align: center;
            margin-top: 30px;
        }

        .logout a {
            display: block; 
            text-decoration: none;
            color: #000000;
            font-size: 18px;
            padding: 10px 20px;
            background-color: #e0e0e0;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .logout a:hover {
            background-color: #cccccc;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            color: #333;
        }

        th {
            background-color: rgba(27,74,137,0.54);
            color: #fff;
            font-weight: bold;
            padding: 10px;
            text-align: center;
            border: 1px solid black;
        }

        td {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
            font-size: 14px;
        }

        body {
            background-color: #f1f1f1;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 50px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #555;
        }

        .account-info {
            margin-bottom: 30px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #777;
            padding-top: 25px;
        }

        p {
            font-size: 25px;
            margin-bottom: 5px;
        }

        .logout {
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: black;
            font-weight: bold;

        }

        a:hover {
            color: #23527c;
        }
        li{
            text-align: left;
        }

        .links{
            align-items: center;
            margin-left: 270px;
            padding-bottom: 10px;
        }

        button {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            background-color: lightblue;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: skyblue;
        }

        button:active {
            background-color: deepskyblue;
        }

    </style>
    <title>Account Page</title>
</head>
<body>
<div class="container">
    <h1>WELCOME TO YOUR ACCOUNT </h1>
    <div class="account-info">
        <h2>Account Information</h2>
        <p><strong>Username:</strong> <?php if($_SESSION) echo $_SESSION["username"] ?> </p>
        <p><strong>Email:</strong> <?php if($_SESSION) echo $_SESSION["users_email_address"] ?></p>
        <p><strong>Name:</strong> <?php if($_SESSION) echo $_SESSION["users_first_name"] ?></p>
        <p><strong>Role:</strong> <?php if($_SESSION["user_admin"]) echo "Admin"?> <?php if(!($_SESSION["user_admin"])) echo "User"?></p>

        <?php if(!($_SESSION["user_admin"])){
            $_id=$_SESSION["users_id"];
          echo "<form action='UserEdit.php' method='GET'>
            <input type='hidden' name='id' value='$_id' />
            <button type='submit' >Change user data</button>
        </form>";}
        ?>



        <?php if($_SESSION["user_admin"]){
            echo "<h2>Lists</h2>";
            echo "<li class='links'><a href='users/list.php' >Show list of all registered users</a></li>";
            echo "<li class='links'><a href='rooms/list.php' >    Show list of all rooms</a></li>";
            echo "<li class='links'><a href='room_type/list.php' >Show list of all room types</a></li>";
            echo "<li class='links'><a href='booking/list.php'>Show all bookings</a></li>";
            echo "<li class='links'><a href='rooms_booked/list.php' >Show all booked rooms</a></li>";


        } ?>


    </div>
    <?php
    $conn=mysqli_connect("localhost","root","","hotelnovi");
    $query = mysqli_query($conn, 'select * from bookings where users_user_id = ' . $_SESSION['users_id']);



    ?>
    
    <h2>MY BOOKINGS </h2>

    <table>
        <tr>
            <th>Booking Date</th>
            <th>Duration of stay</th>
            <th>Check in Date</th>
            <th>Check out Date</th>
            <th>Payment type</th>
            <th>Hotel</th>
            <th>Main guest</th>
            <th>Cost per night</th>
            <th>Total cost</th>

            <th>Delete</th>


        </tr>


        <?php while($row = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?php echo $row['booking_date']; ?></td>
                <td><?php echo $row['duration_of_stay']; ?></td>
                <td><?php echo $row['check_in_date']; ?></td>
                <td><?php echo $row['check_out_date']; ?></td>
                <td><?php echo $row['booking_payment_type']; ?></td>
                <td><?php echo "Oasis Bliss Resort"; ?></td>
                <td><?php echo $_SESSION["users_first_name"] ?></td>
                <td><?php echo $row['cost_per_night']; ?></td>
                <td><?php echo $row['total_cost']; ?></td>

                <td><a href="deletebooking.php?id=<?php echo $row['booking_id']; ?>">Delete</a></td>;




            </tr>
        <?php endwhile; ?>



    </table>

    <div class='logout'>

        <a href = "includes/logout.inc.php" > Logout</a >
        <a href ="index.php"  > Home</a >
    </div >


</div>
</body>
</html>