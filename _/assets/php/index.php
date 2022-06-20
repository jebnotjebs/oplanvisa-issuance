<?php 

include ('config/database.php');
include ('config/index.php');
$formula ='';

if (isset($_POST['formula'])) {
	$formula = $_POST['formula'];
}
switch ($formula) {

	case 'adduser':
		$info->adduser($_POST['email'], $_POST['password'], $_POST['Rpassword']);
		break;
	case 'verify':
		$info->verify($_POST['otp']);
		break;

	case 'login':
		$result = $info->user_login($_POST['email'],$_POST['password']);
		$arr = array();
		
		break;

	// case 'login':
	// 	$result = $info->user_login($_POST['email'], $_POST['password']);

	// 	if($result == true){
	// 		foreach($result as $row){
	// 			echo $row['userid'];
	// 		}
	// 	}
	// 	else{
	// 		echo 'wala';
	// 	}
	// 	break;
	
	default:
		break;
}

?>