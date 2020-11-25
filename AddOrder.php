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
  

    ///Reducing the availability by 1 for each item ordered
    //SW -------------------------------------------------------------------------------------
    $stmt = $conn->prepare("SELECT Availability from tbl_mealoptions WHERE FoodID = :swid");
    $stmt->bindParam(':swid', $_POST["SWid"]);   
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $SWNA = $row["Availability"] - 1;
    }
    echo($SWNA);

    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("UPDATE Tbl_mealoptions SET Availability = :swna WHERE FoodID = :swid");
    $stmt->bindParam(':swid', $_POST["SWid"]);
    $stmt->bindParam(':swna', $SWNA);    
    $stmt->execute();


    //SN ----------------------------------------------------------------------------
    $stmt = $conn->prepare("SELECT Availability from tbl_mealoptions WHERE FoodID = :snid");
    $stmt->bindParam(':snid', $_POST["SNid"]);   
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $SWNA = $row["Availability"] - 1;
    }
    echo($SWNA);

    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("UPDATE Tbl_mealoptions SET Availability = :snna WHERE FoodID = :snid");
    $stmt->bindParam(':snid', $_POST["SNid"]);
    $stmt->bindParam(':snna', $SWNA);    
    $stmt->execute();

    //DK ----------------------------------------------------------------------------
    $stmt = $conn->prepare("SELECT Availability from tbl_mealoptions WHERE FoodID = :dkid");
    $stmt->bindParam(':dkid', $_POST["DKid"]);   
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $SWNA = $row["Availability"] - 1;
    }
    echo($SWNA);

    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("UPDATE Tbl_mealoptions SET Availability = :dkna WHERE FoodID = :dkid");
    $stmt->bindParam(':dkid', $_POST["DKid"]);
    $stmt->bindParam(':dkna', $SWNA);    
    $stmt->execute();
    $conn=null;

    header('Location: CreateOrder.php');
?> 


</body> 

</html> 