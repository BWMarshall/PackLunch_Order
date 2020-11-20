<!DOCTYPE html> 
<html> 
<head> 


     

    <title>Create Stock</title> 

     

</head> 

<body> 
<?php
session_start(); 
if (!isset($_SESSION['Name']))
{   
    header("Location:login.php");
} 


    include_once("connection.php"); 
    switch($_POST["type"]){
        case "SW":
            $type=0;
            break;
        case "SN":
            $type=1;
            break;
        case "DK":
            $type=2;
            break;
    }
    $rol = 0;
    echo $type;
    echo("<br>");
    echo $_POST["itemname"]."<br>"; 
    echo $_POST["avaliability"]."<br>"; 
    echo $_POST["type"]."<br>"; 
    print_r($_POST);



    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("INSERT INTO tbl_mealoptions (FoodID,ItemName,ItemType,Availability,ReorderLevel)VALUES
    (Null,:itemname,:itemtype,:avaliability,:rol)");
        
    $stmt->bindParam(':itemname', $_POST["itemname"]);    
    $stmt->bindParam(':avaliability', $_POST["avaliability"]);
    $stmt->bindParam(':itemtype', $type);
    $stmt->bindParam(':rol', $rol);
    $stmt->execute();
    $conn=null;
    header('Location: StockSettings.php');
?> 


</body> 

</html> 