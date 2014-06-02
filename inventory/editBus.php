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
					<?php 
					echo $error;
					?>
			 
			    	<form method="POST" action="index.php">
			    		Name: <input type="text" name="name" value="<?php echo $busName;?>"><br /><br />
			    		Description: <input type="text" name="description" value="<?php echo $busDesc;?>"><br /><br/>
			    		<input type="submit" name="submit" value="Edit Business">
			    	</form>
			    </div>
		</div> <!-- end container -->
		<!-- javascript -->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>