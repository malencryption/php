<?php
session_start();

require 'functions.php';

// if($_GET['register'] == 'Register') {
// 	include 'register.php'
// 	exit;
// }	
// elseif($_POST['submit'] == 'register') {
// 	//get values to register
// 		$fname = htmlspecialchars($_POST['fname']);
// 		$lname = htmlspecialchars($_POST['lname']);
// 		$email = htmlspecialchars($_POST['email']);
// 		$password = hashPassword($_POST['password']);

// 	$reg = register($fname, $lname, $email, $password);
// 		if($reg){
// 			//successful register

// 		}
// 	else {
// 		//failed register

// 	}
// }
// else
	if (isset($_GET['busName']) && $_GET['busName'] != ''){
	$busName = $_GET['busName'];
	echo $busName;
	$business=getBus($busName);

	if ($business) {
		echo 'success';
		$busName = $business['name'];
		$busDesc = $business['description'];
		$invId = $business['inventoryId'];
		$items = getItems($invId);
		if($items){
		include 'view.php';
		exit;
		}
		else {
			$error = 'No items found';
			include 'view.php';
			exit;
		}
	}
	else {
		echo 'business not found';
	}
	
}
elseif ($_GET['action'] == 'select'){
	$business = $_SESSION['business'];
		if ($business) {
			$busName = $business['name'];
			$busDesc = $business['description'];
		}
	include 'selectbus.php';
		exit;
}
elseif ($_SESSION['loggedin'] == 'yes') {
	$email = $_SESSION['user'];
	$business = getBusNames($email);
		$_SESSION['business'] = $business;
		if ($business) {
			$busName = $business['name'];
			$busDesc = $business['description'];
			include 'selectbus.php';
			exit;
		}
		else {
			echo 'could not find business';
		}
	
}
elseif ($_POST['submit'] == 'Login') {
	$email = htmlspecialchars($_POST['email']);
	$pass = $_POST['password'];

	$loginSuccess = login($email, $pass);
	if($loginSuccess) {
		$_SESSION['loggedin'] = 'yes';
		$_SESSION['user'] = $email;
		$business = getBusNames($email);
		$_SESSION['business'] = $business;
		if ($business) {
			$busName = $business['name'];
			$busDesc = $business['description'];

		}
		include 'selectbus.php';
		exit;
	}
	else {
		$error = 'Sorry, the login failed.';
		include 'login.php';
		exit;
	}
}
else {
	//default view
	echo 'default view';
	include 'login.php';
	exit;
}