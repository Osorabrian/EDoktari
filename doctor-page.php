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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
    .dropdown .dropdown-menu .dropdown-item:active, .dropdown .dropdown-menu .dropdown-item {color: blue;font-size: 15px;}
    .dropdown .dropdown-menu .dropdown-item:active, .dropdown .dropdown-menu .dropdown-item:hover{background-color: lightblue ;color: white;}
    body{
        margin-top:0px;
        background:#eee;
    }
    .section {
    margin-top:40px;
    } 
    .team-card-style-1, .team-card-style-3, .team-card-style-5 {
      position: relative;
      max-width: 360px;
      text-align: center;
      background:#fff;
     box-shadow: 0 22px 36px -12px rgba(64, 64, 64, .13);
    }
    .team-contact-link {
      display: block;
      margin-top: 4px;
      transition: all 0.25s;
      font-size: 12px;
      font-weight: 700;
      text-decoration: none;
    }
    .team-contact-link > i {
      display: inline-block;
      font-size: 1.1em;
      vertical-align: middle;
    }
    .team-card-style-1 .team-position, .team-card-style-3 .team-position, .team-card-style-4 .team-position {
      display: block;
      margin-bottom: 8px;
      color: #8c8c8c;
      font-size: 12px;
      font-weight: 700;
      opacity: 0.6;
    }
    .team-card-style-3 .team-name, .team-card-style-4 .team-name, .team-card-style-5 .team-name {
      margin-bottom: 16px;
      font-size: 18px;
      font-weight: 600;
    }
    .team-thumb > img {
      display: block;
      width: 100%;
    }
    .team-card-style-1 {
      padding-bottom: 36px;
    }
    .team-card-style-1 > * {
      position: relative;
      z-index: 5;
    }
    .team-card-style-1::before {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 0;
      transition: all 0.3s 0.12s;
      content: '';
      opacity: 0;
    }
    .team-card-style-1 .team-card-inner {
      margin-bottom: 16px;
      padding-top: 48px;
      padding-right: 16px;
      padding-bottom: 20px;
      padding-left: 16px;
      background-color: #fff;
      box-shadow: 0 22px 36px -12px rgba(64, 64, 64, .13);
    }
    .team-card-style-1 .team-thumb {
      width: 108px;
      height: 108px;
      margin: auto;
      margin-bottom: 16px;
      border-radius: 50%;
      overflow: hidden;
    }
    .team-card-style-1 .team-social-bar {
      margin-top: 16px;
      margin-bottom: 8px;
      transform: scale(0.8);
    }
    .team-card-style-1 .team-contact-link {
      transition-delay: 0.12s;
      color: #8c8c8c;
      opacity: 0.6;
    }
    .team-card-style-1 .team-contact-link:hover {
      color: #8c8c8c;
      opacity: 1;
    }
    .team-card-style-1 .team-card-inner, .team-card-style-1 .team-thumb, .team-card-style-1 .team-social-bar {
      transition: all 0.3s 0.12s;
    }
    .team-card-style-1 .team-position, .team-card-style-1 .team-name {
      transition: color 0.3s 0.12s;
    }
    .team-card-style-1 .team-name {
      margin-bottom: 0;
      font-size: 20px;
      font-weight: bold;
    }
    .no-touchevents .team-card-style-1:hover::before {
      height: 100%;
      box-shadow: 0 22px 36px -12px rgba(64, 64, 64, .13);
      opacity: 1;
    }
    .no-touchevents .team-card-style-1:hover .team-card-inner {
      background-color: transparent;
      box-shadow: none;
    }
    .no-touchevents .team-card-style-1:hover .team-thumb {
      transform: scale(1.1);
    }
    .no-touchevents .team-card-style-1:hover .team-social-bar {
      transform: scale(1);
    }
    .no-touchevents .team-card-style-1:hover .team-contact-link, .no-touchevents .team-card-style-1:hover .team-position, .no-touchevents .team-card-style-1:hover .team-name {
      color: #fff;
    }
    .no-touchevents .team-card-style-1:hover .team-contact-link {
      opacity: 1;
    }
    .team-card-style-2 {
      position: relative;
    }
    .team-card-style-2 > img {
      display: block;
      width: 100%;
    }
    .team-card-style-2::before, .team-card-style-2::after {
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      transition: opacity 0.35s 0.12s;
      content: '';
      z-index: 1;
    }
    .team-card-style-2::before {
      background-color: rgba(0, 0, 0, .25);
    }
    .team-card-style-2::after {
      opacity: 0;
    }
    .team-card-style-2 .team-card-inner {
      position: absolute;
      top: 50%;
      width: 100%;
      padding: 20px;
      transform: translateY(-45%);
      transition: all 0.35s 0.12s;
      text-align: center;
      opacity: 0;
      z-index: 5;
    }
    .team-card-style-2 .team-name, .team-card-style-2 .team-position, .team-card-style-2 .team-contact-link {
      color: #fff;
    }
    .team-card-style-2 .team-name {
      margin-bottom: 5px;
      font-size: 20px;
      font-weight: bold;
    }
    .team-card-style-2 .team-position {
      display: block;
      margin-bottom: 16px;
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
    }
    .team-card-style-2 .team-social-bar {
      margin-top: 16px;
      margin-bottom: 8px;
    }
    .team-card-style-2 .team-contact-link {
      opacity: 1;
    }
    .team-card-style-2:hover::before {
      opacity: 0;
    }
    .team-card-style-2:hover::after {
      opacity: 0.7;
    }
    .team-card-style-2:hover .team-card-inner {
      transform: translateY(-50%);
      opacity: 1;
    }
    .team-card-style-3, .team-card-style-4 {
      position: relative;
      padding-top: 30px;
      padding-right: 20px;
      padding-bottom: 38px;
      padding-left: 20px;
      transition: all 0.35s;
      border: 1px solid #e7e7e7;
    }
    .team-card-style-3 .team-thumb, .team-card-style-4 .team-thumb {
      width: 90px;
      margin: auto;
      margin-bottom: 17px;
    }
    .team-card-style-3 .team-position, .team-card-style-4 .team-position {
      margin-bottom: 0;
    }
    .team-card-style-3 .team-contact-link, .team-card-style-4 .team-contact-link {
      color: #404040;
      font-weight: 600;
    }
    .team-card-style-3 .team-contact-link > i, .team-card-style-4 .team-contact-link > i {
      color: #8c8c8c !important;
    }
    .team-card-style-3 .team-contact-link:hover, .team-card-style-4 .team-contact-link:hover {
      color: rgba(64, 64, 64, .6);
    }
    .team-card-style-3 .team-social-bar-wrap, .team-card-style-4 .team-social-bar-wrap {
      position: absolute;
      bottom: -18px;
      left: 0;
      width: 100%;
    }
    .team-card-style-3 .team-social-bar-wrap > .team-social-bar, .team-card-style-4 .team-social-bar-wrap > .team-social-bar {
      display: table;
      margin: auto;
      background-color: #fff;
      box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .11);
    }
    .team-card-style-3:hover, .team-card-style-4:hover {
      border-color: transparent;
      box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .09);
    }
    .team-card-style-4 {
      padding-top: 24px;
      padding-bottom: 31px;
      padding-left: 24px;
    }
    .team-card-style-4 .team-name {
      margin-bottom: 5px;
    }
    .team-card-style-4 .team-social-bar-wrap {
      position: relative;
      bottom: auto;
      left: auto;
      margin-top: 20px;
    }
    .team-card-style-4 .team-social-bar-wrap > .team-social-bar {
      margin: 0;
    }
    .team-card-style-5 {
      padding-bottom: 24px;
      transition: box-shadow 0.35s 0.12s;
    }
    .team-card-style-5 .team-thumb {
      position: relative;
      margin-bottom: 24px;
    }
    .team-card-style-5 .team-thumb::after {
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      transition: opacity 0.35s 0.12s;
      background-color: #ac32e4;
      content: '';
      opacity: 0;
      z-index: 1;
    }
    .team-card-style-5 .team-card-inner {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 16px;
      padding-bottom: 26px;
      transform: translateY(10px);
      transition: all 0.35s 0.12s;
      text-align: center;
      opacity: 0;
      z-index: 5;
    }
    .team-card-style-5 .team-contact-link, .team-card-style-5 .team-contact-link:hover {
      color: #fff;
    }
    .team-card-style-5 .sb-style-6.sb-light-skin, .team-card-style-5 .sb-style-7.sb-light-skin {
      border-color: rgba(255, 255, 255, .35);
    }
    .team-card-style-5 .team-name {
      margin-bottom: 6px;
      padding: 0 16px;
    }
    .team-card-style-5 .team-position {
      display: block;
      padding: 0 16px;
      transition: color 0.35s 0.12s;
    }
    .team-card-style-5:hover {
      box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .09);
    }
    .team-card-style-5:hover .team-thumb::after {
      opacity: 0.7;
    }
    .team-card-style-5:hover .team-card-inner {
      transform: translateY(0);
      opacity: 1;
    }
    .team-card-style-5:hover .team-position {
      color: #ac32e4;
    }
    .team-card-style-3 .team-social-bar-wrap>.team-social-bar, .team-card-style-4 .team-social-bar-wrap>.team-social-bar {
        display: table;
        margin: auto;
        background-color: #fff;
        -webkit-box-shadow: 0 12px 20px 1px rgba(64,64,64,0.11);
        box-shadow: 0 12px 20px 1px rgba(64,64,64,0.11);
    }
    .social-btn {
        display: inline-block;
        width: 36px;
        height: 36px;
        margin: 0;
        -webkit-transition: all .3s;
        transition: all .3s;
        font-size: 18px;
        line-height: 36px;
        vertical-align: middle;
        text-align: center !important;
        text-decoration: none;
    }
    .sb-twitter {
        color: #55acee !important;
    }
    .sb-github {
        color: #4183c4 !important;
    }
    .sb-linkedin {
        color: #0976b4 !important;
    }
    .sb-skype {
        color: #00aff0 !important;
    }
    .sb-style-2, .sb-style-3, .sb-style-4, .sb-style-5 {
      margin-right: 10px;
      margin-bottom: 10px;
      border-radius: 50%;
      background-color: #f5f5f5;
    }
    .sb-style-2.sb-light-skin, .sb-style-3.sb-light-skin, .sb-style-4.sb-light-skin, .sb-style-5.sb-light-skin {
      background-color: rgba(255, 255, 255, .1);
    }
    .sb-style-2:hover, .sb-style-3:hover, .sb-style-4:hover, .sb-style-5:hover, .sb-style-2.hover, .sb-style-3.hover, .sb-style-4.hover, .sb-style-5.hover {
      background-color: #fff;
      box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .11);
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
        <a class="nav-link text-primary" href="doctor-page.php">BOOK APPOINTMENT</a>
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
  <section class=" section container py-5">
    <h2 class="h4 block-title text-center mt-2">Our Doctors</h2>

    <div class="row pt-3">
            <?php
        include_once "logic2.php";
        $sql = "SELECT* FROM doctors";
              $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
              while( $record = mysqli_fetch_assoc($resultset) ) {
        ?>
        <div class="col-lg-3 col-sm-6 mb-30 pb-2">
            <div class="team-card-style-3 mx-auto">
                <div class="team-thumb"><img src="doctorprofilepictures/<?php echo $record['profileimage']; ?>" alt="Author Picture">
                </div>
                <h4 class="team-name"><?php echo $record['firstname']; ?> <?php echo $record['lastname']; ?></h4><p class="text-info"><?php echo $record['type']; ?></P><p><?php echo $record['country']; ?></P></br>
                <a href="bookappointment.php?email=<?php echo $record['email']; ?>" class="btn btn-primary">View Doctor<span class="text-light">&rarr;</span></a>
            </div>
        </div>
   <?php } ?>
</section>

    </body>  
    </html>
    