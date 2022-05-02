<?Php
session_start();
$name= $_SESSION['name'];
include "admin_login.php";
include "config.php";
$var="select max(Did) as max from disease";
$res=$conn->query($var);
$row = mysqli_fetch_assoc($res);
$Did = $row['max'] + 1;	
?>
<html>
<body>
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
	  margin-top:40px;
  }
</style>
</head>
<title>EDoktari</title>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
    <a class="navbar-brand" href="admindashboard.php" style = "font-family: 'kaushan Script';font-size: 30px;color:blue;"><img src="EDoktari_logo.png" width="50" height="50" class="d-inline-block align-top" alt="">EDoktari</a>

    <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav mx-auto">
    <li class="nav-item">
        <a class="nav-link text-primary" href="admindashboard.php">DASHBOARD</a>
      </li>
       <li class="nav-item">
        <a class="nav-link text-primary" href="index.php">BLOG</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="allappointments.php">APPOINTMENTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="allpatients.php">PATIENTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="alldoctors.php">DOCTORS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="allpayments.php">PAYMENTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="admindiseases.php">DISEASES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="viewdiseases.php">VIEW DISEASES</a>
      </li>
    </ul> 
      <ul class="navbar-nav ml-auto">
     
        <li class="nav-item dropdown ">
        <?php  
      
                  $name = $_SESSION['name'];
                  $sql = "SELECT * FROM admin WHERE name = '$name'";

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
<form method="POST">
    <a href="viewdiseases.php" class="btn btn-primary float-right mr-5" name='sub' >View Diseases<span class="text-light">&rarr;</span></a>
	  <center><h2 class="w3-text-teal">Add Disease</h2></center>
      
       <table align='center' class="bg-light" style="width:50%;padding:50px" border='1'>
	   <tr>
	   <td style="padding:50px">
      <div class="w3-container" style="width:90%">
        <div class="w3-section">
          <label align='left'><b>Disease ID</b></label>
          <input class="form-control" type="text" value="<?php echo $Did?>" name="Did" readonly>
          <label align='left'><b>Name of Disease</b></label>
          <input class="form-control" type="text" placeholder="Enter Disease Name" name="dname" required><br>
		   <label align='left'><b>Symptoms</b></label>
          <textarea class="form-control" type="text" placeholder="Enter symptoms" name="symp" required></textarea><label style='color:red'>*(Enter Symptoms seperated by ,)</label><br><br>
		 
		   <label align='left'><b>Type of Disease</b></label>
          <select type='text' name='dcat' class="form-control" required>
		  <option value=''>--Select Type--</option>
		  <option>cardiologist</option>
		  <option>gaenecologist</option>
		  <option>paedetrician</option>
		  <option>orthopedic</option>
		  <option>Infectious disease doctor</option>
		  <option>Neurologist</option>
          <option>Internist</option>
		  </select>
		  <br>
          <input class="btn btn-primary" type="submit" name='sub' value="ADD">
          
        </div>
    </div>
    </td>
	</tr>
	</table>
                </br></br>
    
</section>
	<?php
	if(isset($_POST['sub']))
	{
		
		$dname=$_POST['dname'];
		$symp=$_POST['symp'];
		
		$dcat=$_POST['dcat'];
		
		$sel="insert into disease values('$Did','$dname','$symp','$dcat','0')";
		if(mysqli_query($conn,$sel))
	  {
		echo "<script>alert('Disease added successfully');</script>";
		echo "<script>location.replace('admindiseases.php');</script>";

        }
	}
?>

	
