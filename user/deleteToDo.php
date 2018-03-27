<?php 
session_start();
if (empty($_SESSION['id_user'])) {
		header("Location: dashboard.php");
		exit();
	}
	require_once("../include/db.php");

	if(isset($_POST)){
		
		$sql = "DELETE FROM activities WHERE id_activity = '$_GET[id]'";
				$result = mysqli_query($db, $sql);


		if($result){
			$_SESSION["activity_deleted_successfull"] = TRUE; 
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