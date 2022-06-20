$(document).ready(function(){
	
})

$(document).on('submit','#Form_signup',function(e){
	e.preventDefault();

	if($('#Eml').val() == '' || $('#Pwd').val() == '' || $('#PwdRepeat').val() == '')
	{	
		emptyInput();
	}
	else
	{
		$.ajax({
			url:"../_/assets/php/index.php",
			method:"POST",
			data:{
				email:$('#Eml').val(),
				password:$('#Pwd').val(),
				Rpassword:$('#PwdRepeat').val(),
				formula:'adduser',
			},
			success:function(result){

				switch(result){
					
					case '	exist':
						emailexist();
						break;
					case '	pwdnotmatch':
						passwordnotmatch();
						break;
					case '	invalideml':
						invalidEml();
					break;
					case '	OTP_error':
						OTP_error();
					break;
					case '	added':
						$('#verify_modal').modal('show');
					break;
					default:
						alert(result);	
						break;	
				}
				
			}
		})
	}
})


function verified(){
	Swal.fire(
	  'Good job!',
	  'verified sussesful! Please login',
	  'success'
	).then(function() {
		window.location = "user-login.php";
	});
}
	
function wrongOTP(){
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Wrong OTP!'
	  })
}
function emptyInput(){
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Fill all the fields!'
	  })
}
function invalidEml(){
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Invalid email please try again!'
		
	  })
}
function passwordnotmatch(){
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Password does not match!'
		
	  })
}
function emailexist(){
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Email is already use by another user!'
		
	  })
}
function OTP_error(){
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Theres some problem sending the OTP!'
	  })
}

$(document).on('click','#btn_verify',function(e){
	e.preventDefault();
	$.ajax({
		url:"../_/assets/php/index.php",
		method:"POST",
		data:{
			otp:$('#OTP_code').val(),
			formula:'verify',
		},
		success:function(result){

			switch(result){
				
				case '	otpnotmatch':
					wrongOTP();
					break;
				case '	match':
					verified();
				break;
				
				default:
					alert(result);	
					break;	
			}
			
		}
	})
	// window.location = 'user-login.php';
	// var otpcode = document.getElementById("OTP_code").value;
	
	// alert(otpcode);
	
	// $.ajax({
	// 	url:"assets/php/index.php",
	// 	method:"POST",
	// 	data:{
	// 		inputotp:$('#OTP_code').val(),
	// 		formula:'verify'
	// 	}
	// })
	// alert($('#btn_verify').val(e.target.dataset.inputotp));	
})
