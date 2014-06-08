<!-- select business -->
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
		<!-- row 2 -->
		<div class="row">
			<nav class="nav nav-tabs">
				<ul class="nav nav-tabs">
					<?php
					if ($_SESSION['loggedin'] == 'yes') {
						echo '<li class="active"><a href="index.php?action=select">Select Business</a></li>
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
		<!-- row 3 -->
		<div class="row">
			<div class="col-md-6 col-xs-6">
				<h2>Create/Manage Your Businesses: </h2>
				<p class="error"><?php echo $error;?><p>
				</div>
			</div>
			<!-- row 4 -->
			<div class="row">
				<?php 
				foreach ($business as $value) {
					echo '<div class="col-md-3 col-xs-6 bg-info"><h3>' .$value['name'] .'</h3><p>'.$value['description'] .'</p><p>' ."<a href='?busName=$value[name]' class='btn btn-info'>View inventory</a></p>" .'<p>' ."<a href='?action=edit&busName=$value[name]' class='btn btn-info'>Edit $value[name]</a></p>" .'<p>' ."<a href='?action=delete&busName=$value[name]' class='btn btn-danger'>Delete $value[name]</a></p></div>";
				} ?>
				<div class="col-md-3 col-xs-6 bg-info">
					<h3>Add a business:</h3>
					<form role="form" method="POST" action="index.php">
						<div class="form-group">
							<label for="name">Name:</label>
							<input class="form-control" type="text" name="name">
						</div>
						<div class="form-group">
							<label for="description">Description:</label>
							<input class="form-control" type="text" name="description">
						</div>
						<button class="btn btn-primary" type="submit" name="submit" value="Add Business">Add Business</button>
					</form>
				</div>
			</div>
		</div> <!-- end container -->
		<!-- javascript -->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	</html>