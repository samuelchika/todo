<?php 
session_start();
	require_once("include/db.php");

	if(isset($_POST)){
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		$password = base64_encode(strrev(md5($password)));

		$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
		$result = mysqli_query($db, $sql);

		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				$_SESSION["login_successfull"] = TRUE; 
				$_SESSION['id_user'] = $row['id_user'];
				$_SESSION['name'] = $row['firstname']. " ".$row['lastname'];
				header("Location: user/dashboard.php");
				exit();
			}
			
		}else{
			$_SESSION["login_unsuccessfull"] = TRUE; 
			header("Location: index.php");
			exit();
		}
	}else{
		header("Location: index.php");
		exit();
	}

?>