<?php 
	session_start();
	if (empty($_SESSION['id_user'])) {
		header("Location: ../index.php");
		exit();
	}

	require_once("../include/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bincom</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/`font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header ">
				<a href="dashboard.php" class="navbar-brand active">Bincom</a>
				<p class="navbar-text">ICT Provision</p>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="manageToDo.php" >Manage Activies</a></li>
				<li><a href="profile.php" >Profile</a></li>
				<li><a href="../logout.php" >Logout</a></li>
			</ul>
		</div>
	</nav>
	<?php 
		if(isset($_SESSION["update_successfull"])){
		?>
			<div class="container">
				<div class="row">
					<div class="alert alert-success">
						Profile Updated Successfully
					</div>
			</div>
		<?php
		unset($_SESSION["update_successfull"]);}
	?>

	<?php 
		if(isset($_SESSION["activity_registration_successfull"])){
		?>
			<div class="container">
				<div class="row">
					<div class="alert alert-success">
						Activity Created Successfully
					</div>
			</div>
		<?php
		unset($_SESSION["activity_registration_successfull"]);}
	?>

	<?php 
		if(isset($_SESSION["activity_registration_unsuccessfull"])){
		?>
			<div class="container">
				<div class="row">
					<div class="alert alert-danger">
						Activity Creation Unsuccessfully
					</div>
				</div>
			</div>
		<?php
		unset($_SESSION["activity_registration_unsuccessfull"]);}
	?>	

	<?php 
		if(isset($_SESSION["activity_deleted_successfull"])){
		?>
			<div class="container">
				<div class="row">
					<div class="alert alert-danger">
						Activity Deleted Successfully
					</div>
				</div>
			</div>
		<?php
		unset($_SESSION["activity_deleted_successfull"]);}
	?>


	<div class="container">
		<div class="row">
			<?php 
				echo $_SESSION['name'];

			?>
			<a href="createToDo.php" class="btn btn-success">Create Activity</a>
		</div>
	</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>