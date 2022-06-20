<?php
include "dbconnection.php";
//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
}
//##########################################################################
if(isset($_GET['userid'])){
    $num = $_GET["userid"];
    $sql = "SELECT * FROM tbl_registered_member WHERE userid = $num";
    $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    $name = "Ifugao Oplan Visa";
    $number = $row["Mobile_Num"];
    $message = "Congrats! You can now get your VISA certificate. Please visit Sta. Maria, Police station.";
    $api = "TR-OPLAN814171_EGWJL";
    $api_pass = "sf7k25)%7z";
    $text = $name. ": " .$message;
  
    $result = itexmo($number, $message, $api, $api_pass);
    
    if ($result == ""){
        echo $number;
    echo "iTexMo: No response from server!!!
    Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
    Please CONTACT US for help. ";	
    }else if ($result == 0){
    header("location: ../registered-member.php?error=smssent");
    }
    else{	
    echo "Error Number: Please provide a valid number";
    }
}

?>