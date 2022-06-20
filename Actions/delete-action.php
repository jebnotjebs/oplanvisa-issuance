<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. 
    if(!isset($_SESSION)) {
        session_start();
    }*/
    
    include 'dbconnection.php';
   


    if (isset($_GET['userid'])) {
        $num = $_GET['userid'];
        $sql2 = "SELECT * FROM tbl_application_user WHERE userid = $num";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        // giving the dir name
        $folderName = $row2["FName"]. " " .$row2["LName"];
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
        
        $sql0 = "DELETE FROM tbl_application_user WHERE userid= $num";
        $sql1 = "DELETE FROM tbl_pending_user WHERE userid= $num";
        $sql3 = "UPDATE tbl_users SET user_status ='active' WHERE userid = $num";
   
    }

    if(($conn->query($sql0) === TRUE)) {
        if(($conn->query($sql1) === TRUE)){
            if(($conn->query($sql3) === TRUE)){
            header("location: ../pending_application.php?error=deletedsuccessfully");
            }
        }
    }
    else{
        echo "error: ". $sql0 ."<br>" .$conn->error;
    }

    
   
  

?>
