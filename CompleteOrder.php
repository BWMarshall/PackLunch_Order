<!DOCTYPE html> 
<html> 
<head> 


     

    <title>Complete Order</title> 

     

</head> 

<body> 
<?php
session_start(); 
if (!isset($_SESSION['Name']))
{   
    header("Location:login.php");
} 

    $CurrentDate = date("Y-m-d");
    include_once("connection.php"); 
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("DELETE FROM TBL_Orders WHERE Date=:CurrentDate;"); 
    $stmt->bindParam(':CurrentDate', $CurrentDate);    
    $stmt->execute();
    $conn=null;
    header('Location: Index_VO.php');


?> 



</body> 

</html> 