<?php



function InvalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ 
        $result = true; 
    }  
    else{
        $result = false; 
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){ 
        $result = true; 
    }  
    else{
        $result = false; 
    }
    return $result;
}

function uEmailExist($conn, $email){
   $sql = "SELECT * FROM tbl_users WHERE userEml = ?";
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../index.php?error=stmtfailed");
    exit();
   }
   mysqli_stmt_bind_param($stmt, "s", $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if($row = mysqli_fetch_assoc($resultData)){
       return $row;
   }
   else{    
       $result = false;
       return $result;
   }
   mysqli_stmt_close($stmt);
}

function verify($email){

    $otp = rand(100000,999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['mail'] = $email;
    require "../Mail/phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';

    $mail->Username='johndelbarcelona@gmail.com';
    $mail->Password='ydlqkldfilzyjzvw';

    $mail->setFrom('johndelbarcelona@gmail.com', 'OTP Verification');
    $mail->addAddress($_POST["eml"]);

    $mail->isHTML(true);
    $mail->Subject="Your verify code";
    $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
    <br><br>
    <p>With regrads,</p>
    <b>Oplan Visa Issuance System</b>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo "Register Failed, Invalid Email "?>");
                    </script>
                <?php
            }else{
                header("location: OTP-action.php?error=signupsuccessfully");
                ?>
                
                
                <?php
            }
}
function createUser($conn, $email, $password, $userStatus){
    $sql = "INSERT INTO tbl_users (userEml, userPwd, user_status) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
     header("location: ../index.php?error=stmtfailed");
     exit();
    }
    else{
        //hashing the password
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPwd, $userStatus);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        //this is there the otp will send

    }

 
 }
 /* functions of user login */

 function emptyInputLogin($email, $password){
    $result;
    if(empty($email) || empty($password)){
        $result = true; /* if there are empty submitted the relust is true. which mean theres a mistake*/
    }
    else{
        $result = false; /* false if the inputted was smooth */
    }
    return $result;
}
function loginUser($conn, $email, $password){
    $uEmailExist = uEmailExist($conn, $email);
    $verify = $uEmailExist["user_status"];
    
    if($uEmailExist === false){
        header("location: ../user-login.php?error=invalidemail");
        exit();
    }
   
    $pwdHashed = $uEmailExist["userPwd"];
    $checkPwd = password_verify($password, $pwdHashed);

    if($checkPwd === false){
        header("location: ../user-login.php?error=wrongpassword");
        exit();
    }
    if($verify == "notverified"){
        header("location: ../user-login.php?error=notverified");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        
        $_SESSION["userid"] = $uEmailExist['userid'];
        $_SESSION["useremail"] = $uEmailExist['userEml'];
        $_SESSION['isCustValid'] = true;
        $cuzid = $_SESSION["userid"];
        
        header("location: ../register-form.php?userid= $cuzid"); 
        exit();
        
       
    }

 }


?>