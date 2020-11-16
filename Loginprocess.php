<?php
session_start();
echo($_POST['Pword']);
echo($_POST['Username']);
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE username =:username");
$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
    echo($row['Password']);
    $hashed= $row['Password'];
    $attempt= $_POST['Pword'];
    if(password_verify($attempt,$hashed)){
        $_SESSION['Role']=$row['Role'];
        $_SESSION['Name']=$_POST['Username'];
        header('Location: Menu.php');
    }else{

        header('Location: Login.php');
    }
}
$conn=null;
?> 
