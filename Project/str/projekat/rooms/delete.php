<?php

$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');

mysqli_report(MYSQLI_REPORT_ERROR);

$room_id = $_GET['id'];

$result = mysqli_query($conn, 'delete from rooms where room_id = ' . $room_id);

if ($result) {
    header('location: list.php');
    exit();
} else {
    echo 'Fail';
}
