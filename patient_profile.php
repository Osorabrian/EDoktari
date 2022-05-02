
<?php
session_start();
include "config.php";

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
  margin-top:100px;}
.avatar{
width:200px;
height:200px;
}				              
    
.intl-tel-input {
  display: table-cell;
}
.intl-tel-input .selected-flag {
  z-index: 4;
}
.intl-tel-input .country-list {
  z-index: 5;
}
.input-group .intl-tel-input .form-control {
  border-top-left-radius: 4px;
  border-top-right-radius: 0;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 0;
}
</style>
</head>
<title>EDoktari</title>
<body>
 
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
    <a class="navbar-brand" href="homepage.php" style = "font-family: 'kaushan Script';font-size: 30px;color:blue;"><img src="EDoktari_logo.png" width="50" height="50" class="d-inline-block align-top" alt="">EDoktari</a>

    <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav mx-auto">
    <li class="nav-item">
        <a class="nav-link text-primary" href="diagnosis.php">ONLINE DIAGNOSIS</a>
      </li>
       <li class="nav-item">
        <a class="nav-link text-primary" href="blogpage.php">BLOG</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="doctor-page.php"> BOOK APPOINTMENT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="patientappointments.php">MY APPOINTMENTS</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-primary" href="patientpayments.php">PAYMENTS</a>
      </li>
    </ul> 
      <ul class="navbar-nav ml-auto">
     
        <li class="nav-item dropdown ">
        <?php  
      
                  $email = $_SESSION['email'];
                  $sql = "SELECT * FROM patients WHERE email = '$email'";

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
            <a class="dropdown-item" href="viewpatient.php" style = "font-size: 15px">View Profile</a>
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

  </nav>
  <?php  
                  $email = $_SESSION['email'];
                  $sql = "SELECT * FROM patients WHERE email = '$email'";

                  $gotResults = mysqli_query($conn,$sql);
                  if($gotResults){
                    if(mysqli_num_rows($gotResults) > 0){
                      while($row = mysqli_fetch_array($gotResults)){
                        //print_r($row);
                        ?>
      <div class="container bootstrap snippets bootdey">  
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
            <form class="needs-validation" novalidate action="Profile_update.php" method="POST" enctype="multipart/form-data">
              <img src="patientprofilepictures/<?php echo$row['profileimage'] ?>" class="avatar img-circle img-thumbnail" alt="avatar" id="profileImage">
              <h6>Upload a profile picture</h6>
              <input type="file" name='patientimage' class="form-control" id="imageUpload">
            </div>
          </div>
          
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
    
            <h1 style= "text-align:center;color:blue">Edit Profile</h1>
            
           
                                  <div class="row">
                                  <div class="col">
                                    <label for="first name">First Name</label>
                                    <input type="text" class="form-control" placeholder="First name"  name = "fname" value = "<?php echo$row['firstname'] ?>"required>
                                    <div class="invalid-feedback">
                                      incorrect first name
                                    </div>
                                  </div>
                                  <div class="col">
                                    <label for="last name">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last name" name = "lname" value = "<?php echo$row['lastname'] ?>" required>
                                    <div class="invalid-feedback">
                                      incorrect last name
                                    </div>
                                  </div>
                                </div>
                                </br>
                                <div class="row">
                                    <div class="col">
                                      <label for="email">Email</label>
                                      <input type="text" class="form-control" placeholder="Email" value = "<?php echo$row['email'] ?>" name = "email" required>
                                      <div class="invalid-feedback">
                                        incorrect email address
                                      </div>
                                    </div>
                                    <div class="col">
                                      <label for="phone number">Phone Number</label>
                                      <input id = 'pnumber' type="text" class="form-control" placeholder="Phone Number"  value = "<?php echo$row['phonenumber'] ?>" name = "phonenumber" required>
                                      <div class="invalid-feedback">
                                        incorrect phone number
                                      </div>
                                    </div>
                                </div>
                              </br>
                                <div class="row">
                                    <div class="col">
                                      <label for="birthdate">Date of Birth</label>
                                      <div class="input-group date" data-provide="datepicker" >
                                            
                                        <input type="text" value = "<?php echo$row['dateofbirth'] ?>" class="form-control"  name ="date" required>
                                        <div class="invalid-feedback">
                                          incorrect Date of Birth
                                        </div>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div> 
                                      </div>
                                    <div class="col">
                                      <label for="adress">Address</label>
                                      <input type="text" class="form-control" placeholder="Address" value = "<?php echo$row['address'] ?>" name = "address" required>
                                      <div class="invalid-feedback">
                                        incorrect Address
                                      </div>
                                    </div>
                                    
                                </div>
                              </br>
                                <div class="row">     
                                    <div class="col">
                                      <label for="Height">Height (cm)</label>
                                      <input type="number" id="typeNumber" class="form-control"  value = "<?php echo$row['height'] ?>" name = "height" required/>
                                      <div class="invalid-feedback">
                                        incorrect height
                                      </div>
                                    </div>
                                    <div class="col">
                                      <label for="Weight">Weight (Kgs.)</label>
                                      <input type="number" id="typeNumber" class="form-control" value = "<?php echo$row['weight'] ?>" name = "weight" required/>
                                      <div class="invalid-feedback">
                                        incorrect weight
                                      </div>
                                    </div>
                                    <div class="col">
                                      <label for="Gender">Gender</label>
                                      <select class="form-select" aria-label="Default select example" name = "gender" required>
                                        <option selected><?php echo$row['gender'] ?></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                      </select>
                                      <div class="invalid-feedback">
                                        incorrect gender
                                      </div>
                                    </div>
                                </div></br></br>
                                <a href="viewpatient.php" class="btn btn-warning float-left">Cancel</a>
                                  <button type="submit" class ="btn btn-primary float-right" name="update">Save Changes</button></br></br></br></br>
                                  
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