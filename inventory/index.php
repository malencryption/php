<?php
session_start();

require 'functions.php';

	
// if (isset($_SESSION['loggedin'])){
// 	$email = $_SESSION['user'];
// 	$business = getBus($email);
// 		if ($business) {
// 			$busName = $business['name'];
// 			$busDesc = $business['description'];
// 			$invId = $business['inventoryId'];
// 			$items = getItems($invId);
// 			if($items){

// 			}
// 		}
// 	include 'selectbus.php';
// 	exit;
// }
// else 
if ($_POST['submit'] == 'Login') {
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
elseif (isset($_GET['busName']) && $_GET['busName'] != ''){
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
else {
	//default view
	echo 'default view';
	include 'login.php';
	exit;
}