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
	    <script src="js/respond.js"></script>
	</head>
	<body>
		<div class="container">
		    <!-- row 1 -->
		    <header class="row">
			    <div class="col-md-6">
			    	<h1>Edit Item </h1>
			    </div>
		    </header>
		    <!-- row 2 -->
		    <?php include 'nav.php';?>
		    <!-- row 3 -->
		    <div class="row">
				<div class="col-md-6">
					<h2> <?php echo $name;?></h2>
					<?php 
					echo $error;
					?>
			 
			    	<form method="POST" action="index.php">
			    		Name: <input type="text" name="name" value="<?php echo $name;?>"><br /><br />
			    		Description: <input type="text" name="description" value="<?php echo $description;?>"><br /><br/>
			    		Price: <input type="text" name="price" value="<?php echo $price;?>"><br /><br/>
			    		Size: <input type="text" name="size" value="<?php echo $size;?>"><br /><br/>
			    		<input type="submit" name="submit" value="Update Item">
			    	</form>
			    </div>
		</div> <!-- end container -->
		<!-- javascript -->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>