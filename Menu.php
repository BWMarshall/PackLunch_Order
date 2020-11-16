<!DOCTYPE html>
<html>
<head>
  
   <title>Menu</title>
  
</head>
<body>
<?php
session_start(); 
echo("Logged in as: ". $_SESSION['Name'].  "<br>");
if (!isset($_SESSION['Name'])){   
    //header("Location:login.php");
}
?>
<br>
<form action="CreateUsers.php" method="get">
  <input type="submit" value="Add Users">
</form>
<br>

<form action="Logout.php" method="get">
  <input type="submit" value="Log out">
</form>



</body>
</html>