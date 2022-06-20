<?php
// include "connection.php";
// session_start();
include "include/header.php";
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="../assets/css/index1.css" rel="stylesheet">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css"> <!-- this is for the icons-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="Css/announcement.css" rel="stylesheet">
    </head>
    <body>
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="../assets/img/alfonsolista.png" alt="alfonsolista logo"/>
                        <h3>Welcome</h3>
                        <p>You are 30 seadasdsadconds away from registering your visa!</p>
                        <a href="user-login.php" type="submit" name="" value="Login">Log in</a>
                </div>
                <div class="col-md-9 register-right"> 
                    <section class="signup-form">
                        <form action="Actions/signup.php" method="post">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3 class="register-heading">Register your account</h3>
                                    <div class="row register-form">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="eml" class="form-control" placeholder="Email" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-envelope"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <input type="password" name="pwdrepeat" class="form-control" placeholder="Confirm Password" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                                <input type="submit" name="submit" class="btnRegister"  value="Sign Up "/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div><!-- container register -->
                
        
        <div class="text-center">
            
        </div>
                    
                    
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="assets/ajax/login.js"></script>
        <script src="../assets/js/plugin/sweetalert/sweetalert2.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>
</html>