<?php 
session_start();
Class Info extends Database {

	public function adduser($email, $password, $Rpassword){

		if($password == $Rpassword){
			$have = self::query_run("SELECT COUNT(userid) cnt FROM tbl_users WHERE UserEml  = '$email'");
			$h = mysqli_fetch_object($have);

			$hash = password_hash($password, PASSWORD_DEFAULT);
			
			if ($h->cnt == 0){
				$query = self::query_run("INSERT INTO tbl_users (userEml,userPwd,user_status) VALUES ('$email','$hash','PENDING')");
				$eml = $email;
				$_SESSION['email'] = $eml;
				if($query){

					$otp = rand(100000,999999);
					$_SESSION['otp'] = $otp;
					
					require "../../../assets/phpmailer/PHPMailerAutoload.php";
					$mail = new PHPMailer;
					$mail->isSMTP();
					$mail->Host='smtp.gmail.com';
					$mail->Port=587;
					$mail->SMTPAuth=true;
					$mail->SMTPSecure='tls';
					$mail->Username='johndelbarcelona@gmail.com';
					$mail->Password='ydlqkldfilzyjzvw';
					$mail->setFrom('johndelbarcelona@gmail.com', 'OTP Verification');
					$mail->addAddress($eml);
					$mail->isHTML(true);
					$mail->Subject="Your verify code";
					$mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
					<br><br>
					<p>With regrads,</p>
					<b>Oplan Visa Issuance System</b>";
	
					if(!$mail->send()){

						echo 'OTP_error';
					}
					else{
						echo 'added';
					}
				}
				else{
					echo($query);
				}
			}
			else{
				echo('exist');
			}
		}
		else{
			echo('pwdnotmatch');
		}
	}
	public function verify($otp){
		$code = $_SESSION['otp'];
		$email = $_SESSION['email'];
		if($otp != $code){
			echo 'otpnotmatch';
		}
		else{
			$query = self::query_run("UPDATE tbl_users SET user_status = 'VERIFIED' WHERE userEml = '$email'");
			echo 'match';
		}
		

	}
	// function clean($string) {
	// 	$string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
	 
	// 	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	//  }
	public function user_login($email, $password){
		$have = self::query_run("SELECT COUNT(userid) cnt, userPwd FROM tbl_users WHERE userEml  = '$email'");
		$h = mysqli_fetch_object($have);

		if ($h->cnt == 0){
			echo 'nomatchfound';
		}
		else
		{
			$checkPass = password_verify($password, $h->userPwd);
			if($checkPass)
			{
				echo ('success');
			}
			else{
				echo 'pwdnotmatch';
			}
		}
	}
}

	$info = new Info();
?>		