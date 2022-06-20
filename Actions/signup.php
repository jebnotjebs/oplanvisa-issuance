<?php
session_start();

if(isset($_POST["submit"])){   /* if the user didnt click the submit button the "submit" wont read. and if the user use the directory path it didnt go. you just need to signup */

  
    $email = $_POST["eml"];
    $password = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $userStatus = "notverified";

    include_once 'dbconnection.php';
    include_once 'functions.php';

  
    if(InvalidEmail($email) !== false){
        header("location: ../index.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($password, $pwdRepeat) !== false){
        header("location: ../index.php?error=passworddontmatch");
        exit();
    }
    if(uEmailExist($conn, $email) !== false){
        header("location: ../index.php?error=emailalreadytaken");
        exit();
    }
   

    createUser($conn, $email, $password, $userStatus);
    verify($email);
    
   


}
else{
    header("location: ../index.php");
    exit();
}
?>