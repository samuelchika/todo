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
				$sql = "SELECT * FROM users WHERE id_user = '$_SESSION[id_user]'";
				$result = mysqli_query($db, $sql);

				if($result){
					while ($row = mysqli_fetch_assoc($result)) {
			?>
				<form action="update.php"  method="POST">
					<div class="form-group">
						<label for="firstname" class="control-label">Firstname</label>
						<div>
							<input type="text"  class="form-control" name="firstname" id="firstname" value="<?php echo $row['firstname']; ?>" required placeholder="firstname">
						</div>
					</div>

					<div class="form-group">
						<label for="lastname" class="control-label">Lastname</label>
						<div >
							<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $row['lastname']; ?>" required placeholder="Lastname">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="control-label">Email</label>
						<div >
							<input type="email" class="form-control"  name="email" id="email" value="<?php echo $row['email']; ?>" readonly placeholder="Email">
						</div>
					</div>

					

					<div class="form-group">
						
						<div class="text-center">
							<input type="submit" name="submit" value="Update" class="btn btn-success" onclick="return(passCheck())">
						</div>
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