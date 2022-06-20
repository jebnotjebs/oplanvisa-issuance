$(document).ready(function(){

	
})
function EmailNotFound(){
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Invalid email, Please register!'
	  })
}
function PwdNotMatch(){
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Wrong password!'
	  })
}
	$(document).on('submit', '#Form_login',function(e){    
		e.preventDefault();

		$.ajax({
			url:"../_/assets/php/index.php",
			method:"POST",
			data:{
				email:$('#Eml').val(),
				password:$('#Pwd').val(),
				formula:"login",
			},
			
			success:function(result){
				switch(result){
					case '		nomatchfound':
						EmailNotFound();
						break;

					case '		pwdnotmatch':
						PwdNotMatch();
					break;

					case '		success':
						window.location = "../_/include/register-form.php";
						break;

					default:
						alert(result);
						break;
				}
				// if(result == 'nomatchfound')
				// {
				// 	alert('invalid accnt');
				// }
				// else if(result == 'success')
				// {
				// 	alert(result);
				// }

				// switch(result){
					
				// 	case 'notmatch':
				// 		EmailNotFound();
				// 		break;
				// 	case 'match':
				// 		alert('data match');
				// 	break;
					
				// 	default:
				// 		alert(result);	
				// 		break;	
			
				// }
			
			}
		})
})

