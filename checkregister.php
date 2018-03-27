<?php 
session_start();
	require_once("include/db.php");

	if(isset($_POST)){
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);


		$password = base64_encode(strrev(md5($password)));

		$sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
		$result = mysqli_query($db, $sql);

		if($result){
			$_SESSION["registration_successfull"] = TRUE; 
			header("Location: user/dashboard.php");
			exit();
		}else{
			$_SESSION["registration_unsuccessfull"] = TRUE; 
			header("Location: index.php");
			exit();
		}
	}else{
		header("Location: index.php");
		exit();
	}

?>