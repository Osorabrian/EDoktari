<?php
 
 session_start();
 include "config.php";

 if(isset($_POST['update']) && isset($_FILES['doctorimage']))
 {
    
    $email=$_SESSION['email'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phonenumber=$_POST['phonenumber'];
    $uniquenumber = $_POST['uniquenumber'];
    $input_date=$_POST['date'];
    $date=date("Y-m-d H:i:s",strtotime($input_date));
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $type = $_POST['type'];
    $experience = $_POST['experience'];
    $select= "select * from doctors where email='$email'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['email'];

    if($res === $email)
    {
     
        $email=$_SESSION['email'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $phonenumber=$_POST['phonenumber'];
        $uniquenumber = $_POST['uniquenumber'];
        $input_date=$_POST['date'];
        $date=date("Y-m-d H:i:s",strtotime($input_date));
        $address=$_POST['address'];
        $gender=$_POST['gender'];
        $type = $_POST['type'];
        $experience = $_POST['experience'];
        $bio = $_POST['bio'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $image_name = $_FILES['doctorimage']['name'];
        $tmp_name = $_FILES['doctorimage']['tmp_name'];
        $local_image = "doctorprofilepictures/";
        move_uploaded_file($tmp_name, $local_image.$image_name);
        $select= "select * from doctors where email='$email'";
        $sql = mysqli_query($conn,$select);
        $row = mysqli_fetch_assoc($sql);
        $res= $row['email'];
        if($res === $email)
        {
           $update = "UPDATE doctors SET firstname='$fname', lastname='$lname', phonenumber='$phonenumber', uniquenumber = '$uniquenumber', dateofbirth='$date', officeaddress='$address', gender='$gender', type = '$type', experience = '$experience', bio = '$bio', country='$country', city='$city', profileimage='$image_name' WHERE email='$email'";
           $sql2=mysqli_query($conn,$update);
    if($sql2)
           { 
            
               /*Successful*/
               header('location:viewdoctor.php');
           }
           else
           {
               /*sorry your profile is not update*/
               header('location:landing page.html');
           }
        }
        else
        {
            /*sorry your id is not match*/
            header('location:blogp.php');
        }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:blogp.php');
    }
    }
 
?>