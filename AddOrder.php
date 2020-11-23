<!DOCTYPE html> 
<html> 
<head> 


     

    <title>adding Order</title> 

     

</head> 

<body> 
<?php
session_start(); 
if (!isset($_SESSION['Name']))
{   
    header("Location:login.php");
} 


    include_once("connection.php"); 

    
    echo $_SESSION["Name"]."<br>"; 
    echo $_POST["SWid"]."<br>"; 
    echo $_POST["SNid"]."<br>"; 
    echo $_POST["DKid"]."<br>"; 
    echo $_POST["date"]."<br>"; 
    echo $_POST["mm"]."<br>";  
    print_r($_POST);


    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("INSERT INTO tbl_orders (Username,SWID,SNID,DKID,Date,MealMissed)VALUES
    (:username,:swid,:snid,:dkid,:date,:mealm)");
        
    $stmt->bindParam(':username', $_SESSION["Name"]);    
    $stmt->bindParam(':swid', $_POST["SWid"]);
    $stmt->bindParam(':snid', $_POST["SNid"]);
    $stmt->bindParam(':dkid', $_POST["DKid"]);
    $stmt->bindParam(':date', $_POST["date"]);
    $stmt->bindParam(':mealm', $_POST["mm"]);
    $stmt->execute();
    $conn=null;
    header('Location: CreateOrder.php');
?> 


</body> 

</html> 