<?php
session_start();

if(isset($_POST["submit"])){



    $username1 =$_POST["username"];
    $pwd =$_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';




    if(emptyInputLogin($username1,$pwd)!==false){
        header("location:../Login.php?error=emptyinput");
        exit();
    }


    loginUser($conn,$username1,$pwd);


}else{
    header("location: ../Login.php");
    exit();
}



