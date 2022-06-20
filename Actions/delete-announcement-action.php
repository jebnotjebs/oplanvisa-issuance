<?php
include "dbconnection.php";

if (isset($_GET['post_id'])) {
    echo "hello world";
    $num = $_GET['post_id'];
    $sql2 = "SELECT * FROM announcement WHERE post_id = $num";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    
    
   
    
    $sql0 = "DELETE FROM announcement WHERE post_id= $num";
   
    

}

if(($conn->query($sql0) === TRUE)) {
    header("location: ../post-announcement.php?error=deletedsuccessfully");
    
   
}
else{
    echo "error: ". $sql0 ."<br>" .$conn->error;
}

?>