<?php 
session_start();
if(empty($_SESSION['id_user'])){
	header("dashboard");
	exit();
}
	require_once("../include/db.php");

	if(isset($_POST)){
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		
		$sql = "UPDATE users SET firstname ='$firstname', lastname ='$lastname' WHERE id_user = '$_SESSION[id_user]'";
		$result = mysqli_query($db, $sql);

		if($result){
			$_SESSION["update_successfull"] = TRUE; 
			header("Location: dashboard.php");
			exit();
		}else{
			$_SESSION["updateNot_unsuccessfull"] = TRUE; 
			header("Location:  dashboard.php");
			exit();
		}
	}else{
		header("Location: dashboard.php");
		exit();
	}

?>