
<?php
 session_start();
 include "config.php";
include "logic2.php";

if (isset($_GET['email'])){

    $email = mysqli_real_escape_string($conn,$_GET['email']);
    $sql = "SELECT * FROM doctors WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $doctor = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
}
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
   body{
    background-color: #f5f5f5;
    margin-top:0px;
}
.section {
    padding: 0px 0;
    position: relative;
    margin-top:100px;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me 
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #20247b;
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
        <a class="nav-link active text-primary" href="doctor-page.php"> BOOK APPOINTMENT</a>
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

  <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color"><?php echo $doctor['firstname']; ?> <?php echo $doctor['lastname']; ?></h3>
                            <h6 class="theme-color lead">Bio</h6>
                            <p><?php echo $doctor['bio']; ?></p>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Experience</label>
                                        <p><?php echo $doctor['experience']; ?> Yrs</p>
                                    </div>
                                  
                                    <div class="media">
                                        <label>Country</label>
                                        <p><?php echo $doctor['country']; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Town</label>
                                        <p><?php echo $doctor['city']; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Address</label>
                                        <p><?php echo $doctor['officeaddress']; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Gender</label>
                                        <p><?php echo $doctor['gender']; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p><a class="team-contact-link" href="mailto:info@example.com"><i class="fe-icon-mail"></i><?php echo $doctor['email']; ?></a></p>
                                    </div>
                                    <div class="media">
                                        <label>Phone</label>
                                        <p><a class="team-contact-link" href="tel:+19871625346"><i class="fe-icon-phone"></i><?php echo $doctor['phonenumber']; ?></a></p>
                                    </div>
                                    <div class="media">
                                        <label>type</label>
                                        <p><?php echo $doctor['type']; ?></p>
                                    </div>
                                   
                                    
                                </div>
                             </br>
                            <a href="appointment.php?email=<?php echo $doctor['email']; ?>" class="btn btn-primary float-right ">Book appointment</a>
           
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="doctorprofilepictures/<?php echo $doctor['profileimage']; ?>" title="" alt="">
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
  </body>  
    </html>