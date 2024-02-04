<?php

$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');
session_start();
if (!isset($_SESSION['user_admin']) || !$_SESSION['user_admin']) {

    header('Location: ../Login.php');
    exit;
}




$query2 = mysqli_query($conn, 'select r.*, b.booking_id as booking_id, ru.room_id as room_id from rooms_booked r join bookings b on r.bookings_booking_id=b.booking_id join rooms ru on r.rooms_room_id=ru.room_Id');



?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $title = 'List rooms that are booked';
     ?>
    <style>
        body {
            font-family: 'Castoro', serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            color: #333;
        }

        th {
            background-color: #66b6d2;
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
        }

        a {
            text-decoration: none;
            color: #333;

        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #66b6d2;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #555;
    </style>
</head>
<body>

    <main class="wrapper">
        <table>
            <tr>
                <th>Rooms booked ID</th>
                <th>Booking ID</th>
                <th>Rooms ID</th>

            </tr>

            <?php while($row = mysqli_fetch_assoc($query2)): ?>
                <tr>
                    <td><?php echo $row['rooms_booked_id']; ?></td>
                    <td><?php echo $row['booking_id']; ?></td>
                    <td><?php echo $row['room_id']; ?></td>


                </tr>
            <?php endwhile; ?>
        </table>

    </main>
</body>
</html>
