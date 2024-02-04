<?php

function emptyInputSignup($username,$name,$surname,$address,$contactnumber,$email,$password,$cpassword){
    $result =null;
    $result;
    if(empty($username)||empty($name) || empty($surname)||empty($address)||empty($contactnumber)||empty($email)||empty($password)||empty($cpassword)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidUid($username){
    $result=null;
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result = true;

    }else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){

    $result=null;
    $result;

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function passwordMatch($password,$cpassword){
    $result=null;
    $result;

    if($password!==$cpassword){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;



}

function uidExists($conn, $username,$email){
    $sql= "SELECT * FROM users WHERE username =? OR users_email_address =?;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../SignUp.php?error=stmtfailed");
        exit();

    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result=false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function  createUser($conn,$username,$name,$surname,$address,$contactnumber,$email,$password){
    $sql= "INSERT INTO users (username,password,users_first_name,users_last_name,users_address,users_contact_number,users_email_address) VALUES (?,?,?,?,?,?,?)";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../SignUp.php?error=stmtfailed");
        exit();

    }

    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sssssss",$username,$hashedPassword,$name,$surname,$address,$contactnumber,$email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../SignUp.php?error=none");
    exit();
}

function emptyInputLogin($username,$password){
    $result =null;
    $result;
    if(empty($username)||empty($password)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function loginUser($conn,$username,$password)
{

    $uidExists = uidExists($conn, $username,$username);


    if ($uidExists === false) {
        header("location: ../Login.php?error=wrongLogin");
        exit();
    }

    $pwdHashed = $uidExists["password"];

    $checkPassword = password_verify($password,$pwdHashed);

    if ($checkPassword === false) {
        header("location: ../Login.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["users_id"] = $uidExists["users_id"];
        $_SESSION["username"] = $uidExists["username"];
        $_SESSION["users_email_address"]=$uidExists["users_email_address"];
        $_SESSION["users_first_name"]=$uidExists["users_first_name"];
        $_SESSION["user_admin"]=$uidExists["user_admin"];
        header("location: ../index.php");
        exit();
    }
}














