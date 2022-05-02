<?php

$patientname 		= $_POST['patientname'];
$patientemail 		= $_POST['patientemail'];
$doctorname 		= $_POST['doctorname'];
$doctoruniquenumber	= $_POST['doctoruniquenumber'];
$cardholder 		= $_POST['cardholder'];
$month              = $_POST['month'];
$year               = $_POST['year'];
$cardnumber		    = $_POST['cardnumber'];
$cvc                = $_POST['cvc'];
$price              = 10;
$currency           = "usd";
$paidammount        = 10;
$paidammountcurrency = "usd";
$created            = date("Y-m-d H:i:s");

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "edoktari";


// Create connection
$conn = mysqli_connect($servername, $username, $pass, $dbname);


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else {
          $stmt = $conn->prepare("insert into payment (patientname, patientemail, card_holder, card_num, card_cvc, card_exp_month, card_exp_year, price, currency, paid_amount, paid_amount_currency, created) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssssssssss", $patientname, $patientemail, $cardholder, $cardnumber, $cvc, $month, $year, $price, $currency, $paidammount, $paidammountcurrency, $created);
          $execval = $stmt->execute();
          header("Location:patientappointments.php");
          $stmt->close();
          $conn->close();
      }
      
  
  
  
  ?>