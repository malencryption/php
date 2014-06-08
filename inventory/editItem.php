<!-- edit item -->
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
				<div class="col-md-6">
					<p class="little-head">Welcome to the</p>
					<h1>Inventory App</h1>
				</div> 
			</div>
		</header>
		<!-- row 2 -->
		<?php include 'nav.php';?>
		<!-- row 3 -->
		<div class="row">
			<div class="col-md-6 col-xs-6">
				<h2>Edit Item: </h2>

				<p class="error"><?php echo $error;?><p>
			</div>
		</div>
			<!-- row 4 -->
			<div class="row">
				<div class="col-md-6 col-xs-6">
					<h2> <?php echo $name;?></h2>

					<form role="form" method="POST" action="index.php">
						<div class="form-group">
							<label for="name">Name:</label>
							<input class="form-control" type="text" name="name" value="<?php echo $name;?>">
						</div>
						<div class="form-group">
							<label for="description">Description:</label>
							<input class="form-control" type="text" name="description" value="<?php echo $description;?>"/>
						</div>
						<div class="form-group">
							<label for="description">Price: </label>
							<input class="form-control" type="text" name="price" value="<?php echo $price;?>"/>
						</div>
						<div class="form-group">
							<label for="description">Size: </label>
							<input class="form-control" type="text" name="size" value="<?php echo $size;?>"/>
						</div>
						<input type="hidden" name="itemId" value="<?php echo $itemId; ?>"/>
						<button class="btn btn-primary" type="submit" name="submit" value="Update Item">Update Item</button>
					</form>
				</div>
			</div> <!-- end container -->
			<!-- javascript -->
			<script src="http://code.jquery.com/jquery-latest.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</body>
		</html>