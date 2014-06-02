<!-- functions.php -->
<?php
session_start();

function connInv() {
  $dbHost = "";
  $dbPort = "";
  $dbUser = "";
  $dbPassword = "";
  $dbName = "php_inventory";
  
  $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');
  
  if ($openShiftVar === null || $openShiftVar == ""){
  	//Not in the openshift environment
  	// echo "Using local credentials: ";
  	require 'setLocalDb.php';
    }
  else {
      	//In the openshift environment
      	// echo "Using openshift credentials: ";

      	$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
      	$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
      	$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
      	$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
  }
  // echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br /> \n";

  try {
    $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    return $db;
    } 
    catch (PDOException $exc) {
      echo 'Sorry, the connection could not be built';
      exit;
    }
  if (is_object($db)) {
        return $db;
  } else {
        return FALSE;
  }
}

function login($email, $pass) {
	$connInv = connInv();
  try {
    $sql = 'SELECT email, password, accountId FROM account WHERE email = :email' ;
    $stmt = $connInv->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
    $stmt->closeCursor();
  } catch (PDOException $exc) {
    header('location: ./error.php');
    exit;
  }
  if ($result['password'] == $pass) {
    return $result;
  } else {
    return FALSE;
  }
}
function getBusNames($email){
	$connInv = connInv();
  try {
    $sql = 'SELECT businessId, name, description, inventoryId FROM business JOIN account USING (accountId) WHERE email = :email' ;
    $stmt = $connInv->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $stmt->closeCursor();
  } catch (PDOException $exc) {
    header('location: ./error.php');
    exit;
  }
  if ($result) {
    return $result;
  } else {
    return FALSE;
  }
}
function getBus($busName){
	$connInv = connInv();
  try {
    $sql = 'SELECT businessId, name, description, inventoryId FROM business JOIN account USING (accountId) WHERE name = :name' ;
    $stmt = $connInv->prepare($sql);
    $stmt->bindValue(':name', $busName, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
    $stmt->closeCursor();
  } catch (PDOException $exc) {
    header('location: ./error.php');
    exit;
  }
  if ($result) {
    return $result;
  } else {
    return FALSE;
  }
}

function getItems($invId){
	$connInv = connInv();
  try {
    $sql = 'SELECT p.productId, p.name, p.description, p.price, p.size, p.quantity FROM product p JOIN inventory i USING (inventoryId) WHERE inventoryId = :invId' ;
    $stmt = $connInv->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $stmt->closeCursor();
  } catch (PDOException $exc) {
    header('location: ./error.php');
    exit;
  }
  if ($result) {
    return $result;
  } else {
    return FALSE;
  }
}

function updateInv($itemIds, $quantities){
  $connInv = connInv();
  try {

    $sql = 'UPDATE product SET quantity = :q WHERE productId = :id' ;
    $stmt = $connInv->prepare($sql);
    
    foreach($itemIds as $value) {
      $id = $value;
      echo "id: $id ";
      $i = 0;
      $amount = $quantities[$i];
      echo "amount: $amount ";
    $i++;
    $stmt->bindValue(':q', $amount, PDO::PARAM_INT);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();
    echo "result: $result ";
    if (!$result) break;
    }

    $stmt->closeCursor();
  } catch (PDOException $exc) {
    $errorM = 'fail';
    echo $exc;
    header('location: ./error.php');
    exit;
  }
  if ($result) {
    return $result;
  } else {
    return FALSE;
  }
}

function updateQuantity($id, $quantity){
  $connInv = connInv();
  try {

    $sql = 'UPDATE product SET quantity = :q WHERE productId = :id' ;
    $stmt = $connInv->prepare($sql);
    $stmt->bindValue(':q', $quantity, PDO::PARAM_INT);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();

    echo "result: $result";
  } catch (PDOException $exc) {
    $errorM = 'fail';
    echo $exc;
    header('location: ./error.php');
    exit;
  }
  if ($result) {
    return $result;
  } else {
    return FALSE;
  }
}
function hashPassword($password) {
    $hashed_password = crypt($password, '$5$rounds=5000$runasfastasyoucanforsalt$');
    return $hashed_password;
}

function addBus($name, $description, $accountId){
  $connInv = connInv();
  try {
    $sql = 'INSERT INTO business (name, description, accountId) VALUES (:name, :description, :accountId)' ;
    $stmt = $connInv->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':accountId', $accountId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
  } catch (PDOException $exc) {
    header('location: ./error.php');
    exit;
  }
  if ($result) {
    return true;
  } else {
    return FALSE;
  }
}

function editBus($name, $description, $busId){
  $connInv = connInv();
  try {
    $sql = 'UPDATE business SET name = :name, description = :description WHERE businessId = :busId' ;
    $stmt = $connInv->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':busId', $busId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
  } catch (PDOException $exc) {
    header('location: ./error.php');
    exit;
  }
  if ($result) {
    return true;
  } else {
    return FALSE;
  }
}

function editBusName($name, $busId){
  $connInv = connInv();
  try {
    $sql = 'UPDATE business SET name = :name WHERE businessId = :busId' ;
    $stmt = $connInv->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':busId', $busId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
  } catch (PDOException $exc) {
    header('location: ./error.php');
    exit;
  }
  if ($result) {
    return true;
  } else {
    return FALSE;
  }
}

function editBusDes($description, $busId){
  try {
      $sql = 'UPDATE business SET description = :description WHERE businessId = :busId' ;
      $stmt = $connInv->prepare($sql);
      $stmt->bindValue(':description', $description, PDO::PARAM_STR);
      $stmt->bindValue(':busId', $busId, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->rowCount();
      $stmt->closeCursor();
    } catch (PDOException $exc) {
      header('location: ./error.php');
      exit;
    }

  if ($result) {
    return true;
  } else {
    return FALSE;
  }
}