<!-- login page -->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inventory</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<script src="js/respond.js"></script>
</head>
<body>
	<div class="container">
		<!-- row 1 -->
		<header class="row">
			<div class="col-md-6">
				<p class="little-head">Welcome to the</p>
				<h1>Inventory App</h1>
			</div>
		</header>
		<div class="row">
			<nav class="nav nav-tabs">
					<ul class="nav nav-tabs">
						<?php
						if ($_SESSION['loggedin'] == 'yes') {
							echo '<li><a href="index.php?action=select">Select Business</a></li>
							<li><a href="logout.php">Logout</a></li>';
						}
						else {
							echo '<li><a href="welcome.php">Home</a></li>
							<li class="active"><a href="login.php">Login</a></li>';
						}
						?>
					</ul>
			</nav>
		</div>
		<!-- row 2 -->
		<div class="row">
			
			<div class="col-md-4">
				<h2>Login</h2>
				<p><?php echo $error;?></p>
				<form role="form" action="index.php" method="POST">
					Email: <input type="email" name="email"><br/><br/>
					Password: <input type="password" name="password"><br/><br/>
					<button class="btn btn-primary" type="submit" name="submit" value="Login">Login</button>
				</form>
			</div>
			<div class="col-md-4">
				<h2>Register</h2>
				<p>With Inventory you can keep track of the products in your business! Simply create a business category and add your items. Then you can update the items and their quantities with ease!</p>
				<p>Don't have an account yet? Go ahead and click Register to get started!</p>
				<form action='index.php'method='GET'>
					<button class="btn btn-primary" type="submit" name="register" value="Register">Register</button
				</form>
			</div>
			<div class="col-md-4">
				<!-- <p class="image"><img src="img/lock.jpg" alt="lock"></p> -->
			</div>	
		</div>

	</div> <!-- end container -->
	<!-- javascript -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>