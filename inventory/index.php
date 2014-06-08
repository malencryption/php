<?php
session_start();

require 'functions.php';
// require 'model.php';

if($_POST['submit'] === 'Register') {
	//get values to register
	$fname = htmlspecialchars($_POST['fname']);
	$lname = htmlspecialchars($_POST['lname']);
	$email = htmlspecialchars($_POST['email']);
	$password = hashPassword($_POST['password']);

// echo "$fname, $lname, $email, $password";
	$reg = register($fname, $lname, $email, $password);
	if($reg){
			//successful register
		$error =  'Registration Successful!';
		include 'login.php';
		exit;
	}
	else {
		//failed register
		$error = 'Registration Failed.';
		include 'register.php';
		exit;
	}
}
else if ($_POST['submit'] === 'Add Item'){
	$name = htmlspecialchars($_POST['name']);
	$description = htmlspecialchars($_POST['description']);
	$price = htmlspecialchars($_POST['price']);
	$size = htmlspecialchars($_POST['size']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$invId = $_SESSION['inventoryId'];
	$result = addItem($name, $description, $price, $size, $quantity, $invId);
	if ($result) {
		//Item was added successfully
		$busName = $_SESSION['busName'];
		$business=getBus($busName);

		if ($business) {
			$invId = $business['inventoryId'];
			$items = getItems($invId);
			$_SESSION['items'] = $items;
			$itemError= 'Item Added!';
			include 'invform.php';
			exit;
		}
	}
	else {
		$itemError = 'Item not added...';
		include 'invform.php';
		exit;
	}
}
else if ($_GET['action'] === 'editItem'){
	$itemId = $_GET['itemId'];
	$_SESSION['itemId'] = $itemId;
	$product = getProduct($itemId);
	if ($product){
		$name= $product['name'];
		$description = $product['description'];
		$price = $product['price'];
		$size = $product['size'];
		$quantity = $product['quantity'];
		include 'editItem.php';
		exit;
	}
	else {
		$error = "Product not found";
	}
	
}
elseif ($_POST['submit'] === 'Update Item'){
	$name= $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$size = $_POST['size'];
	$itemId = $_POST['itemId'];
	echo "$name, $description, $price, $size, $itemId";
	$result = updateItem($name, $description, $price, $size, $itemId);
	echo $result;
	if ($result) {
		//Item was updated successfully
		$busName = $_SESSION['busName'];
		$business=getBus($busName);

		if ($business) {
			$invId = $business['inventoryId'];
			$items = getItems($invId);
			$_SESSION['items'] = $items;
			$error= 'Item Added!';
			include 'view.php';
			exit;
		}
		else {
			$error = 'Could not find business';
			include 'selectbus.php';
			exit;
		}
	}
	else {
		$error = 'Item not updated...';
		// $product = getProduct($itemId);
		// if ($product){
		// 	$name= $product['name'];
		// 	$description = $product['description'];
		// 	$price = $product['price'];
		// 	$size = $product['size'];
		// 	$quantity = $product['quantity'];
		include 'editItem.php';
		exit;
		// }
		// else {
		// 	$error = "Product not found";
		// }
		include 'editItem.php';
		exit;
	}
}
else
	if ($_POST['submit'] === 'Edit Business'){
		$name = htmlspecialchars($_POST['name']);
		$description = htmlspecialchars($_POST['description']);
		$busId = $_SESSION['busId'];
		$editBus = editBus($name, $description, $busId);
		echo "$name, $description, $busId";
		if ($editBus) {
			$email = $_SESSION['user'];
			$business = getBusNames($email);
			$_SESSION['business'] = $business;
			if ($business) {
				$busName = $business['name'];
				$busDesc = $business['description'];
				$error= 'Business Updated!';
				include 'selectbus.php';
				exit;
			}
			else {
				$error .= 'Could not load Businesses';
				include 'selectbus.php';
				exit;
			}

		}
		else {
			$error = 'Could not update business';
		}
		include 'editbus.php';
		exit;
	}
	else
		if ($_POST['submit'] === 'Add Business'){
			$name = htmlspecialchars($_POST['name']);
			$description = htmlspecialchars($_POST['description']);
			$accountId = $_SESSION['accountId'];
			$addBus = addBus($name, $description, $accountId);

			if ($addBus) {
				$email = $_SESSION['user'];
				$business = getBusNames($email);
				$_SESSION['business'] = $business;
				if ($business) {
					$busName = $business['name'];
					$busDesc = $business['description'];
					$error= 'Business Added!';
					include 'selectbus.php';
					exit;
				}
				else {
					$error .= 'Could not load Businesses';
					include 'selectbus.php';
					exit;
				}

			}
			else {
				$error = 'Could not add business';
			}
			include 'selectbus.php';
			exit;
		}
		elseif ($_POST['submit'] === "Update Inventory"){
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
				$_SESSION['inventoryId'] = $invId;
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
		else
			if (isset($_GET['busName']) && $_GET['busName'] != ''){
				$busName = $_GET['busName'];
				$_SESSION['busName'] = $busName;
				$business=getBus($busName);

				if ($business) {
					$busName = $business['name'];
					$busDesc = $business['description'];
					$busId = $business['businessId'];
					$invId = $business['inventoryId'];
					$_SESSION['inventoryId'] = $invId;
					$items = getItems($invId);
					$_SESSION['items'] = $items;
					$_SESSION['busId'] = $busId;
					if ($_GET['action'] === 'edit'){
						include 'editBus.php';
						exit;
					}
					elseif ($_GET['action'] === 'delete'){
						$result = deleteBus($busId);
						if ($result) {
							$error = 'Business Deleted';
							$email = $_SESSION['user'];
							$business = getBusNames($email);
							$_SESSION['business'] = $business;
							if ($business) {
								$busName = $business['name'];
								$busDesc = $business['description'];
								$busId = $business['businessId'];
								include 'selectbus.php';
								exit;
							}
							else {
								$error = 'No Businesses found!';
								include 'selectbus.php';
								exit;
							}
						}
						else {
							$error = 'Business could not be deleted';
							include 'selectbus.php';
							exit;
						}
					}
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
					$error = 'No Businesses found!';
					include 'selectbus.php';
							exit;
				}

			}
			else
				if ($_SESSION['loggedin'] == 'yes' || $_GET['action'] == 'select'){
					$email = $_SESSION['user'];
					$business = getBusNames($email);
					$_SESSION['business'] = $business;
					if ($business) {
						$busName = $business['name'];
						$busDesc = $business['description'];
						$busId = $business['businessId'];
						include 'selectbus.php';
						exit;
					}
					else {
						$error = 'No Businesses found!';
						include 'selectbus.php';
						exit;
					}
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


				}
				elseif($_GET['register'] === 'Register') {
					include 'register.php';
					exit;
				}
				else
					if ($_POST['submit'] == 'Login') {
						$email = htmlspecialchars($_POST['email']);
						$pass = hashPassword($_POST['password']);

						$loginSuccess = login($email, $pass);
						if($loginSuccess) {
							$_SESSION['loggedin'] = 'yes';
							$_SESSION['user'] = $email;
							$_SESSION['accountId'] = $loginSuccess['accountId'];
							$business = getBusNames($email);
							$_SESSION['business'] = $business;
							if ($business) {
								$busName = $business['name'];
								$busDesc = $business['description'];
								$busId = $business['businessId'];

							}
							else {
								$error = "No Businesses found!";
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
	// //default view
	// 					var_dump($_POST);
						// echo 'default view';
						include 'welcome.php';
						exit;
					}
					?>