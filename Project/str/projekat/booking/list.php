<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');

if (!isset($_SESSION['user_admin']) || !$_SESSION['user_admin']) {

    header('Location: ../Login.php');
    exit;
}

$query = mysqli_query($conn, 'select b.*, u.users_first_name as users_name from bookings b join users u on b.users_user_id=u.users_id ');





?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $title = 'List bookings';
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
            <th>ID</th>
            <th>Booking Date</th>
            <th>Duration of stay</th>
            <th>Check in Date</th>
            <th>Check out Date</th>
            <th>Payment type</th>
            <th>Hotel</th>
            <th>Main guest</th>
            <th>Cost per night</th>
            <th>Total cost</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?php echo $row['booking_id']; ?></td>
                <td><?php echo $row['booking_date']; ?></td>
                <td><?php echo $row['duration_of_stay']; ?></td>
                <td><?php echo $row['check_in_date']; ?></td>
                <td><?php echo $row['check_out_date']; ?></td>
                <td><?php echo $row['booking_payment_type']; ?></td>
                <td><?php echo $row['hotel_hotel_id']; ?></td>
                <td><?php echo $row['users_name']; ?></td>
                <td><?php echo $row['cost_per_night']; ?></td>
                <td><?php echo $row['total_cost']; ?></td>

                <td><a href="edit.php?id=<?php echo $row['booking_id']; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $row['booking_id']; ?>">Delete</a></td>




            </tr>
        <?php endwhile; ?>



    </table>
    <a href="add.php" class="button">ADD</a>


</main>
</body>
</html>
