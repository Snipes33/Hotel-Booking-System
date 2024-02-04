<?php


$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');


$query2 = mysqli_query($conn, 'select r.*, h.hotel_name as hotel, rt.room_type_name as room_type_name from rooms r join hotel h on r.hotel_hotel_id = h.hotel_id join room_type rt  on r.rooms_type_rooms_type_id = rt.room_type_id');


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
            <th>Room ID</th>
            <th>Room number</th>
            <th>Room type</th>
            <th>Hotel the room belongs to</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($query2)): ?>
            <tr>
                <td><?php echo $row['room_id']; ?></td>
                <td><?php echo $row['room_number']; ?></td>
                <td><?php echo $row['rooms_type_rooms_type_id']; ?></td>
                <td><?php echo $row['hotel_hotel_id']; ?></td>

                <td><a href="edit.php?id=<?php echo $row['room_id']; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $row['room_id']; ?>">Delete</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="add.php" class="button">ADD</a>

</main>
</body>
</html>