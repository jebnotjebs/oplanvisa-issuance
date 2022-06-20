<?php
session_start();

if(isset($_POST["submit"])){ 
    $email = $_POST["eml"];
    $password = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $userStatus = "NV";
    
    include('../assets/php/config/database.php');
    include('../assets/php/config/index.php');
    // include('..//assets/ajax/login.js');
    // include('../assets/ajax/trapping.js');
    // include('../../assets/js/plugin/sweetalert/sweetalert2.min.js');
    
    global $database;

    
    if($info->InvalidEmail($email) !== false){
       echo 'invalid email';
       die();
    }
    if($info->pwdMatch($password, $pwdRepeat) !== false){
       echo 'password dont match';
       die();
    }
    if($info->uEmailExist($email) !== false){
        echo 'email exist';
        die();
    }
   
    $info->adduser($email, $password, $userStatus);
}
else{
    header("location: ../../index.php");
}

?>