<?php



if(isset($_POST["submit"])){

    $username=$_POST["username"];
    $name= $_POST["name"];
    $surname= $_POST["surname"];
    $address= $_POST["address"];
    $contactnumber= $_POST["contact"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $cpassword= $_POST["confirmpassword"];

   require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if(emptyInputSignup($username,$name,$surname,$address,$contactnumber,$email,$password,$cpassword)!==false){
        header("location:../SignUp.php?error=emptyinput");
        exit();
    }

    if(invalidUid($username)!==false){
        header("location:../SignUp.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email)!==false){
        header("location:../SignUp.php?error=invalidemail");
        exit();
    }
    if(passwordMatch($password,$cpassword)!==false){
        header("location:../SignUp.php?error=passwordsdontmatch");
        exit();
    }


    if(uidExists($conn,$username,$email)!==false){
        header("location:../SignUp.php?error=usernametaken");
        exit();
    }






    createUser($conn,$username,$name,$surname,$address,$contactnumber,$email,$password);

}else{
    header("location:../SignUp.php");
    exit();
}
