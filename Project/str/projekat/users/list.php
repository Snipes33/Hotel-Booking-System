
<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');

$query = mysqli_query($conn, 'select * from users');

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
            text-align: left;
            border: 1px solid black;
            text-align: center;
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

        svg {
            width: 20px;
        }

    </style>
</head>
<body>

<main class="wrapper">
    <table>
        <thead>
        <tr>
            <th>USER ID</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>ADDRESS</th>
            <th>CONTACT NUMBER</th>
            <th>EMAIL ADDRESS</th>
            <th>ADMIN</th>
            <th>EDIT</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($user = mysqli_fetch_assoc($query)) {?>
            <tr>
                <td><?php echo $user['users_id']?></td>
                <td><?php echo $user['username']?></td>
                <td><?php echo $user['password']?></td>
                <td><?php echo $user['users_first_name']?></td>
                <td><?php echo $user['users_last_name']?></td>
                <td><?php echo $user['users_address']?></td>
                <td><?php echo $user['users_contact_number']?></td>
                <td><?php echo $user['users_email_address']?></td>

                <td>
                    <a href="toggleAdmin.php?id=<?php echo $user['users_id'] ?>">
                        <?php if ($user['user_admin'] != 1): ?>
                            <svg style="color: red" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        <?php else: ?>
                            <svg style="color: green;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        <?php endif; ?>
                    </a>
                </td>
                <td><a href="edit.php?id=<?php echo $user['users_id'] ?>">Edit</a></td>
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</main>
</body>
</html>