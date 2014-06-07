<!-- Welcome page -->
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
		<div class="container welcome">
		    <!-- row 1 -->
		    <header class="row">
			    <div class="col-md-6 ">
			    	<p class="little-head">Welcome to the</p>
			    	<h1>Inventory App</h1>
			    </div>
			</header>
			<div class="row">
				
			   <?php include 'nav.php';?>
		    </div>
		    <!-- row 2 -->
		    <div class="row">
		    <div class="col-md-4 ">
				<p>
					<img src="img/warehouse.jpg" alt="warehouse">
				</p>
		    </div>
			<div class="col-md-4 ">
					<p>With Inventory you can keep track of the products in your business! Simply create a business category and add your items. Then you can update the items and their quantities.</p>
					<p>Don't have an account yet? Go ahead and click Register to get started!</p>
					<form action='index.php'method='GET'>
						<input type="submit" name="register" value="Register">
					</form>
				</div>	
			</div>
			<!-- row 3 -->
			<div class="row">
				
			   <?php include 'nav.php';?>
		    </div>
		    
		</div> <!-- end container -->
		<!-- javascript -->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>