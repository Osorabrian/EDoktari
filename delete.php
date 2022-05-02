<?php 
    include "config.php";
	require_once("config.php");
	
	$sql = $conn->prepare("DELETE  FROM appointment WHERE appointment_id=?");  
	$sql->bind_param("i", $_GET["appointment_id"]); 
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:patientappointments.php');		
?>