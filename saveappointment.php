<?php

$patientname 		= $_POST['patientname'];
$patientemail 		= $_POST['patientemail'];
$doctorname 		= $_POST['doctorname'];
$doctoremail	= $_POST['doctoremail'];
$startdate          = $_POST['startdate'];
$enddate            = $_POST['enddate'];
$description		= $_POST['description'];
$status    = 'Pending';

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
          $stmt = $conn->prepare("insert into appointment (patientname, patientemail, doctorname, doctoremail, startdate, enddate, description, status) values(?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssssss", $patientname, $patientemail, $doctorname,  $doctoremail, $startdate, $enddate, $description, $status);
          $execval = $stmt->execute();
          header("Location:payment.php");
          $stmt->close();
          $conn->close();
      }
      
  
?> 