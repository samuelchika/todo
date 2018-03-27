<?php 
session_start();
if (empty($_SESSION['id_user'])) {
		header("Location: dashboard.php");
		exit();
	}
	require_once("../include/db.php");

	if(isset($_POST)){
		$activity = mysqli_real_escape_string($db, $_POST['activity']);
		$date = mysqli_real_escape_string($db, $_POST['date']);
		$time = mysqli_real_escape_string($db, $_POST['time']);
		$act_description = mysqli_real_escape_string($db, $_POST['act_description']);

		$sql = "INSERT INTO activities (id_user, activity, date, time, act_description) VALUES ('$_SESSION[id_user]', '$activity', '$date', '$time', '$act_description')";
		$result = mysqli_query($db, $sql);

		if($result){
			$_SESSION["activity_registration_successfull"] = TRUE; 
			header("Location: dashboard.php");
			exit();
		}else{
			/*$_SESSION["activity_registration_unsuccessfull"] = TRUE; 
			header("Location: dashboard.php");
			exit();*/
			echo mysqli_error($db);
		}
	}else{
		header("Location: dashboard.php");
		exit();
	}

?>