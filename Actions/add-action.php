<?php
include "dbconnection.php";


if(isset($_POST["submit"])){
   
    $fname = $_POST["FName"];
    $lname = $_POST["LName"];
    $controlnum = $_POST["Control_Num"];
    $address = $_POST["Province"];
    $city = $_POST["City"];
    $baranggay = $_POST["Baranggay"];
    $contact = $_POST["Mobile_Num"];
    $make = $_POST["Make"];
    $model = $_POST["Model"];
    $color = $_POST["Color"];
    $chasis = $_POST["Chasis_Num"];
    $engine = $_POST["Engine_Num"];
    $engine_dis = $_POST["Engine_Dspcmt"];
    $OR = $_POST["OR_Num"];
    $CR = $_POST["CR_Num"];
    $plate = $_POST["Plate_Num"];
    $Typeowner = $_POST["Ownership"];
   
    $sql = "INSERT INTO tbl_registered_member (FName, LName, Control_Num, Province, City, Baranggay, Mobile_Num, Make, Model, Color, Chasis_Num, Engine_Num, Engine_Dspcmt, OR_Num, CR_Num, Plate_Num, Ownership, date) 
    VALUES ('$fname', '$lname', '$controlnum', '$address', '$city', '$baranggay', '$contact', '$make', '$model', '$color', '$chasis', '$engine', '$engine_dis', '$OR', '$CR', '$plate', '$Typeowner', NOW())";
    
    mysqli_select_db($conn, $dBname);
    $result = mysqli_query($conn,$sql); 
    if ((!$result))
        {
            die('Could not enter data: '.mysqli_error($conn));
        
            
        }

        header("location: ../registered-member.php?error=registersuccessfully");
}
?>