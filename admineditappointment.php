<?php
  session_start();
  include "config.php"
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link href='https://fonts.googleapis.com/css?family=Kaushan Script' rel='stylesheet'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<style>
    .dropdown .dropdown-menu .dropdown-item:active, .dropdown .dropdown-menu .dropdown-item {color: blue;font-size: 15px;}
    .dropdown .dropdown-menu .dropdown-item:active, .dropdown .dropdown-menu .dropdown-item:hover{background-color: lightblue ;color: white;}
    body{
      margin-top:0px;
      background:#eee;
  }
  .well-block {
    background-color: #fff;
    border: 1px solid #e9e6e8;
    padding: 40px;
    margin-top: 60px;
}

  </style>
</head>

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
    </ul> 
      <ul class="navbar-nav ml-auto">
     
        <li class="nav-item dropdown ">
        <?php  
      
                  $name = $_SESSION['name'];
                  $sql = "SELECT * FROM admin WHERE name = '$name '";

                  $gotResults = mysqli_query($conn,$sql);
                  if($gotResults){
                    if(mysqli_num_rows($gotResults) > 0){
                      while($row = mysqli_fetch_array($gotResults)){
                        //print_r($row);
                        ?>
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "font-size: 20px;color: blue">
            <?php echo$row['name'] ?>
            </a>
            <div class="dropdown-menu border-0" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="viewpatient.php" style = "font-size: 15px">View Profile</a>
            <a class="dropdown-item" href="doctor_signup.html" style = "font-size: 15px">Log out</a>
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
  <?php
	require_once("config.php");
	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE appointment SET patientname=? ,patientemail=? , doctorname=? ,doctoremail=? , startdate=?, enddate=?, description=?, status=?  WHERE appointment_id=?");
		$patientname 		= $_POST['patientname'];
        $patientemail       = $_POST['patientemail'];
        $doctorname 		= $_POST['doctorname'];
        $doctoremail	= $_POST['doctoremail'];
        $startdate          = $_POST['startdate'];
        $enddate            = $_POST['enddate'];
        $description		= $_POST['description'];
        $status    =  $_POST['status'];    
		$sql->bind_param("ssssssssi",$patientname, $patientemail, $doctorname,  $doctoremail, $startdate, $enddate, $description, $status ,$_GET["appointment_id"]);	
		if($sql->execute()) {
			$success_message = "Edited Successfully";
		} else {
			$error_message = "Problem in Editing Record";
		}
        header("location:allappointments.php"); 
	}
	$sql = $conn->prepare("SELECT * FROM appointment WHERE appointment_id=?");
	$sql->bind_param("i",$_GET["appointment_id"]);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {		
		$row = $result->fetch_assoc();
	}
	$conn->close();
?>
<center>
  <div class='well-block'>
  <div class="col-md-8">
<form  class="needs-validation" novalidate  method="POST" action="">
                            <!-- Form start -->
                                
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    
                                        <label class="control-label" for="name">Patient's name</label>
                                        <input  name="patientname" type="text"  class="form-control input-md" value="<?php echo$row['patientname'] ?>"> 
                                        <div class="invalid-feedback">
                                        incorrect patient's name
                                      </div>
                                      </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="email">Patient Email</label>
                                        <input name="patientemail"  type="text" class="form-control input-md" value="<?php echo $row['patientemail']; ?>">
                                        <div class="invalid-feedback">
                                        incorrect email
                                      </div>
                                      </div>
            
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="email">Doctor's Name</label>
                                        <input name="doctorname"  type="text"  class="form-control input-md" value="<?php echo $row['doctorname']; ?>">
                                        <div class="invalid-feedback">
                                        incorrect doctor's name
                                      </div>
                              </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="email">Dr.s Email</label>
                                        <input name="doctoremail"  type="text" class="form-control input-md" value="<?php echo $row['doctoremail']; ?>">
                                        <div class="invalid-feedback">
                                        incorrect Email
                                      </div>
                                      </div>
                                  </div>
                                <!-- Text input-->
                                <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label" for="startDate">Start Date</label>
                                <input type="datetime-local" class="form-control datetimepicker" id="startDate" name="startdate" value="<?php echo date('Y-m-d\TH:i', strtotime($row['startdate'])); ?>" required>
                                <div class="invalid-feedback">
                                        incorrect date
                                      </div>
                                <!-- errors will go here -->
                            </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="col-md-6">
                                <div id="enddate-group" class="form-group">
                                <label class="control-label" for="endDate">End Date</label>
                                <input type="datetime-local" class="form-control datetimepicker" id="endDate" name="enddate" value="<?php echo date('Y-m-d\TH:i', strtotime($row['enddate'])); ?>" required>
                                <div class="invalid-feedback">
                                        incorrect date
                                      </div>
                                <!-- errors will go here -->
                            </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name ="description" ><?php echo $row['description']; ?></textarea>
                                </div>
                                </div>
                                <div class="col-md-12">
                                <label for="exampleFormControlTextarea1">Status</label>
                                <select class="form-select" aria-label="Default select example" name = "status" value="<?php echo $row['status']; ?>">
                                    <option selected><?php echo $row['status']; ?></option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    </select>
                                </div> </br></br></br></br>
                                <!-- Button -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <a href="allappointments.php" class="btn btn-warning float-left">Back</a>
                                        <button type="submit" class="btn btn-primary float-right" name= "submit">UPDATE</button>
                                    </div>
                                </div>
                            </div>
                           
                            </form>
                        </div>
                                        </div>

                                        
</center>
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