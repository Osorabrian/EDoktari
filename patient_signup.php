<?php
$firstname 		= $_POST['fname'];
$lastname 		= $_POST['lname'];
$email 			= $_POST['email'];
$phone 			= $_POST['phone'];
$passwords 		= $_POST['psw'];
$repeatpassword = $_POST['psw-repeat'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edoktari";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else {
          $stmt = $conn->prepare("insert into patients(firstname, lastname, email, phonenumber, passwords, repeatpassword) values(?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssss", $firstname, $lastname, $email,  $phone, md5($passwords), md5($repeatpassword));
          $execval = $stmt->execute();
          $_SESSION['email'] = $email;
          echo "<script>alert('Account has been created')</script>";
          $stmt->close();
          $conn->close();
      }
      
  
  
  
  ?>