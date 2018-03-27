<?php 
	session_start();
	if (empty($_SESSION['id_user'])) {
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
			<div class="navbar-header ">
				<a href="dashboard.php" class="navbar-brand">Bincom</a>
				<p class="navbar-text">ICT Provision</p>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="profile.php" >Profile</a></li>
				<li><a href="../logout.php" >Logout</a></li>
			</ul>
		</div>
	</nav>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<?php 
				$sql = "SELECT * FROM activities WHERE id_activity = '$_GET[id]'";
				$result = mysqli_query($db, $sql);

				if($result){
					while ($row = mysqli_fetch_assoc($result)) {
			?>
				<form action="updateToDo.php" method="POST" >
					<div class="form-group">
						<label for="activity" class="control-label">Activity</label>
						<input type="text" class="form-control" name="activity" id="activity" value="<?php echo $row['activity']; ?>" >
					</div>
					<div class="form-group">
						<label for="date" class="control-label">Date</label>
						<input type="date" class="form-control" name="date" id="date" value="<?php echo $row['date']; ?>" >
					</div>
					<div class="form-group">
						<label for="time" class="control-label">Time</label>
						<input type="time" class="form-control" name="time" id="time" value="<?php echo $row['time']; ?>" >
					</div>
					<div class="form-group">
						<label for="act_description" class="control-label">Activity Description</label>
						<textarea name="act_description" id="act_description" cols="20" rows="8" class="form-control">
							<?php echo $row['act_description']; ?>
						</textarea>
					</div>
					<div class="form-group"><input type="hidden" name="id_activity" value="<?php echo $row['id_activity']; ?>" class=""></div>
					<div class="form-group text-center">
						<input type="submit" class="btn btn-success" name="submit" value="Update Activity">
					</div>
				</form>
			<?php
					}
				}else{
					header("Location: dashboard.php");
					exit();
				}
			
		?>
		</div>
			
		</div>
	</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>