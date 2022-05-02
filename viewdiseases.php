<?Php
session_start();
$name= $_SESSION['name'];

	include("admin_login.php");
	include("config.php")
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
	  margin-top:50px;
  }
</style>
</head>
<title>EDoktari</title>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
    <a class="navbar-brand" href="admindashboard.php" style = "font-family: 'kaushan Script';font-size: 30px;color:blue;"><img src="EDoktari_logo.png" width="50" height="50" class="d-inline-block align-top" alt="">EDoktari</a>

    <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav mx-auto">
    <li class="nav-item">
        <a class="nav-link text-primary" href="admindashboard.php">DASHBOARD</a>
      </li>
       <li class="nav-item">
        <a class="nav-link text-primary" href="index.php">BLOG</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="allappointments.php">APPOINTMENTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="allpatients.php">PATIENTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="alldoctors.php">DOCTORS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="allpayments.php">PAYMENTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="admindiseases.php">DISEASES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="viewdiseases.php">VIEW DISEASES</a>
      </li>
    </ul> 
      <ul class="navbar-nav ml-auto">
     
        <li class="nav-item dropdown ">
        <?php  
      
                  $name = $_SESSION['name'];
                  $sql = "SELECT * FROM admin WHERE name = '$name'";

                  $gotResults = mysqli_query($conn,$sql);
                  if($gotResults){
                    if(mysqli_num_rows($gotResults) > 0){
                      while($row = mysqli_fetch_array($gotResults)){
                        //print_r($row);
                        ?>
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "font-size: 20px;color: blue">
            <?php echo$row['name'] ?>
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
<a href="admindiseases.php" class="btn btn-warning float-left ml-5" name='sub' >Back</a></br></br>
       <center>
	   <h2 class="w3-text-teal">View Diseases</h2>
       <hr style="width:200px" class="w3-opacity">
	   
	   <?php
	   $sel="select * from disease";
	   $res=$conn->query($sel);
	   if(mysqli_num_rows($res)==0)
	   {
		   echo "No data found";
	   }
	   else
	   {
		   echo"
		   <div class='w3-container'>
	   <table class='table table-hover' style='width:80%' >
	   <thead >
       <tr class='table-primary'>
	   <th >Id</th>
	   <th >Name</th>
	   <th >Symptoms</th>
	   <th >Category</th>
	   
		</tr>
    </thead>   ";
		   while($data=mysqli_fetch_array($res))
		   {
			   $did=$data['Did'];
	  $dname=$data['disease'];
	  $contact=$data['symptom'];
	 
	  $category=$data['type'];
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr align='center'>
        <td>".$did."</td>
        <td>".$dname."</td>
        <td>".$contact."</td>
		<td>".$category."</td>
      </tr>
      
    </tbody>";
		   }
			   
	   }

	   ?>
	   </table>
    </br></br>
    
</form>
</secction>
</body>
</html>