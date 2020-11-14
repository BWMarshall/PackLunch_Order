<?php

$servername = 'localhost';
$username = 'root';
$password= '';
//note no Database mentioned here!
try {
 $conn = new PDO("mysql:host=$servername", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "CREATE DATABASE IF NOT EXISTS packlunch";
 $conn->exec($sql);
 //next 3 lines optional only needed really if you want to go on an do more SQL here!
 $sql = "USE packlunch";
 $conn->exec($sql);
 echo "DB created successfully";
}
catch(PDOException $e) {
 echo $sql . "<br>" . $e->getMessage();
}


$stmt = $conn->prepare("DROP TABLE IF EXISTS Tbl_MealOptions;
CREATE TABLE Tbl_MealOptions 
(FoodID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Type TINYINT(1) NOT NULL,
Name VARCHAR(20) NOT NULL,
Avalability INT(4) NOT NULL,
ReorderLevel INT(4) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();



$stmt = $conn->prepare("DROP TABLE IF EXISTS Tbl_Users;
CREATE TABLE Tbl_Users 
(Username VARCHAR(20)  PRIMARY KEY,
Password VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
Surname VARCHAR(20) NOT NULL,
House VARCHAR(20) NOT NULL,
Year INT(4),
Role TINYINT(1))");
$stmt->execute();
$stmt->closeCursor();



$stmt = $conn->prepare("DROP TABLE IF EXISTS Tbl_Orders;
CREATE TABLE Tbl_Orders
(Username VARCHAR(20),
SWID INT(4),
SNID INT(4),
DKID CHAR(4),
Date DATE,
MealMissed TINYINT(1),
PRIMARY KEY(Username,Date,MealMissed))");
$stmt->execute();
$stmt->closeCursor();
?>


