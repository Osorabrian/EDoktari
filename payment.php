<?php
session_start();
include "config.php";
include "logic2.php";



?>
<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan Script' rel='stylesheet'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<title>EDoktari</title>
<style>
    .payment-form{
	padding-bottom: 50px;
	font-family: 'Montserrat', sans-serif;
}

.payment-form.dark{
	background-color: #f6f6f6;
}

.payment-form .content{
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
	background-color: white;
}

.payment-form .block-heading{
    padding-top: 50px;
    margin-bottom: 40px;
    text-align: center;
}

.payment-form .block-heading p{
	text-align: center;
	max-width: 420px;
	margin: auto;
	opacity:0.7;
}

.payment-form.dark .block-heading p{
	opacity:0.8;
}

.payment-form .block-heading h1,
.payment-form .block-heading h2,
.payment-form .block-heading h3 {
	margin-bottom:1.2rem;
	color: #3b99e0;
}

.payment-form form{
	border-top: 2px solid #5ea4f3;
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
	background-color: #ffffff;
	padding: 0;
	max-width: 600px;
	margin: auto;
}

.payment-form .title{
	font-size: 1em;
	border-bottom: 1px solid rgba(0,0,0,0.1);
	margin-bottom: 0.8em;
	font-weight: 600;
	padding-bottom: 8px;
}

.payment-form .products{
	background-color: #f7fbff;
    padding: 25px;
}

.payment-form .products .item{
	margin-bottom:1em;
}

.payment-form .products .item-name{
	font-weight:600;
	font-size: 0.9em;
}

.payment-form .products .item-description{
	font-size:0.8em;
	opacity:0.6;
}

.payment-form .products .item p{
	margin-bottom:0.2em;
}

.payment-form .products .price{
	float: right;
	font-weight: 600;
	font-size: 0.9em;
}

.payment-form .products .total{
	border-top: 1px solid rgba(0, 0, 0, 0.1);
	margin-top: 10px;
	padding-top: 19px;
	font-weight: 600;
	line-height: 1;
}

.payment-form .card-details{
	padding: 25px 25px 15px;
}

.payment-form .card-details label{
	font-size: 12px;
	font-weight: 600;
	margin-bottom: 15px;
	color: #79818a;
	text-transform: uppercase;
}

.payment-form .card-details button{
	margin-top: 0.6em;
	padding:12px 0;
	font-weight: 600;
}

.payment-form .date-separator{
 	margin-left: 10px;
    margin-right: 10px;
    margin-top: 5px;
}

@media (min-width: 576px) {
	.payment-form .title {
		font-size: 1.2em; 
	}

	.payment-form .products {
		padding: 40px; 
  	}

	.payment-form .products .item-name {
		font-size: 1em; 
	}

	.payment-form .products .price {
    	font-size: 1em; 
	}

  	.payment-form .card-details {
    	padding: 40px 40px 30px; 
    }

  	.payment-form .card-details button {
    	margin-top: 2em; 
    } 
}
section{
  margin-top:70px;
}
    </style>
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
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Payment</h2>
        </div>
        <form action= "submit.php" method = "POST" class="needs-validation" novalidate>
          <div class="products">
            <h3 class="title">Service</h3>
            <div class="item">
              <span class="price">$5</span>
              <p class="item-name">Book Appointment</p>
            </div>
            <div class="total">Total<span class="price">$5</span></div>
          </div>
          <div class="card-details">
            <h3 class="title">Credit Card Details</h3>
            <div class="row">
            <div class="form-group col-sm-6">
                <?php  
                include "config.php";
                  $email = $_SESSION['email'];
                  $sql = "SELECT * FROM patients WHERE email = '$email'";

                  $gotResults = mysqli_query($conn,$sql);
                  if($gotResults){
                    if(mysqli_num_rows($gotResults) > 0){
                      while($row = mysqli_fetch_array($gotResults)){
                        //print_r($row);
                        ?>
                    <label for="patient-name">Patient Name</label>
                    <input name="patientname" type="text" class="form-control" value="<?php echo$row['firstname'] ?>" aria-label="Card Holder" aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback">
                                        incorrect patient's name
                                      </div>
            </div>
              <div class="form-group col-sm-6">
                <label for="patient email">Patient email</label>
                <input name="patientemail" type="text" class="form-control" value="<?php echo$row['email'] ?>" aria-label="Card Holder" aria-describedby="basic-addon1" required>
               <div class="invalid-feedback">
                                        incorrect email
                                      </div>
               <?php
                      }
                    }
                  }
                ?>
                </div>
              <div class="form-group col-sm-7">
                <label for="card-holder">Card Holder</label>
                <input name="cardholder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1" required>
                <div class="invalid-feedback">
                                        incorrect name
                                      </div>
            </div>
              <div class="form-group col-sm-5">
                <label for="">Expiration Date</label>
                <div class="input-group expiration-date">
                  <input name = "month" type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1" required>
                  <div class="invalid-feedback">
                                        wrong month
                                      </div>
                  <span  class="date-separator">/</span>
                  <input name="year" type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1" required>
                  <div class="invalid-feedback">
                                        wrong year
                                      </div>
                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">Card Number</label>
                <input name="cardnumber" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1" required>
                <div class="invalid-feedback">
                                        incorrect card number
                                      </div>
            </div>
              <div class="form-group col-sm-4">
                <label for="cvc">CVC</label>
                <input name="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1" required>
                <div class="invalid-feedback">
                                        incorrect CVC
                                      </div>
              </div>
              <div class="form-group col-sm-12">
              <button type = "submit" class="btn btn-primary float-right ">Book appointment</buton>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
                </section>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
