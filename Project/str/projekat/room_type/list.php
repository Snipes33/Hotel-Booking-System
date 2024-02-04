<?php


$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');


$query = mysqli_query($conn, 'select * from room_type');

?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $title = 'List room type';
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
            <th>Room type ID</th>
            <th>Type</th>
            <th>Cost</th>
            <th>Description</th>
            <th>Smoke friendly</th>
            <th>Pet friendly</th>
            <th>Edit</th>



        </tr>


        <?php while($row = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?php echo $row['room_type_id']; ?></td>
                <td><?php echo $row['room_type_name']; ?></td>
                <td><?php echo $row['room_cost']; ?></td>
                <td><?php echo $row['room_type_description']; ?></td>
                <td><?php echo $row['smoke_friendly']; ?></td>
                <td><?php echo $row['pet_friendly']; ?></td>



                <td><a href="edit.php?id=<?php echo $row['room_type_id']; ?>">Edit</a></td>

            </tr>

        <?php endwhile; ?>


    </table>

</main>
</body>
</html>