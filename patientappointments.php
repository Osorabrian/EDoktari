<?Php
session_start();
$email= $_SESSION['email'];
include("config.php");
	

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
  section{
	  margin-top:90px;
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
      <li class="nav-item active">
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
<section>
<center>
  <h1 >Approved Appointments</h1>
    </center>
<table class='table'>
        <thead class='table-primary'>
          <tr>
            <th scope='col'>appointment Number</th>
            <th scope='col'>Doctor Name</th>
            <th scope='col'>Day & Time</th>
            <th scope='col'>Description</th>
            <th scope='col'>Status</th>
            <th  scope='col'>Action</th>
          </tr>
        </thead>
        <tbody>
<?php
                $email = $_SESSION['email'];
                $sql = "SELECT * FROM appointment WHERE patientemail ='$email' and status = 'Approved'";
                $query = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($query))
    {
    ?>
        
          <tr>
            <td class="table-light"><?php  echo $row['appointment_id'];?></td>
            <td class="table-light"><?php  echo $row['doctorname'];?></td>
            <td class="table-light"><?php  echo $row['startdate'];?></td>
            <td class="table-light"><?php  echo $row['description'];?></td>
            <td class="table-light"><?php  echo $row['status'];?></td>
			<td>
            <a href="patientvirtual.php?appointment_id=<?php echo $row["appointment_id"]; ?>" class="btn btn-primary">Meet</a>
            <a href="patienteditappointment.php?appointment_id=<?php echo $row["appointment_id"]; ?>" class="btn btn-warning">edit</a>
            <a href="delete.php?appointment_id=<?php echo $row["appointment_id"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?');">delete</a>
			</td>
          </tr>
          <?php } ?>
</tbody>
</table>
<center>
  <h1 >Pending Appointments</h1>
    </center>
          <table class='table'>
        <thead class='table-primary'>
          <tr>
            <th scope='col'>appointment Number</th>
            <th scope='col'>Doctor Name</th>
            <th scope='col'>Day & Time</th>
            <th scope='col'>Description</th>
            <th scope='col'>Status</th>
            <th  scope='col'>Action</th>
          </tr>
        </thead>
        <tbody>
<?php
                $email = $_SESSION['email'];
                $sql = "SELECT * FROM appointment WHERE patientemail ='$email' and status = 'Pending'";
                $query = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($query))
    {
    ?>
        
          <tr>
            <td class="table-light"><?php  echo $row['appointment_id'];?></td>
            <td class="table-light"><?php  echo $row['doctorname'];?></td>
            <td class="table-light"><?php  echo $row['startdate'];?></td>
            <td class="table-light"><?php  echo $row['description'];?></td>
            <td class="table-light"><?php  echo $row['status'];?></td>
			<td>
            <a href="patienteditappointment.php?appointment_id=<?php echo $row["appointment_id"]; ?>" class="btn btn-warning">edit</a>
            <a href="delete.php?appointment_id=<?php echo $row["appointment_id"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?');">delete</a>
			</td>
          </tr>
          <?php } ?>
</tbody>
</table>