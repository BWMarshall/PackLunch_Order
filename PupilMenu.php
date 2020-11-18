<!DOCTYPE html>
<html>
<head>
  
   <title>Admin Menu</title>
  
</head>
<body>
<?php
session_start(); 
echo("Logged in as: ". $_SESSION['Name'].  "<br>");
if ($_SESSION['Role'] != 0){   
    header("Location:AdminMenu.php");
}elseif (!isset($_SESSION['Name'])) {
  header("Location:Login.php");
}
?>
<br>
<!-- <form action="CreateUsers.php" method="get">
  <input type="submit" value="Add Users">
</form> -->
<br>

<form action="Logout.php" method="get">
  <input type="submit" value="Log out">
</form>



</body>
</html>