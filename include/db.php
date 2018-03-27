<?php 
	$dbserver = "localhost";
	$dbusername = "root";
	$dbpass = "";
	$dbname = "bincom";

	$db = mysqli_connect($dbserver, $dbusername, $dbpass, $dbname);
	if(!$db){
	die("Connection Failed". mysqli_errno()."<br />".mysqli_error());
	
	}
?>