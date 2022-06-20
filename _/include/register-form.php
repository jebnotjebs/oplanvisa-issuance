<?php
include "header.php";

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/register-form.css"> <!-- these are main CSS -->
     <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css"> <!-- these are templates -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css"> <!-- these are icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:ital,wght@1,100;1,300&display=swap" rel="stylesheet"> <!-- these are fonts -->
   
</head>
<body>
    <div class="container">
        <form action="Actions/register.php" method="post" enctype="multipart/form-data"> 
             <div class="row register-form">
                 <br>
                 <br>
                 <h2 class="font">Name</h2>
                 <div class="col-md-4">
                    <div class="input-group mb-4">
                        <input type="text" name="FName" class="form-control" placeholder="First name (Pangalan)" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-4">
                        <input type="text" name="LName" class="form-control" placeholder="Last name (Apilyedo)" required>
                            <div class="input-group-append">
                             <div class="input-group-text">
                             <span class="fas fa-user"></span>
                            </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-4">
                        <input type="text" name="Control_Num" class="form-control" placeholder="Control Number (Kontrol namber)" required>
                            <div class="input-group-append">
                             <div class="input-group-text">
                             <span class="fas fa-list-ol"></span>
                            </div>
                            </div>
                    </div>
                </div>
                
               
                <h2 class="font">Address</h2>
                <div class="col-md-4">
                        <div class="input-group mb-4">
                            <input type="text" name="Province" class="form-control" placeholder="Province (ex. Ifugao)" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-map-marked-alt"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <div class="col-md-4">
                        <div class="input-group mb-4">
                            <input type="text" name="City" class="form-control" placeholder="City (ex. Alfonsolista)" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <div class="col-md-4">
                        <div class="input-group mb-4">
                            <input type="text" name="Baranggay" class="form-control" placeholder="Barangay (ex. Namillangan)" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <h2 class="font">Contact</h2>
                    <div class="col-md-4">
                        <div class="input-group mb-4">
                            <input type="text" name="Mobile_Num" class="form-control" placeholder="Mobile number" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="far fa-address-book"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <h2 class ="font">Description of motorcycle</h2>
                  <div class="col-md-6">
                        <div class="input-group mb-6">
                            <input type="text" name="Make" class="form-control" placeholder="Make" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-motorcycle"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <div class="col-md-4">
                        <div class="input-group mb-4">
                            <input type="text" name="Model" class="form-control" placeholder="Model" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-motorcycle"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <div class="col-md-2">
                        <div class="input-group mb-2">
                            <input type="text" name="Color" class="form-control" placeholder="Color" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-paint-roller"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="input-group mb-4">
                            <input type="text" name="Chasis_Num" class="form-control" placeholder="Chasis number" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-motorcycle"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="input-group mb-4">
                            <input type="text" name="Engine_Num" class="form-control" placeholder="Engine number" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-motorcycle"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="input-group mb-4">
                            <input type="text" name="Engine_Dspcmt" class="form-control" placeholder="Engine Displacement" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-motorcycle"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="input-group mb-4">
                            <input type="text" name="OR_Num" class="form-control" placeholder="OR number" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="far fa-address-card"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <div class="col-md-4">
                        <div class="input-group mb-4">
                            <input type="text" name="CR_Num" class="form-control" placeholder="CR number" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="far fa-address-card"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                  <div class="col-md-4">
                        <div class="input-group mb-4">
                            <input type="text" name="Plate_Num" class="form-control" placeholder="Plate number" required>
                                <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-caravan"></span>
                                </div>
                                </div>
                        </div>
                  </div>
                   <div class="col-md-4">
                        <select name="Ownership"class="form-select" aria-label="Default select example" required>
                            
                            <option value="private">Private</option>
                            <option value="goverment">Goverment</option>
                            <option value="business">Business</option>
                        </select>
                        </div>
                  </div>
                  <h2 class ="font">Proof of OR and CR, Drivers Licence, and close-up picture. </h2>

                  <div class="col-md-6">
                      <div class="input-group mb-6">
                      <input type="file" name="file[]" class="form-control" multiple directory=""  mozdirectory="" required>
                      </div>
                  </div> 
               
                  <br>
                  <br>
                  <div class="d-grid gap-2 col-3 mx-auto">
                    
                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Terms and Conditions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                 <p style="text-align: justify"> &emsp;&emsp;These terms and conditions will be used in the system for applying for an “Oplan Visa”. <br><br>
                 &emsp;&emsp;In this Agreement, “you” and “your'' refers to you as the “Applicant of Oplan Visa” while the “PNP”, will use''our”, “we” or “as” as the “Philippine National Police”. <br><br>

                 &emsp;&emsp;Accessing our website(insert url of website), submitting your personal data, you agree that your data will be collected, processed, managed, and disclosed in accordance with this Privacy Policy. <br><br>

                 &emsp;&emsp; In compliance with the Data Privacy Act of 2012, we will treat your personal information responsibly (RA No. 10173). We are dedicated to securing your personal information and guaranteeing its confidentiality, accuracy, and security. <br><br>

                 &emsp; The PNP may send you emails or other notifications concerning your issuing an Oplan Visa. Your information may also be used for statistics of motorcycles who have Oplan Visa and other purposes.<br><br>

                 &emsp;&emsp;Creating an account in this service in order to utilize that being described in this Agreement. You are solely responsible for securing, updating, managing and keeping your logging-in and password  to ensure that this is completely secured.<br><br>

            &emsp;&emsp;The information that you submit in the Account Information/Profile, must be correct, complete and accurate to ensure that there is no inconvenience in processing your Oplan Visa. 

            Valid Identification Card/s for Issuing Oplan VIsa: Make sure that the ID’s are valid, original, clear photo and signature. </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                       
                        <label for="">
                        <input type="checkbox" name="submit" required>
                       I agree with the terms and conditions
                        </label> 
                        <button class="btn btn-primary" type="submit" name="submit" data-bs-dismiss="modal">Submit</button>
                    </div>
                    </div>
                </div>
                </div>

                <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Submit</a>
               
                                                
                </div>
            </div>
        </form>
        
    </div>
</body>
<footer>
    <p style="bg">Develop by Jebs</p>
</footer>

</html>