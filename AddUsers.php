<!DOCTYPE html> 
<html> 
<head> 


     

    <title>Page title</title> 

     

</head> 

<body> 
<?php
/* session_start(); 
if (!isset($_SESSION['name']))
{   
    header("Location:login.php");
} */


    include_once("connection.php"); 
    switch($_POST["role"]){
        case "Pupil":
            $role=0;
            break;
        case "Admin":
            $role=1;
            break;
    }

    echo $role;
    echo $_POST["username"]."<br>"; 
    echo $_POST["password"]."<br>"; 
    echo $_POST["forename"]."<br>"; 
    echo $_POST["house"]."<br>"; 
    echo $_POST["year"]."<br>"; 
    echo $_POST["role"]."<br>"; 
    echo $role;
    print_r($_POST);
    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);


    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("INSERT INTO tbl_users (Username,Password,Forename,Surname,House,Year,Role)VALUES
    (:username,:password,:forename,:surname,:house,:year,:role)");
        
    $stmt->bindParam(':username', $_POST["username"]);    
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':house', $_POST["house"]);
    $stmt->bindParam(':year', $_POST["year"]);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':role', $role);
    $stmt->execute();
    $conn=null;
    header('Location: CreateUsers.php');
?> 
<!-- <br>
<form action="Menu.php" method="get">
  <input type="submit" value="To Menu">
</form>
<br>   -->

</body> 

</html> 