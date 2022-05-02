<?php
 
 session_start();
 include "config.php";

 if(isset($_POST['update']) && isset($_FILES['patientimage']))
 {
    
    $email=$_SESSION['email'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phonenumber=$_POST['phonenumber'];
    $input_date=$_POST['date'];
    $date=date("Y-m-d H:i:s",strtotime($input_date));
    $address=$_POST['address'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $gender=$_POST['gender'];
    $image_name = $_FILES['patientimage']['name'];
    $tmp_name = $_FILES['patientimage']['tmp_name'];
    $local_image = "patientprofilepictures/";
    move_uploaded_file($tmp_name, $local_image.$image_name);
    $select= "select * from patients where email='$email'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['email'];
    if($res === $email)
    {
   
       $update = "UPDATE patients SET firstname='$fname', lastname='$lname', phonenumber='$phonenumber', dateofbirth='$date', address='$address', height='$height', weight='$weight', gender='$gender', profileimage='$image_name' WHERE email='$email'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           /*Successful*/
           header('location:viewpatient.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('location: landing page.html');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:blogp.php');
    }
 }
?>