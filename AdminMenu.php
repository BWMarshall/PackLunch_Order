<!DOCTYPE html>
<html>
<head>
  
   <title>Admin Menu</title>
  
</head>
<body>
<?php
session_start(); 
echo("Logged in as: ". $_SESSION['Name'].  "<br>");

if ($_SESSION['Role'] != 1){   
    header("Location:PupilMenu.php");
} elseif (!isset($_SESSION['Name'])) {   
    header("Location:login.php");
}
?>

<br>
<!---Menu stuff --->
<form action="CreateUsers.php" method="get">
  <input type="submit" value="Add Users">
</form>
<br>

<form action="CreateOrder.php" method="get">
  <input type="submit" value="Create Order">
</form>
<br>

<form action="StockSettings.php" method="get">
  <input type="submit" value="Stock Updates">
</form>
<br>

<form action="Index_VO.php" method="get">
  <input type="submit" value="View Orders">
</form>
<br>

<form action="Logout.php" method="get">
  <input type="submit" value="Log out">
</form>



</body>
</html>