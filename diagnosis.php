<?Php
session_start();
$email= $_SESSION['email'];
include("config.php");
	

	?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link href='https://fonts.googleapis.com/css?family=Kaushan Script' rel='stylesheet'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<style>
    .dropdown .dropdown-menu .dropdown-item:active, .dropdown .dropdown-menu .dropdown-item {color: blue;font-size: 15px;}
    .dropdown .dropdown-menu .dropdown-item:active, .dropdown .dropdown-menu .dropdown-item:hover{background-color: lightblue ;color: white;}
    body{
      margin-top:0px;
      background:#eee;
  }
  section{
	  margin-top:60px;
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
        <a class="nav-link text-primary" href="doctor-page.php"> BOOK APPOINTMENT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="patientappointments.php">MY APPOINTMENTS</a>
      </li>
	  <li class="nav-item">
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
<section>
<form method="POST">

     <br><br>
	 <center>
	   <h2 class="w3-text-teal">Online Diagnosis</h2>
	     <hr style="width:250px" class="w3-opacity">
	 </center>	 
	 
	   <table align='center' style="width:50%;padding:50px" border='1'>
	   <tr class="table-light">
	   <td style="padding:50px">
      <div class="w3-container" style="width:90%">
        <div class="w3-section">
           <label align='left'><b>Please Enter a Symptom</b></label> (Any one symptom,Don't leave blank space before or after it)
          <input class="form-control" type="text" name='symp' value="<?php if (isset($_POST['symp'])) { echo $_POST['symp']; }  ?>" required><br>
		   <input type="submit" name='sub' value="NEXT" class='btn btn-primary'>
         <input type='hidden' value='<?php echo date("Y-m-d H:i");?>' name='date'>
        </div>
    </div>
    </td>
	</tr>
	</table>
	<br><br>
	<?php
	 if(isset($_POST['sub']))
	 {
		 $date=$_POST['date'];
          $symp=$_POST['symp'];
		  $sel="select * from disease where symptom like '%$symp%' ";
		  $rel=$conn->query($sel);
		   if(mysqli_num_rows($rel)==0)
	   {
		   echo "No data found";
	   }
	   else
	   { 
           
           $s="insert into diagnosisrecord values('$email','$symp','','','$date')";
		   if(mysqli_query($conn,$s))
	          {
	          }
			   $p="UPDATE disease SET flag='1' WHERE symptom LIKE '%$symp%'";
		   if(mysqli_query($conn,$p))
	          {
	          }
			  echo"
			   <table align='center' style='width:50%;padding:50px' border='1'>
	            <tr class='table-light'>
	            <td style='padding:50px'>
                <div class='w3-container' style='width:90%'>
                <div class='w3-section'>
			     <label align='left'><b>Are you experiencing any of these symptom too?</b></label><br>
			  ";
		   while($data=mysqli_fetch_array($rel))
		   {
			   $sym=$data['symptom'];
			   $array = explode(',', $sym);
             $id = rand(0, (count($array)-1));
			 echo $array[$id] . '<br> ';
			  $r="insert into keyword values('$array[$id]')";
		   if(mysqli_query($conn,$r))
	          {
	          }
		   }
	 }
	 
	 ?>
	  <br>
	 <label align='left'><b>Please Select</b></label>
	 <select name="cat1" width="200%" type='text' class="form-select">
<?php if (isset($_POST['cat1']))
 {
	  echo "<option>".$_POST['cat1']."</option>";
      
 }
 else
 {
  
  
    }
 ?>

<option>--Select--</option>
<?php
 $sql5="select distinct word from keyword";


  //$cnt=$cnt+1;
 $res = $conn->query($sql5);
while($row = $res->fetch_assoc()) 
{?>
	<option value="<?php echo $row['word'] ?>"/><?php echo $row['word'] ?></option>

	<?php }
?>
</select>
 <br>
<?php
echo"<input type='submit' name='sub1' value='NEXT' class='btn btn-primary'>&nbsp;&nbsp;";
echo"<input type='submit' name='dn1' value='No' class='btn btn-danger float-right'>"; 
	 } 
	 ?>
</div>
    </div>
    </td>
	</tr>
	</table>
	
	 <?php
	 if(isset($_POST['sub1']))
	 {
          $sym=$_POST['cat1'];
		  $sym1=$_POST['symp'].",".$sym;
		  $sel="select * from disease where flag='1'";
		  $rel=$conn->query($sel);
		   if(mysqli_num_rows($rel)==0)
	   {
		   echo "No data found";
	   }
	   else
	   { 
        $n="delete from keyword";
		   if(mysqli_query($conn,$n))
	          {
	          }
           $s="UPDATE diagnosisrecord set sym='$sym1' where sym='".$_POST['symp']."'";
		   if(mysqli_query($conn,$s))
	          {
	          }
			echo"<table align='center' style='width:50%;padding:50px' border='1'>
	            <tr class='table-light'>
	            <td style='padding:50px'>
                <div class='w3-container' style='width:90%'>
                <div class='w3-section'>
			     <label align='left'><b>Are you experiencing any of these symptom too?</b></label><br>";
		   while($data=mysqli_fetch_array($rel))
		   {
			   $sym=$data['symptom'];
			   $array = explode(',', $sym);
             $id = rand(0, (count($array)-1));
			 echo $array[$id] . '<br> ';
			  $r="insert into keyword values('$array[$id]')";
		   if(mysqli_query($conn,$r))
	          {
	          }
		   }
	 }
	 
	 ?>
	 <br>
	 <label align='left'><b>Please Select</b></label>
	 <select name="cat2" width="200%" class="form-select">
<?php if (isset($_POST['cat2']))
 {
	  echo "<option>".$_POST['cat2']."</option>";
  
 }
 else
 {
  
  
    }
 ?>

<option>--Select--</option>
<?php
 $sql5="select distinct word from keyword";


  //$cnt=$cnt+1;
 $res = $conn->query($sql5);
while($row = $res->fetch_assoc()) 
{?>
	<option value="<?php echo $row['word'] ?>"/><?php echo $row['word'] ?></option>

	<?php }
?>
</select>
 <br>
<?php
echo"<input type='hidden' value='".$sym1."' name='s'>";
echo"<input type='submit' name='sub2' value='Next' class='btn btn-primary'>&nbsp;&nbsp;";

echo"<input type='submit' name='dn2' value='No' class='btn btn-danger float-right'>";
	 }
	 ?>
	</div>
    </div>
    </td>
	</tr>
	</table>
	 <?php
	 if(isset($_POST['sub2']))
	 {
		  $date=$_POST['date'];     
		  $sym=$_POST['cat2'];
		  $sym1=$_POST['s'];
		  $array = explode(',', $sym1);
		  $one=$array[0];
		  $two=$array[1];
		  $sym2=$sym1.",".$sym;
		  $sel="select * from disease where flag='1' ";
		  $rel=$conn->query($sel);
		   if(mysqli_num_rows($rel)==0)
	   {
		   echo "No data found";
	   }
	   else
	   { 
        $n="delete from keyword";
		   if(mysqli_query($conn,$n))
	          {
	          }
           $s="UPDATE diagnosisrecord set sym='$sym2' where sym='".$sym1."'";
		   if(mysqli_query($conn,$s))
	          {
	          }
			
            $re="Select * from disease where flag='1'";			
			$res = $conn->query($re);
		    while($data=mysqli_fetch_array($res))
		   {
			   $symptom=$data['symptom'];
			   if(strpos($symptom,$one) !== false && strpos($symptom,$two) !== false && strpos($symptom,$sym) !== false)
								 {
									$ans=$data['disease'];
                                    $type=$data['type'];									
									break;
								 }
								 else
								 {
									 $ans='';
								 }
								 
		   }
		   if($ans=='')
		   {
			    $re="Select * from disease where flag='1'";	
				$res = $conn->query($re);
		        while($data=mysqli_fetch_array($res))
		      {     
			        $symptom=$data['symptom'];
		         if(strpos($symptom,$one) !== false && strpos($symptom,$two) !== false)
			    {
									$ans=$data['disease']; 
									$type=$data['type'];
									break;
			    }
			  }
		   }
			 
		   }
		    $new="UPDATE diagnosisrecord SET disease='$ans',type='$type' WHERE date='$date'";
		   if(mysqli_query($conn,$new))
	          {
	          }
			  /*$new1="UPDATE diagnosisrecord SET type='$type' WHERE date='$date'";
		   if(mysqli_query($conn,$new1))
	          {
	          }*/
		   $p="UPDATE disease SET flag='0' WHERE flag='1'";
		   if(mysqli_query($conn,$p))
	          {
	          }
			  $n="delete from keyword";
		   if(mysqli_query($conn,$n))
	          {
	          }
		   echo "<table align='center' style='width:50%;padding:50px' border='1'>
	            <tr class='table-light'>
	            <td style='padding:50px'>
                <div class='w3-container' style='width:90%'>
                <div class='w3-section'>
			     <label align='left'><b>Suspected Disease:</b></label>
				 <label style='color:red'><b>$ans</b></label><br><br>
				
				<label align='left'><b>Suggested Doctors for Suspected Disease</b></label><br><br>
				 <table border='1' style='width:80%' cellspacing='0' cellpadding='0'>
				 <tr align='center' style='color:white'>
				 <td bgcolor='teal' align='center'>Name</td>
				 <td bgcolor='teal' align='center'>ID</td>
				 <td bgcolor='teal'>Address</td>
				 <td bgcolor='teal'>Mobile</td>
				 </tr>
				 ";
				 
				 $doc="select * from doctors where type='$type'";
				 $res = $conn->query($doc);
		        while($data=mysqli_fetch_array($res))
		      {  
		            echo"
					<tr  align='center'>
					<td>".$data['firstname']."</td>
					<td>".$data['uniquenumber']."</td>
					<td>".$data['phonenumber']."</td>
					<td>".$data['officeaddress']."</td>
				     </tr>	
					";
			  }
				echo"
				</table>
				
				</div>
    </div>
    </td>
	</tr>
	</table>";
			 
	 }
	 
	 if(isset($_POST['dn1']))
	 {
		 $date=$_POST['date']; 
		 $symp=$_POST['symp'];
		  $sel="select * from disease where symptom like '%$symp%' ";			
			$res = $conn->query($sel);
			$nm1="";
		 

			   echo"<table align='center' style='width:50%;padding:left:50px' border='1'>
	            <tr>
	            <td style='padding-left:50px'>
                <div class='w3-container' style='width:90%'>
                <div class='w3-section'>
			    ";
				$i=0;
		      while($data=mysqli_fetch_array($res))
		   {
			   $disease=$data['disease'];
			   $type=$data['type'];
				echo"<label align='left'><b>Suspected Disease:</b></label><label style='color:red'><b>$disease</b></label><br>
				<label align='left'><b>Suggested Doctors for Suspected Disease</b></label><br>
				 <table border='1' style='width:80%' cellspacing='0' cellpadding='0' class='table table-hover'>
				 <thead class='thead-primary'>
				 <tr  align='center' >
				 <td bgcolor = 'blue' align='center'>Name</td>
				 <td bgcolor = 'blue' align='center'>ID</td>
				 <td bgcolor ='blue'>Address</td>
				 <td bgcolor ='blue'>Mobile</td>
				 </tr>
				 </thead>
				 ";
				$sel="select * from doctors where type='$type'";			
			    $rs = $conn->query($sel);
				while($row=mysqli_fetch_array($rs))
				{
					 echo"
					<tr  align='center'>
					<td>".$row['firstname']."</td>
					<td>".$row['uniquenumber']."</td>
					<td>".$row['officeaddress']."</td>
					<td>".$row['phonenumber']."</td>
				     </tr>	
					";
				}
				echo"</table><br>";
				 $te="insert into temp values('$disease','$type')";
				 if(mysqli_query($conn,$te))
                {
			      	
                $i++;			
                }	
	       }
	       $sql10="select * from temp";
	        $res10=$conn->query($sql10);
	        $nm1="";
			$nm2="";
           while($row10=$res10->fetch_assoc())
           {
	           $variableName = $row10['disease'];
	            $nm1.=$row10['disease'].", \n";
			    $variableName2 = $row10['type'];
	              $nm2.=$row10['type'].", \n";
              }
			  $new="UPDATE diagnosisrecord SET disease='$nm1', type='$nm2' WHERE date='$date'";
		   if(mysqli_query($conn,$new))
	          {
	          }
		   $p="UPDATE disease SET flag='0' WHERE flag='1'";
		   if(mysqli_query($conn,$p))
	          {
	          }
			  $f="UPDATE diagnosisrecord set disease='$nm1' where symptom like '%$symp%' ";
		   if(mysqli_query($conn,$f))
	          {
	          }
			  $n="delete from keyword";
		   if(mysqli_query($conn,$n))
	          {
	          }
			    $de="delete from temp";
		   if(mysqli_query($conn,$de))
	          {
	          } 
				echo"
				</table>
				
				</div>
    </div>
    </td>
	</tr>
	</table>";
	 }
	 if(isset($_POST['dn2']))
	 {
		 $date=$_POST['date']; 
		  $sym1=$_POST['s'];
		  $array = explode(',', $sym1);
		  $one=$array[0];
		  $two=$array[1];
		  $sel="select * from disease where symptom like '%$one%' and symptom like '%$two%' ";			
			$res = $conn->query($sel);
			 echo"<table align='center' style='width:50%;padding:50px' border='1' class='table-light'>
	            <tr>
	            <td style='padding:50px'>
                <div class='w3-container' style='width:90%'>
                <div class='w3-section'>
			    ";
				$i=0;
		      while($data=mysqli_fetch_array($res))
		   {
			   $disease=$data['disease'];
			   $type=$data['type'];
				echo"<label align='left'><b>Suspected Disease:</b></label><label style='color:red'><b>$disease</b></label><br>
				<label align='left'><b>Suggested Doctors for Suspected Disease</b></label><br>
				 <table border='1' style='width:90%' cellspacing='0' cellpadding='0' class='table table-hover'>
				 <thead class='thead-dark'>
				 <tr align='center' style='color:black'>
				 <td bgcolor='bl' align='center'>Name</td>
				 <td bgcolor='bl' align='center'>ID</td>
				 <td bgcolor='blue'>Address</td>
				 <td bgcolor='blue'>Mobile</td>
				 </tr>
				 </thead>
				 ";
				$sel="select * from doctors where type='$type'";			
			    $rs = $conn->query($sel);
				while($row=mysqli_fetch_array($rs))
				{
					 echo"
					<tr  align='center'>
					<td>".$row['firstname']." ".$row['lastname']."</td>
					<td>".$row['uniquenumber']."</td>
					<td>".$row['officeaddress']."</td>
					<td>".$row['phonenumber']."</td>
				     </tr>	
					";
				}
				echo"</table><br>";
				$te="insert into temp values('$disease','$type')";
				 if(mysqli_query($conn,$te))
                {
			      	
                $i++;			
                }	
	       }
		      $sql10="select * from temp";
	        $res10=$conn->query($sql10);
	        $nm3="";
			$nm4="";
           while($row10=$res10->fetch_assoc())
           {
	           $variableName = $row10['disease'];
	            $nm3.=$row10['disease'].", \n";
			    $variableName2 = $row10['type'];
	              $nm4.=$row10['type'].", \n";
              }
			  $new="UPDATE diagnosisrecord SET disease='$nm3',type='$nm4' WHERE date='$date'";
		   if(mysqli_query($conn,$new))
	          {
	          }
		   $p="UPDATE disease SET flag='0' WHERE flag='1'";
		   if(mysqli_query($conn,$p))
	          {
	          }
			  $n="delete from keyword";
		   if(mysqli_query($conn,$n))
	          {
	          }
			       $de="delete from temp";
		   if(mysqli_query($conn,$de))
	          {
	          } 
				echo"
				</table>
				
				</div>
    </div>
    </td>
	</tr>
	</table>";
	 }
	 ?>
	 
	</section>
<br> 
