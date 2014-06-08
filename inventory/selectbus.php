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
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="glyphicon glyphicon-arrow-down"></span>
						MENU
					</button>
				</div>
				<div class="collapse navbar-collapse" id="collapse">
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
				</div>
			</nav>
		</div>
		<!-- row 3 -->
		<div class="row">
			<div class="col-md-4">
				<h2>Create/Manage Your Businesses: </h2>
				<?php 
				echo $error;
				foreach ($business as $value) {
					echo '<h3>' .$value['name'] .'</h3><p>'.$value['description'] .'</p><p>' ."<a href='?busName=$value[name]' class='btn btn-info'>View inventory for $value[name]</a></p>" .'<p>' ."<a href='?action=edit&busName=$value[name]' class='btn btn-primary'>Edit $value[name]</a></p>" .'<p>' ."<a href='?action=delete&busName=$value[name]' class='btn btn-danger'>Delete $value[name]</a></p><br/><br/>";
				} ?>
			</div>
			<div class="col-md-4">
				<h2>Add a business:</h2>
				<form method="POST" action="index.php">
					Name: <input type="text" name="name"><br /><br />
					Description: <input type="text" name="description"><br /><br/>
					<input type="submit" name="submit" value="Add Business">
				</form>
			</div>
		</div>
	</div> <!-- end container -->
	<!-- javascript -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>