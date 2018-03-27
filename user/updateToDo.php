<?php 
session_start();
if(empty($_SESSION['id_user'])){
	header("dashboard");
	exit();
}
	require_once("../include/db.php");

	if(isset($_POST)){
		$activity = mysqli_real_escape_string($db, $_POST['activity']);
		$date = mysqli_real_escape_string($db, $_POST['date']);
		$time = mysqli_real_escape_string($db, $_POST['time']);
		$act_description = mysqli_real_escape_string($db, $_POST['act_description']);
		$target_id = mysqli_real_escape_string($db, $_POST['id_activity']);
		
		
		$sql = "UPDATE activities SET activity ='$activity', date ='$date', time ='$time', act_description ='$act_description' WHERE id_user = '$_SESSION[id_user]' AND id_activity = '$target_id'";
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