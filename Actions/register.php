<?php
session_start();
include 'dbconnection.php';
include 'verify-client.php';

$table = 'tbl_registration_form';
$phpFileUploadErrors = array(
    0 => 'there is error',
    1 => 'there is error',
    2 => 'there is error',
    3 => 'there is error',
    4 => 'there is error',
    6 => 'there is error',
    7 => 'there is error',
    8 => 'there is error',
);

$id = $_SESSION['userid'];
$checkuser = "SELECT * FROM tbl_users WHERE userid = $id";
$result = $conn->query($checkuser);
$row = $result->fetch_assoc();
if($row['user_status'] == "pending"){
    
    header("location: ../register-form.php?error=youalreadysubmitted");
    exit();
}

if(isset($_POST["submit"])){   /* if the user didnt click the submit button the "submit" wont read. and if the user use the directory path it didnt go. you just need to signup */
    $userId = $_SESSION["userid"];
    $eml = "";
    $pwd = "";
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
    $userStatus = "pending";
   
    

    $sql = "INSERT INTO tbl_pending_user (userid, userEml, userPwd, FName, LName, Control_Num, Province, City, Baranggay, Mobile_Num, Make, Model, Color, Chasis_Num, Engine_Num, Engine_Dspcmt, OR_Num, CR_Num, Plate_Num, Ownership, date, user_status) 
    VALUES ('$userId', '$eml', '$pwd', '$fname', '$lname', '$controlnum', '$address', '$city', '$baranggay', '$contact', '$make', '$model', '$color', '$chasis', '$engine', '$engine_dis', '$OR', '$CR', '$plate', '$Typeowner', NOW(), '$userStatus')";
    
    $sql2 = "INSERT INTO tbl_application_user (userid, userEml, userPwd, FName, LName, Control_Num, Province, City, Baranggay, Mobile_Num, Make, Model, Color, Chasis_Num, Engine_Num, Engine_Dspcmt, OR_Num, CR_Num, Plate_Num, Ownership, date, user_status) 
    VALUES ('$userId', '$eml', '$pwd', '$fname', '$lname', '$controlnum', '$address', '$city', '$baranggay', '$contact', '$make', '$model', '$color', '$chasis', '$engine', '$engine_dis', '$OR', '$CR', '$plate', '$Typeowner', NOW(), '$userStatus')";
    
    $sql0 = "UPDATE tbl_users SET user_status ='pending' WHERE userid = $id";
    
   

$result = mysqli_query($conn,$sql); 
$result2 = mysqli_query($conn,$sql2); 
$result0 = mysqli_query($conn,$sql0); 

if ((!$result || !$result2 || !$result0))
	{
        echo $id;
        die('Could not enter data: '.mysqli_error($conn));
      
		
   	  }
  else{
    $folderName = $fname. " " .$lname;
    mkdir( '../uploads/' .$folderName);
      
        if(isset($_FILES['file'])){
        
            $file_array = reArrayFiles($_FILES['file']);
            //pre_r($file_array);
        
        for($i=0; $i<count($file_array); $i++){
            if($file_array[$i]['error']){
                ?> <div class="alert alert-danger">
                    <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
                    ?></div> <?php
                }
                else{
                    $extension = array('jpg', 'jpeg', 'png');
                    $file_ext = explode('.', $file_array[$i]['name']);
                    $name = $file_ext[0];
                    $file_ext = end($file_ext); 

                    if(!in_array($file_ext, $extension)){
                        ?><div class="alert alert-danger">
                        <?php echo "{$file_array[$i]['name']} - invalid file extension!";
                        ?></div><?php
                        }
                        else{

                            //$img_dir = '..uploads/' .$file_array[$i]['name'];
                            $fileDestination = '../uploads/' .$folderName. '/';
                            move_uploaded_file($file_array[$i]['tmp_name'], $fileDestination. '/'.$file_array[$i]['name']);
                         
                           

                            // $sql = "INSERT IGNORE INTO $table (name, img_dir) VALUES ('$name', '$image_dir')";
                            //$mysqli->query($sql) or die($mysqli->error);

                            header("location: ../status.php?error=registersuccessfuly");
                            
                        }
                    
               }
           }
       }
    }
  
   /*  if(emptyInputSignup($fname, $lname, $controlnum, $address, $city, $baranggay, $contact, $make, $model, $color, $chasis, $engine, $engine_dis, $OR, $CR, $plate) !== false){
        header("location: ../user_signup.php?error=emptyinput");
        exit();
    }*/


}
function reArrayFiles(&$file_post){
    $file_ary = array();    
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for($i=0; $i<$file_count; $i++){
        foreach($file_keys as $key){
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
}

?>