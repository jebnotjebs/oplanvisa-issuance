<?php
include "dbconnection.php";

if(isset($_GET['userid'])){
    $num = $_GET["userid"];
    $sql = "SELECT * FROM tbl_registered_member WHERE userid = $num";
    $result = $conn->query($sql);
        $row = $result->fetch_assoc();
       
    
     

    $sql2 = "INSERT into  tbl_registered_visa SELECT * FROM tbl_registered_member WHERE userid = $num";
    $sql3 = "UPDATE tbl_application_user SET user_status ='Ready to pick up' WHERE userid = $num";
    $sql0 = "DELETE FROM tbl_registered_member WHERE userid= $num";
    
  
}
if(($conn->query($sql2) === TRUE)) {
   if(($conn->query($sql3) === TRUE)){
    if(($conn->query($sql0) === TRUE)){
        header("location: ../registered-member.php?error=movesuccessfuly");
       }
   }
}
else{
    echo "error: ". $sql2 ."<br>" .$conn->error;
}
?>
