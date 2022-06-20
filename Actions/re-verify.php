<?php 
session_start();

?>

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
                    <div class="card-header">Please enter your email address to verify.</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Email address</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="eml" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
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
if(isset($_POST['submit'])){
    $email = $_POST["eml"];
    include_once 'functions.php';
    
    verify($email);
}


?>