<?php 
$conn = mysqli_connect("localhost","root","","edoktari");
$error="";
if($conn->connect_errno >0){
  die("Unable to connect to dababase
    [".$conn->connect_error."]");
}else{ 
echo"";
session_start();
if(isset($_POST["login3"])){
    $name = $_POST["name"];
    $password = $_POST["psw"];
    $query = mysqli_query($conn,"SELECT * FROM admin WHERE name='$name' and password='$password'");
    //applay mysqli
    $numrows= mysqli_num_rows($query);
    if($numrows >0){
      $_SESSION['name'] = $name;
      header("location:admindashboard.php");    
      }else{
        echo "<script>alert('invalid email or password')</script>";
      }
    }
}
 

?>