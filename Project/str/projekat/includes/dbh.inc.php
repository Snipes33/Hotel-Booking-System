<?php


$conn = mysqli_connect('localhost', 'root', '', 'hotelnovi');

if(!$conn){
    die("Connection failed: " .mysqli_connect_error());

}else{
    echo "Connection established";
}
?>


