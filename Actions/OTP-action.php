<?php 
session_start();

?>


<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap-grid.min.css" >
    <link rel="stylesheet" href="../dist/css/adminlte.min.css"> <!-- these are templates -->
    <title>Verification</title>
</head>
<body>
<?php
        if(isset($_GET['error'])){
          if($_GET['error'] == "signupsuccessfully"){ ?>
          <div class="container">
            <div class="alert col-lg-12"> 
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>OTP sent successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                </div>
          </div>
          
              
          <?php  } 
        
         ?>
         <?php
          if($_GET['error'] == "wrongOTP"){ ?>
          <div class="container">
            <div class="alert col-lg-12"> 
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Warning!</strong> Wrong OTP, please try again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                </div>
          </div>
          
              
          <?php  } 
        }
        
         ?>
         
    
    <div class="container text-center">
        <h2> <a>Verification Account</a></h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>


<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Please enter the OTP we have sent to your email account.</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Verify" name="verify" class="btn btn-primary">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../bootstrap-5.0.2-dist/js/jquery.min.js"> </script>
<script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"> </script>
<script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"> </script>    
</html>
<?php 
    include 'dbconnection.php';
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];
        
        if($otp != $otp_code){ ?>
            <script>
                 
                   window.location.replace("OTP-action.php?error=wrongOTP");
             </script>
            
          
           <?php
        }else{

            $sql = mysqli_query($conn, "UPDATE tbl_users SET user_status = 'verified' WHERE userEml = '$email'");
            if($sql){
                ?>
                <script>
                      window.location.replace("../user-login.php?error=none");
                </script>
                <?php
            }
           
        }

    }

?>