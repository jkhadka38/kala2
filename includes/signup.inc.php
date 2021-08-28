<?php

if(isset($_POST["signup_submit"])) {

    $email = $_POST["email"];
    $username = $_POST["uname"];
    $password = $_POST["pword"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($email,$username,$password) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit(); 
    }

    if(invalidEmail($email) !==false){
        header("location: ../signup.php?error=invalidemali");
        exit(); 
    }

    if(invalidUname($username) !==false){
        header("location: ../signup.php?error=envaliduname");
        exit(); 
    }

    if(unameExists($conn, $username,$email) !==false){
        header("location: ../signup.php?error=usernametaken");
        exit(); 
    }

    createUser($conn, $email, $username, $password);

}
else{
    header("location: ../signup.php");
    exit(); 
}