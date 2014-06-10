<!-- main inventory view -->
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
			<div class="col-md-6 col-xs-6">
				<p class="little-head">Welcome to the</p>
				<h1>Inventory App</h1>
			</div>
		</header>
		<?php include 'nav.php';?>
		<!-- row 3 -->
		<div class="row">
			<div class="col-md-6">
				<h2>Your Business: <?php echo $busName;?></h2>
				<h3>Your Items: </h3>
				<p class="error"><?php echo $error;?><p>
			</div>
		</div>
		<!-- row 4 -->
		<div class="row">
			<?php
			foreach ($items as $value) {
				echo '<div class="col-md-3 col-xs-6 bg-info"><p>' .'Name: ' .$value['name'] .'</p><p>' .'Description: ' .$value['description'] .'</p><p>' .'Price: ' .$value['price'] .'</p><p>' .'Size: ' .$value['size'].'</p><p><a class="btn btn-info" href=?action=editItem&itemId=' .$value['productId'] .'>' .'Edit: ' .$value['name'] .'</a></p></div><br/>';
			} 
			?>
		</div>
		<!-- row 5 -->
		<div class="row">
			<div class="col-md-3 col-xs-3">
				<p>
					<a class="btn btn-primary" href="invform.php">Take Inventory</a>
				</p>
			</div>
		</div>
	</div> <!-- end container -->
	<!-- javascript -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>