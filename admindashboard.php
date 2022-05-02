<?Php
session_start();
$name= $_SESSION['name'];
include "config.php";
include "admin_login.php";


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
	  margin-top:60px;
  }
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
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
    <center><h2>Admin Dashboard</h2>
    <hr style="width:300px" class="w3-opacity"></center>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Appointments</h6>
                    <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
                      <?php
                      include "config.php";
                          $sql = "SELECT count(*) AS data1 FROM appointment";
                          $query = mysqli_query($conn,$sql);
                          $result = mysqli_fetch_array($query);
                          echo $result['data1'];
                          ?>
  </span></h2>
                    <p class="m-b-0">Approved Appointments<span class="f-right"><?php
                      include "config.php";
                          $sql = "SELECT count(*) AS data1 FROM appointment where status='approved'";
                          $query = mysqli_query($conn,$sql);
                          $result = mysqli_fetch_array($query);
                          echo $result['data1'];
                          ?></span></p>
                          <p class="m-b-0">Pending Appointments<span class="f-right"><?php
                      include "config.php";
                          $sql = "SELECT count(*) AS data1 FROM appointment where status='pending'";
                          $query = mysqli_query($conn,$sql);
                          $result = mysqli_fetch_array($query);
                          echo $result['data1'];
                          ?></span></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Patients</h6>
                    <h2 class="text-right"><i class="fa fa-fw fa-users f-left"></i><span><?php
                      include "config.php";
                          $sql = "SELECT count(*) AS data1 FROM patients";
                          $query = mysqli_query($conn,$sql);
                          $result = mysqli_fetch_array($query);
                          echo $result['data1'];
                          ?></span></h2>
                    <p class="m-b-0">Updated Profiles<span class="f-right"><?php
                      include "config.php";
                          $sql = "SELECT count(*) AS data1 FROM patients where dateofbirth IS NOT NULL";
                          $query = mysqli_query($conn,$sql);
                          $result = mysqli_fetch_array($query);
                          echo $result['data1'];
                          ?></span></p>
                    <p class="m-b-0">Unupdated Profiles<span class="f-right"><?php
                      include "config.php";
                          $sql = "SELECT count(*) AS data1 FROM patients where dateofbirth IS NULL";
                          $query = mysqli_query($conn,$sql);
                          $result = mysqli_fetch_array($query);
                          echo $result['data1'];
                          ?></span></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Doctors</h6>
                    <h2 class="text-right"><i class="fa fa-user-md f-left"></i><span><?php
                      include "config.php";
                          $sql = "SELECT count(*) AS data1 FROM doctors";
                          $query = mysqli_query($conn,$sql);
                          $result = mysqli_fetch_array($query);
                          echo $result['data1'];
                          ?></span></h2>
                    <p class="m-b-0">Updated Profiles<span class="f-right"><?php
                      include "config.php";
                          $sql = "SELECT count(*) AS data1 FROM doctors where dateofbirth IS NOT NULL";
                          $query = mysqli_query($conn,$sql);
                          $result = mysqli_fetch_array($query);
                          echo $result['data1'];
                          ?></span></p>
                    <p class="m-b-0">Unupdated Profiles<span class="f-right"><?php
                      include "config.php";
                          $sql = "SELECT count(*) AS data2 FROM doctors where dateofbirth IS NULL";
                          $query = mysqli_query($conn,$sql);
                          $result = mysqli_fetch_array($query);
                          echo $result['data2'];
                          ?></span></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Payments Received</h6>
                    <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span><?php
                    include "config.php";
                        $sql = "SELECT SUM(paid_amount) AS data2 FROM payment";
                        $query = mysqli_query($conn,$sql);
                        $result = mysqli_fetch_array($query);
                        echo $result['data2'];
                        ?> USD</span></h2></br>
                    <p class="m-b-0">Number of Payments made<span class="f-right">
                    <?php
                      include "config.php";
                          $sql = "SELECT count(*) AS data2 FROM payment";
                          $query = mysqli_query($conn,$sql);
                          $result = mysqli_fetch_array($query);
                          echo $result['data2'];
                          ?>
                    </span></p>
                </div>
            </div>
        </div>
	</div>
</div>
                </section>