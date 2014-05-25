<!-- business view -->
<?php
session_start;
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
			    	<h1>Create/Manage a Business</h1>
			    </div>
			    <div class="col-md-1">
			    	<p class="btn btn-default"><a href="selectbus.php">Select Business</a></p>
			    </div>
			    <div class="col-md-1 col-md-offset-1" >
			    	<p class="btn btn-default"><a href="logout.php">Logout</a>
			    	</p>
			    </div>
		    </header>
		    <!-- row 2 -->
		    <div class="row">
				<div class="col-md-6">
					<h2>Your Business: <?php echo $busName;?></h2>
					<p><?php echo $busDesc?></p>
			    </div>
			    <div class="col-md-6">
					<p class="btn btn-default"><a href="index.php">View inventory for <?php echo $busName;?> </a><?php ?></p>
			    </div>
		    </div>
		</div> <!-- end container -->
		<!-- javascript -->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>