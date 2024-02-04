<?php
$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');

mysqli_report(MYSQLI_REPORT_ERROR);


$user_id = $_GET['id'];

$user = mysqli_fetch_assoc(mysqli_query($conn, 'select * from users where users_id = ' . $user_id));

$newAdminValue = null;

if ($user['user_admin'] == 0) {
    $newAdminValue = 1;
} else {
    $newAdminValue = 0;
}

mysqli_query($conn, 'update users set user_admin = ' . $newAdminValue . ' where users_id = ' . $user_id);

header('Location: list.php');
exit;