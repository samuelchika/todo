<?php 
session_start();
if(empty($_SESSION['id_user'])){
	header("Location: dashboard.php");
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
			<div class="navbar-header">
				<a href="dashboard.php" class="navbar-brand">Bincom</a>
				<p class="navbar-text">ICT Provision</p>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="manage.php" >Manage Activies</a></li>
				<li><a href="profile.php" >Profile</a></li>
				<li><a href="../logout.php" >Logout</a></li>
			</ul>
		</div>
	</nav>
	
	<div class="container">
		<div class="row">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<th>Activity</th>
						<th>Date</th>
						<th>Time</th>
						<th>Activity Description</th>
						<th>Action</th>
					</thead>
					<?php  

					$sql = "SELECT * FROM activities WHERE id_user = '$_SESSION[id_user]'";
					$result = mysqli_query($db, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
					?>
						<tbody>
							<td> <?php echo $row['activity']; ?> </td>
							<td> <?php echo date("d-M-Y", strtotime($row['date'])); ?> </td>
							<td> <?php echo $row['time']; ?> </td>
							<td> <?php echo $row['act_description']; ?> </td>
							<td> <a href="editToDo.php?id=<?php echo $row['id_activity']; ?>">Edit</a> | 
								<a href="deleteToDo.php?id=<?php echo $row['id_activity']; ?>">Delete</a>
							</td>
						</tbody>
					<?php
						}
					}

					?>
					
				</table>
			</div>
		</div>
	</div>
	
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>