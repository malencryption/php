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
if ($_POST['submit'] === "Update Inventory"){
	$quantities = array();
	$names = array();
	$updated = array();
	$items = $_SESSION['items'];
	// var_dump($_SESSION);
	// var_dump($_POST);
	foreach ($items as $value){
		$quantities[] = $_POST[$value['productId']];
		$ids[] = $value['productId'];
		$names[] = $value['name'];
	}
	// var_dump($quantities);
	// var_dump($ids);
	$i = 0;
	foreach ($ids as $value) {
		$id = $value;

		$quantity = $quantities[$i];
		$product = $names[$i];
		// echo $product;
		$i++;
		$invUpdate = updateQuantity($id, $quantity);
		if ($invUpdate) {
			$updated[] = "$product updated"; 
		}
		else {
			$updated[] = "$product not updated";
		}
	}
	// var_dump($updated);
	// $ids = 1;
	// $quantities = 5;
	// $invUpdate = updateQuantity($ids, $quantities);
	// $invUpdate = updateInv($ids, $quantities);

	
		$busName = $_SESSION['busName'];
		$business=getBus($busName);

		if ($business) {
			$invId = $business['inventoryId'];
			$items = getItems($invId);
			$_SESSION['items'] = $items;
			if($items){
				include 'invform.php';
				exit;
			}
			else {
				$error = 'could not get items';
			}
		}
		else {
			$error = 'could not find business';
		}
	include 'invform.php';
		exit;
}

	if (isset($_GET['busName']) && $_GET['busName'] != ''){
		$busName = $_GET['busName'];
		$_SESSION['busName'] = $busName;
		$business=getBus($busName);

		if ($business) {
			$busName = $business['name'];
			$busDesc = $business['description'];
			$invId = $business['inventoryId'];
			$items = getItems($invId);
			$_SESSION['items'] = $items;
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