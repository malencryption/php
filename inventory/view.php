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
	    <script src="js/respond.js"></script>
	</head>
	<body>
		<div class="container">
		    <!-- row 1 -->
		    <header class="row">
			    <div class="col-md-6">
			    	<h1>Inventory App</h1>
			    </div>
			</header>
			<?php include 'nav.php';?>
		    <!-- row 3 -->
		    <div class="row">
				<div class="col-md-6">
					<h2>Your Business: <?php echo $busName;?></h2>
			    </div>
			    <div class="col-md-6">
					
			    </div>
		    </div>
		    <!-- row 4 -->
		    <div class="row">
				<div class="col-md-6">
			    	<h3>Your Items: </h3>
			    	<?php 
			    	echo $error;
			    	foreach ($items as $value) {
			    	 	echo '<div><p>' .'Name: ' .$value['name'] .'</p><p>' .'Description: ' .$value['description'] .'</p><p>' .'Price: ' .$value['price'] .'</p><p>' .'Size: ' .$value['size'].'</p></div><br/>';
			    	 } 
			    	 ?>
			    </div>
			    <div class="col-md-6">
			    </div>
		    </div>
		    <!-- row 4 -->
		    <div class="row">
		    	<div class="col-md-6">
					<p class="btn btn-default">
						<a href="invform.php">Take Inventory</a>
					</p>
			    </div>
		    	<div class="col-md-6">
		    	</div>
		    </div>
		</div> <!-- end container -->
		<!-- javascript -->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>