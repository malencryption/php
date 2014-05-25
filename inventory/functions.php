<!-- functions.php -->
<?php
session_start();
function connInv() {
	$server = 'localhost';
    $username = 'leesaruz_iClient';
    $password = 'Jd59wMUo';
    $database = 'php_inventory';
    $dsn = "mysql:host=$server; dbname=$database";

    try {
        $connInv = new PDO($dsn, $username, $password);
        return $connInv;
    } catch (PDOException $exc) {
        echo 'Sorry, the connection could not be built';
        exit;
    }

    if (is_object($connInv)) {
        return $connInv;
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