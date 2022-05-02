<?php
session_start();
include"config.php";

?>
<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Kaushan Script' rel='stylesheet'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<style>
body{background-color: #f5f5f5;
  margin-top:0px;}
.avatar{
width:200px;
height:200px;
}	
      .active {
        background-color: white;
      }
      .dropbtn {
        background-color: white;
        color: blue;
        padding: 14px 20px;
        border: none;
        font-size: 20px;
        margin: 8px 0;
        cursor: pointer;
        width: 150px;
        
      }
      
      .dropdown {
        position: relative;
        display: inline-block;
        float: right;
      }
      
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }
      
      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }
      
      .dropdown-content a:hover {background-color: #ddd;}
      
      .dropdown:hover .dropdown-content {display: block;}
      
      .dropdown:hover .dropbtn {background-color: #3e8e41;}
      /* Set a style for all buttons */
      button {
        background-color: white;
        color: blue;
        padding: 14px 20px;
        margin: 8px 0;
        cursor: pointer;
        width: 150px;
        border:none;
      }
      .cancelbtn {
        background-color: violet;
        color: white;
        float:left;
        width: 10%;
        margin-left:0px;
     }
     .submitbtn{
      background-color: blue;
      color: white;
      float:right;
      margin-right:0px;
      
     }
     section{
       margin-top:80px;
     }
</style>
</head>
<title>EDoktari</title>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
    <a class="navbar-brand" href="amindashboard.php" style = "font-family: 'kaushan Script';font-size: 30px;color:blue;"><img src="EDoktari_logo.png" width="50" height="50" class="d-inline-block align-top" alt="">EDoktari</a>

    <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav mx-auto">
    <li class="nav-item">
        <a class="nav-link text-primary" href="doctordashboard.php">DASHBOARD</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="doctorappointments.php">APPOINTMENTS</a>
      </li>
    </ul> 
      <ul class="navbar-nav ml-auto">
     
        <li class="nav-item dropdown ">
        <?php  
      
                  $email = $_SESSION['email'];
                  $sql = "SELECT * FROM doctors WHERE email = '$email'";

                  $gotResults = mysqli_query($conn,$sql);
                  if($gotResults){
                    if(mysqli_num_rows($gotResults) > 0){
                      while($row = mysqli_fetch_array($gotResults)){
                        //print_r($row);
                        ?>
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "font-size: 20px;color: blue">
            <?php echo$row['firstname'] ?> <?php echo$row['lastname'] ?>
            </a>
            <div class="dropdown-menu border-0" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="doctor_profile.php" style = "font-size: 15px">View Profile</a>
            <a class="dropdown-item" href="logout.php" style = "font-size: 15px">Log out</a>
            </div>
            <?php
           }
                    }
                  }
                ?>
        </li>
      </ul>
    </div>
  </nav>
  <section>

      <div class="container bootstrap snippets bootdey">
      <form  id="form" class="needs-validation" novalidate action="doctorprofile_update.php" method = "POST" enctype="multipart/form-data">
        <?php
                  
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM doctors WHERE email = '$email'";

        $gotResults = mysqli_query($conn,$sql);
        if($gotResults){
        if(mysqli_num_rows($gotResults) > 0){
        while($row = mysqli_fetch_array($gotResults)){
                        //print_r($row);
        ?>
          <div class="row">              
          <div class="col-md-3">
            <div class="text-center">
              <img src="doctorprofilepictures/?php echo$row['profileimage'] ?>" class="avatar img-circle img-thumbnail" alt="avatar" id="profileImage">
              <h6>Upload a profile picture</h6>
              
              <input type="file" class="form-control" id="imageUpload" value="doctorprofilepictures/?php echo$row['profileimage'] ?>" name = "doctorimage">
            </div>
          </div>
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
    
            <h1 style= "text-align:center;color:blue;">Edit Profile</h1>
            
                                  <div class="row">
                                    <div class="col">
                                      <label for="first name">First Name</label>
                                      <input  name = 'fname' type="text" class="form-control" placeholder="First name" value = "<?php echo$row['firstname'] ?>"required>
                                      <div class="invalid-feedback">
                                        incorrect first name
                                      </div>
                                    </div>
                                    <div class="col">
                                      <label for="last name">Last Name</label>
                                      <input name = 'lname' type="text" class="form-control" placeholder="Last name" value = "<?php echo$row['lastname'] ?>" required>
                                      <div class="invalid-feedback">
                                        incorrect last name
                                      </div>
                                    </div>
                                  </div>
                                  </br>
                                  <div class="row">
                                      <div class="col">
                                        <label for="email">Email</label>
                                        <input name = 'email'type="email" class="form-control" placeholder="Email" value = "<?php echo$row['email'] ?>"required>
                                        <div class="invalid-feedback">
                                          incorrect email address
                                        </div>
                                      </div>
                                      <div class="col">
                                        <label for="Phone Number">Phone Number</label>
                                        <input name = 'phonenumber' type="text" class="form-control" placeholder="Phone Number" value = "<?php echo$row['phonenumber'] ?>"required>
                                        <div class="invalid-feedback">
                                          incorrect phone number
                                        </div>
                                      </div>
                                      <div class="col">
                                          <label for="identification Number">Identification Number</label>
                                          <input name= 'uniquenumber' type="text" class="form-control" placeholder="identification Number" value = "<?php echo$row['uniquenumber'] ?>"required>
                                          <div class="invalid-feedback">
                                            incorrect identification number
                                          </div>
                                        </div>
                                  </div>
                                </br>
                                  <div class="row">
                                      <div class="col">
                                          <label for="birthdate">Date of Birth</label>
                                          <div class="input-group date" data-provide="datepicker">
                                              
                                              <input name = 'date' type="text" class="form-control" required value = "<?php echo$row['dateofbirth'] ?>">
                                              <div class="invalid-feedback">
                                                incorrect Date of Birth
                                              </div>
                                              <div class="input-group-addon">
                                                  <span class="glyphicon glyphicon-th"></span>
                                              </div>
                                          </div>
                                  
                                        </div>
                                  
                                      <div class="col">
                                          <label for="gender">Gender</label>
                                          <select name = 'gender' class="form-select" aria-label="Default select example" value = "<?php echo$row['gender'] ?>"required>
                                          <option selected><?php echo$row['gender'] ?></option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                          </select>
                                          <div class="invalid-feedback">
                                            incorrect gender
                                          </div>
                                        </div>
                                  </div>
                      </br>
                                  <div class = 'row'>
                                  <div class = 'col'>
                                      <label for="country">Country</label>
                                        <input name = 'country' type="text" class="form-control" placeholder="Country" value = "<?php echo$row['country'] ?>" required>
                                        <div class="invalid-feedback">
                                          incorrect Office Address
                                        </div>
                                    </div>
                                    <div class = 'col'>
                                      <label for="city">City or Town</label>
                                        <input name = 'city' type="text" class="form-control" placeholder="City or Town" value = "<?php echo$row['city'] ?>" required>
                                        <div class="invalid-feedback">
                                          incorrect Office Address
                                        </div>
                                    </div>
                                    <div class = 'col'>
                                      <label for="adress">Office Address</label>
                                        <input name = 'address' type="text" class="form-control" placeholder="office address" value = "<?php echo$row['officeaddress'] ?>"required>
                                        <div class="invalid-feedback">
                                          incorrect Office Address
                                        </div>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    
                                  </div>
                                </br>
                                  <div class="row">     
                                      <div class="col">
                                        <label for="type">type</label>
                                        <select name = 'type' class="form-select" aria-label="Default select example" value = "<?php echo$row['type'] ?>"required>
                                          <option selected><?php echo$row['type'] ?></option>
                                          <option value="gaenecologist">Gaenecologist</option>
                                          <option value="paedetrician">Paedetrician</option>
                                          <option value="other">Other</option>
                                        </select>
                                        <div class="invalid-feedback">
                                          incorrect type
                                        </div>
                                      </div>
                                      <div class="col">
                                        <label for="experience">Years of Experience</label>
                                        <input name = 'experience' type="number" id="typeNumber" class="form-control" value = "<?php echo$row['experience'] ?>" required/>
                                        <div class="invalid-feedback">
                                          incorrect Years of Experience
                                        </div>
                                      </div>
                                  </div>
                      </br>
                                  <div class="row">
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Bio:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"   name = 'bio'><?php echo$row['bio'] ?></textarea>
                                  </div> 
                                  </div>
                                  <button type="submit" class ="btn btn-primary float-right" name ="update">Save Changes</button>
                                  <a href="viewdoctor.php" class="btn btn-warning">Cancel</a></br></br></br></br>
                <?php
                      }
                    }
                  }
                ?>
              </form>
            
          </div>
      </div>
    </div>
  </br>
                </section>
    <hr>
    <script type="text/javascript">
      $(function() {
          $('#datepicker').datepicker();
      });
      $("#profileImage").click(function(e) {
        $("#imageUpload").click();
    });
    
    function fasterPreview( uploader ) {
        if ( uploader.files && uploader.files[0] ){
              $('#profileImage').attr('src', 
                 window.URL.createObjectURL(uploader.files[0]) );
        }
    }
    
    $("#imageUpload").change(function(){
        fasterPreview( this );
    });

  </script>
  <script>
    (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
  </script>
</body>
</html>