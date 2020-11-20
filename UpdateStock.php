<!DOCTYPE html> 
<html> 
<head> 


     

    <title>Update Stock</title> 

     

</head> 

<body> 
<?php
session_start(); 
if (!isset($_SESSION['Name']))
{   
    header("Location:login.php");
} 


    include_once("connection.php"); 
    echo $_POST["foodid"]."<br>"; 
    echo $_POST["newa"]."<br>"; 
    print_r($_POST);

    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("UPDATE Tbl_mealoptions SET Availability = :newa WHERE FoodID = :itemid;");
        
    $stmt->bindParam(':itemid', $_POST["foodid"]);    
    $stmt->bindParam(':newa', $_POST["newa"]);
    $stmt->execute();
    $conn=null;
    header('Location: StockSettings.php');
?> 

</body> 

</html> 