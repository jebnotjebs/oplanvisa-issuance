<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Online Oplan Visa Issuance</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="faq.php">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="terms-condition.php">Terms and Conditions</a>
                    </li>
                    <?php
                    if(isset($_SESSION['isCustValid'])){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="register-form.php">Register my visa</a>
                        </li>
                        <li class="nav-item">
                            <a href="status.php" class="nav-link">Check my status</a>
                        </li>

                        <li class="nav-item">
                            <a href="###" class="nav-link"  data-bs-toggle="modal" data-bs-target="#logout">Logout</a>
                        </li>
                    <?php }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
        <!-- Modal for logout -->
        <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> <strong> Notice: </strong>You are about to logout. You want to proceed?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <a href="Actions/logout.php" type="submit" class="btn btn-success">Yes</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for cheking status-->
        <div class="modal fade" id="status" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <form action="">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Current status: <?php echo $row["user_status"]?></h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> <!-- modal header -->
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Complete name</label>
                                        <input type="text" class="form-control" id="" placeholder="<?php echo $row["FName"]. " ". $row["LName"]?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Full address</label>
                                        <input type="text" class="form-control" id="" placeholder="<?php echo $row["Province"]. " ". $row["City"]. " ". $row["Baranggay"]?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Control number</label>
                                        <input type="text" class="form-control" id="" placeholder="<?php echo $row["Mobile_Num"]?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Contact</label>
                                        <input type="text" class="form-control" id="" placeholder="<?php echo $row["Mobile_Num"]?>">
                                        </div>
                                        </div>
                                        <div class="col-12">
                                        <h4>Motorcycle Description</h4>
                                        </div>
                                        <div class="col-4">
                                            
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Make</label>
                                            <input type="text" class="form-control" id="" placeholder="<?php echo $row["Make"]?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Model</label>
                                            <input type="text" class="form-control" id="" placeholder="<?php echo $row["Model"]?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Color</label>
                                            <input type="text" class="form-control" id="" placeholder="<?php echo $row["Color"]?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Engine number</label>
                                            <input type="text" class="form-control" id="" placeholder="<?php echo $row["Engine_Num"]?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Engine displacement</label>
                                            <input type="text" class="form-control" id="" placeholder="<?php echo $row["Engine_Dspcmt"]?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Chasis number</label>
                                            <input type="text" class="form-control" id="" placeholder="<?php echo $row["Chasis_Num"]?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">OR number</label>
                                            <input type="text" class="form-control" id="" placeholder="<?php echo $row["OR_Num"]?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">CR number</label>
                                            <input type="text" class="form-control" id="" placeholder="<?php echo $row["CR_Num"]?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Plate number</label>
                                            <input type="text" class="form-control" id="" placeholder="<?php echo $row["Plate_Num"]?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Utility type</label>
                                            <input type="text" class="form-control" id="" placeholder="<?php echo $row["Ownership"]?>">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- card body -->
                        </div> <!-- card primary-->
                            <div class="modal-footer text-center">
                                <div class="col text-center btn-lg">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                </div>
                            </div>
                    </div> <!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div> <!-- /.modal fade -->
    </body>
</html>
