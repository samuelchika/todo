<?php 
session_start();
if(isset($_SESSION['id_user'])){
	header("user/dashboard");
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bincom</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/`font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Bincom</a>
				<p class="navbar-text">ICT Provision</p>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="" data-toggle="modal" data-target="#modal-register">Register</a></li>
				<li><a href="" data-toggle="modal" data-target="#modal-login">Login</a></li>
				<li><a href=""  data-toggle="modal" data-target="#modal-contactus">Contact Us</a></li>
			</ul>
		</div>
	</nav>
	
			<!--modal register-->		
		<div class="modal" id="modal-register">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h3 class="text-center">Login</h3>
			</div>
			<div class="modal-body">
				<form action="checkregister.php" class="form-horizontal" method="POST" onsubmit="return(passCheck())">
					<div class="control-group">
						<label for="firstname" class="control-label">Firstname</label>
						<div class="control">
							<input type="text" name="firstname" id="firstname" required placeholder="firstname">
						</div>
					</div>

					<div class="control-group">
						<label for="lastname" class="control-label">Lastname</label>
						<div class="control">
							<input type="text" name="lastname" id="lastname" required placeholder="Lastname">
						</div>
					</div>

					<div class="control-group">
						<label for="email" class="control-label">Email</label>
						<div class="control">
							<input type="email" name="email" id="email" required placeholder="Email">
						</div>
					</div>

					<div class="control-group">
						<label for="password" class="control-label">Password</label>
						<div class="control">
							<input type="password" name="password" id="password" required placeholder="Password">
						</div>
					</div>

					<div class="control-group">
						<label for="confirm_password" class="control-label">Confirm Password</label>
						<div class="control">
							<input type="password" name="confirm_password" id="confirm_password" required placeholder="Confirm Password">
						</div>
					</div>

					

					<div class="control-group">
						
						<div class="control">
							<input type="submit" name="submit" value="Register" class="btn btn-success" >
						</div>
					</div>

					
				</form>
			</div>
			<div class="modal-footer">
				<a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
			</div>
		</div>
			<!--modal login-->
		<div class="modal" id="modal-login">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h3 class="text-center">Login</h3>
			</div>
			<div class="modal-body">
				<form action="checklogin.php" class="form-horizontal" method="POST">
					<div class="control-group">
						<label for="email" class="control-label">Email</label>
						<div class="control">
							<input type="email" name="email" id="email" required placeholder="Email">
						</div>
					</div>

					<div class="control-group">
						<label for="password" class="control-label">Password</label>
						<div class="control">
							<input type="password" name="password" id="password" required placeholder="Password">
						</div>
					</div>

					<div class="control-group">
						<div class="control">
							<input type="submit" name="submit" value="Login" class="btn btn-success" >
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
			</div>
		</div>

			<!--modal contactus-->
		<div class="modal" id="modal-contactus">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h3 class="text-center">Login</h3>
			</div>
			<div class="modal-body">
				<form action="contactus.php" class="form-horizontal" method="POST">
					<div class="control-group">
						<label for="email" class="control-label">Email</label>
						<div class="control">
							<input type="email" name="email" id="email" required placeholder="Email">
						</div>
					</div>

					<div class="control-group">
						<label for="password" class="control-label">Name</label>
						<div class="control">
							<input type="password" name="password" id="password" required placeholder="Password">
						</div>
					</div>

					<div class="control-group">
						<label for="message" class="control-label">Message</label>
						<div class="control">
							<textarea name="message" id="message" required placeholder="Message" cols="20" rows="5"></textarea>
						</div>
					</div>

					<div class="control-group">
						<div class="control">
							<input type="submit" name="submit" value="Send Message" class="btn btn-success" >
						</div>
					</div>

					
				</form>
			</div>
			<div class="modal-footer">
				<a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
			</div>
		</div>


	<?php 
	if (isset($_SESSION["registration_successfull"])) {

	?>
		<div class="row">
			<div class="alert alert-success">
				<p class="text-center">Account Created Successfully. Login In to Create Your ToDo list </p>
			</div>
		</div>
	<?php
	unset($_SESSION["registration_successfull"]);}
	?>

	<?php 
	if (isset($_SESSION["login_unsuccessfull"])) {

	?>
		<div class="row">
			<div class="alert alert-success">
				<p class="text-center">Invalid Email/Password </p>
			</div>
		</div>
	<?php
	unset($_SESSION["login_unsuccessfull"]);}
	?>
	
	
	<div class="container">
		<div class="row" id="loginError">
			
		</div>
	</div>

	<div class="container">
		<div class="row well">
			<h2 class="text-center">Welcome to Bincom ICT ToDo Services</h2>
			
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h4 class="text-center">Identify Yourself To Start Creating ToDo List</h4>
				<a href="" class="btn btn-success" data-toggle="modal" data-target="#modal-login">Login</a>
				<a href="" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-register">Register</a>
			</div>
		</div>
	</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>