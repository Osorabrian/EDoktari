<?php 
    include "config.php";
	require_once("config.php");
	
	$sql = $conn->prepare("DELETE  FROM patients WHERE id=?");  
	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:allpatients.php');		
?>