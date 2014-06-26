<!-- Inventory Form -->
<?php
session_start(); 
$busName = $_SESSION['busName'];
$items = $_SESSION['items'];

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
		<?php include 'nav.php';?>
		<!-- row 3 -->
		<div class="row">
			<div class="col-md-6">
				<h2>Your Business: <?php echo $busName;?></h2>
				<p class="error"><?php echo $error;?><p>
			</div>
			<div class="col-md-6">

			</div>
		</div>
		<!-- row 4 -->
		<div class="row">
			<div class="col-md-3 col-xs-6 bg-info">
				<h3>Your Items: </h3>
				<p class="error">
				<?php 
				foreach($updated as $value){
					echo "$value<br/>";
				}
				?>
				</p>
				<form role="form" action="index.php" method="POST">
<?php
				foreach ($items as $value) {
					echo "<div class='form-group'><label for='$value[name]'>$value[name] Quantity: </label>" ."<input class='form-control' type='text' name='$value[productId]' value='$value[quantity]'>".'</div>';
				} 
				?>

				<button class="btn btn-primary" type="submit" name="submit" value="Update Inventory">Update Inventory</button>
			</form>
		</div>
		<div class="bg-info col-md-3 col-xs-6 col-lg-offset-1">
			<h3>Add new item</h3>
			<p class="error"><?php echo $itemError;?></p>
			<form role="form" action="index.php" method="POST">
				<div class="form-group">
					<label for="name">Name:</label>
					<input class='form-control' type='text' name='name'/>
				</div>
				<div class="form-group">
					<label for="description">Description: </label>
					<input class='form-control' type='text' name='description'/>
				</div>
				<div class="form-group">
					<label for="price">Price: $</label>
					<input class='form-control' type='text' name='price'/>
				</div>
				<div class="form-group">
					<label for="size">Size: </label>
					<input class='form-control' type='text' name='size'/>
				</div>
				<div class="form-group">
					<label for="quantity">Quantity: </label>
					<input class='form-control' type='text' name='quantity'/>
				</div>
				<button class="btn btn-primary" type="submit" name="submit" value="Add Item">Add Item </button>
			</form>
		</div>
	</div>
</div> <!-- end container -->
<!-- javascript -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>