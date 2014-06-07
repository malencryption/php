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
			    	<h1>Create/Manage a Business</h1>
			    </div>
		    </header>
		    <!-- row 2 -->
		    <?php include 'nav.php';?>
		    <!-- row 3 -->
		    <div class="row">
				<div class="col-md-6">
					<h2>Your Businesses: </h2>
					<?php 
					echo $error;
					foreach ($business as $value) {
						echo '<h3>' .$value['name'] .'</h3><p>'.$value['description'] .'</p><p class="btn btn-default" >' ."<a href='?busName=$value[name]'>View inventory for $value[name]</a></p><br/><br/>" .'<p class="btn btn-default" >' ."<a href='?action=edit&busName=$value[name]'>Edit $value[name]</a></p>" .'<p class="btn btn-default" >' ."<a href='?action=delete&busName=$value[name]'>Delete $value[name]</a></p><br/><br/>";
					} ?>
				    </div>
			    <div class="col-md-6">
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