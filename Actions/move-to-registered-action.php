<?php
include "dbconnection.php";

if(isset($_GET['userid'])){
    $num = $_GET["userid"];
    $sql = "SELECT * FROM tbl_application_user WHERE userid = $num";
    $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        // giving the dir name
        $folderName = $row["FName"]. " " .$row["LName"];
        $fileDestination = '../uploads/' .$folderName. '/';
    
        // specified folder
        $files = glob($fileDestination.'/*'); 
        
        // Deleting all the files in the folder
        foreach($files as $file) {
        
            if(is_file($file)) 
                // Delete the given file
                unlink($file); 
        }
         // removing directory using rmdir()
        rmdir( '../uploads/' .$folderName);

    $sql2 = "INSERT into tbl_registered_member SELECT * FROM tbl_application_user WHERE userid = $num";
    $sql3 = "UPDATE tbl_application_user SET user_status ='registered' WHERE userid = $num";
    $sql0 = "DELETE FROM tbl_pending_user WHERE userid = $num";
   
    
  
}
if(($conn->query($sql2) === TRUE)) {
    if(($conn->query($sql3) === TRUE)){
        if(($conn->query($sql0) === TRUE)){
   
        header("location: ../pending_application.php?error=registeredsuccessfully");
        }
    }
   
}
else{
    echo "error: ". $sql2 ."<br>" .$conn->error;
}
?>
