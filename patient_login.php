<?php
$conn = mysqli_connect("localhost","root","","edoktari");
$error="";
if($conn->connect_errno >0){
  die("Unable to connect to dababase
    [".$conn->connect_error."]");
}else{ 
echo"";
session_start();
if(isset($_POST["login1"])){
    $email = $_POST["email"];
    $passwords = $_POST["psw"];
    $passwords = md5($passwords);
    $query = mysqli_query($conn,"SELECT * FROM patients WHERE email='$email' and passwords='$passwords'");
    //applay mysqli
    $numrows= mysqli_num_rows($query);
    if($numrows >0){
      $_SESSION['email'] = $email;
      header("location:homepage.php");    
      }else{
        echo "<script>alert('invalid email or password')</script>";
        header("location:landing page.html");
        
      }
    }
}
 
?>