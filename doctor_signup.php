<?php
$firstname 		= $_POST['fname'];
$lastname 		= $_POST['lname'];
$email 			= $_POST['email'];
$phone 			= $_POST['phone'];
$type     = $_POST['type'];
$uniquenumber   = $_POST['uniquenumber'];
$password 		= $_POST['psw'];
$repeatpassword = $_POST['psw-repeat'];

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
          $stmt = $conn->prepare("insert into doctors(firstname, lastname, email, phonenumber, uniquenumber, type,  password, repeatpassword) values(?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssssss", $firstname, $lastname, $email,  $phone, $uniquenumber, $type, md5($password), md5($repeatpassword));
          $execval = $stmt->execute();
          $_SESSION['email'] = $email;
          header("Location:doctor_profile.php");
          $stmt->close();
          $conn->close();
      }
      
  
  
  
  ?>