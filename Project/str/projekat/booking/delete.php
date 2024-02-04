<?php

$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');

mysqli_report(MYSQLI_REPORT_ERROR);


$bookingId = $_GET['id'];

$deleteBookingQuery = "DELETE FROM bookings WHERE booking_id = $bookingId";
$result= mysqli_query($conn, $deleteBookingQuery);



if ($result) {
    header('location: list.php');
    exit();
} else {
    echo 'Fail';
}
