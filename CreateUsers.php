<!DOCTYPE html>
<html>
<head>
    
    <title>Create User</title>
    
  
</head>
<body>
    
    <form action="AddUsers.php" method = "post"> 
        Username:<input type="text" name="username"><br>
        Password:<input type="password" name="password"><br>  
        First name:<input type="text" name="forename"><br> 
        Last name:<input type="text" name="surname"><br> 
         House:<input type="text" name="house"><br> 
        Year:<input type="text" name="year"><br> 
        <!--Next 3 lines create a radio button which we can use to select the user role--> 
        <input type="radio" name="role" value="Pupil" checked> Pupil<br> 
        <input type="radio" name="role" value="Admin"> Admin<br> 
        <input type="submit" value="Create User">  
    </form>  


    <br>
    <?php

   /*  session_start(); 
    echo("logged in as: ". $_SESSION['name'].  "<br>");
    if (!isset($_SESSION['name']))
    {   
        header("Location:login.php");
    } */


    include_once('connection.php');
    $stmt = $conn->prepare("SELECT * FROM Tbl_Users");
    $stmt->execute();
    echo "<br>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo($row["Forename"].' '.$row["Surname"]."  ".$row["House"]."<br>");
    }
    ?>



</body>
</html>