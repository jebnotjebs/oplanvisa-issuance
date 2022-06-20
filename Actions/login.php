<?php
/* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }
if(isset($_POST["submit"])){   /* if the user didnt click the submit button the page wont go. and if the user use the directory path it didnt go. you just need to signup */
   
    $email = $_POST["eml"];
    $password = $_POST["pwd"];
    

   
    require_once 'dbconnection.php';
    require_once 'functions.php';
    
    

    loginUser($conn, $email, $password);
}
else{
    session_destroy();
    die(header("location: ../user-login.php?"));
}
?>