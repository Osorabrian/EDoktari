<?php 
    include "config.php";
	require_once("config.php");
	
	$sql = $conn->prepare("DELETE  FROM doctors WHERE doctor_id=?");  
	$sql->bind_param("i", $_GET["doctor_id"]); 
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:alldoctors.php');		
?>