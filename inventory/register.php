<!-- Registration -->
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
							<li><a href="login.php">Login</a></li>';
						}
						?>
					</ul>
			</nav>
		</div>
		<!-- row 2 -->
		<div class="row">
			<div class="col-md-6">
				<h2>Register</h2>
			</div>

		</div>
		<!-- row 3 -->
		<div class="row">
			<div class="col-md-3 col-xs-6">
				<p><?php echo $error; ?></p>
				<form role="form" action="index.php" method="POST">
					<div class="form-group">
						<label for="fname">First Name:</label>
						<input class="form-control" type="text" name="fname" value="<?php echo $fname;?>">
					</div>
					<div class="form-group">
						<label for="lname">Last Name:</lable>
						<input class="form-control" type="text" name="lname" value="<?php echo $lname;?>">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input class="form-control" type="email" name="email" value="<?php echo $email;?>">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input class="form-control" type="password" name="password" >
					</div>
					<button class="btn btn-primary" type="submit" name="submit" value="Register">Register</button>
				</form>
			</div>
			<div class="col-md-3 col-xs-6">
				<p>With Inventory you can keep track of the products in your business! Simply create a business category and add your items. Then you can update the items and their quantities.</p>
			</div>	
		</div>

	</div> <!-- end container -->
	<!-- javascript -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>