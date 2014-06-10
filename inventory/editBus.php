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
			    	<h1>Edit Your <?php echo $busName;?> Business</h1>
			    </div>
		    </header>
		    <!-- row 2 -->
		    <?php include 'nav.php';?>
		    <!-- row 3 -->
		    <div class="row">
				<div class="col-md-6">
					<h2>Your <?php echo $busName;?> Business: </h2>
					<p class="error"><?php 
					echo $error;
					?>
			 		</p>
			    	<form role="form" method="POST" action="index.php">
			    		<div class="form-group">
			    			<label for="name">Name:</label>
			    			<input class="form-control" type="text" name="name" value="<?php echo $busName;?>">
			    		</div>
			    		<div class="form-group">
			    			<label for="description">Description: </label>
			    			<input class="form-control" type="text" name="description" value="<?php echo $busDesc;?>">
			    		</div>
			    		<button class="btn btn-primary" type="submit" name="submit" value="Edit Business">Edit Business</button>
			    	</form>
			    </div>
		</div> <!-- end container -->
		<!-- javascript -->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>