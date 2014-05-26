<!-- functions.php -->
<?php
session_start();

echo 'functions: ';
function connInv() {
  $dbHost = "";
  $dbPort = "";
  $dbUser = "";
  $dbPassword = "";
  $dbName = "php_inventory";
  
  $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');
  
  if ($openShiftVar === null || $openShiftVar == ""){
  	//Not in the openshift environment
  	echo "Using local credentials: ";
  	require 'setLocalDb.php';
    }
  else {
      	//In the openshift environment
      	echo "Using openshift credentials: ";

      	$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
      	$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
      	$dbUser = getenv('OPENSHIFT_MYSQL_DB_PORT');
      	$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
  }
  echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br /> \n";

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
    $sql = 'SELECT email, password FROM account WHERE email = :email' ;
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
    return true;
  } else {
    return FALSE;
  }
}
function getBusNames($email){
	$connInv = connInv();
  try {
    $sql = 'SELECT name, description, inventoryId FROM business JOIN account USING (accountId) WHERE email = :email' ;
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
function getBus($email){
	$connInv = connInv();
  try {
    $sql = 'SELECT name, description, inventoryId FROM business JOIN account USING (accountId) WHERE email = :email' ;
    $stmt = $connInv->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_INT);
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
    $sql = 'SELECT p.name, p.description, p.price, p.size FROM product p JOIN inventory i USING (inventoryId) WHERE inventoryId = :invId' ;
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
