<!DOCTYPE html>
<html>
<head>
    
    <title>Stock Settings</title>
    
  
</head>
<body>
    <h3>Create New Item </h3> 
    <form action="CreateStock.php" method = "post"> 
        Name:<input type="text" name="itemname"><br>
        Avaliability:<input type="text" name="avaliability"><br> 
        <!--Next 3 lines create a radio button which we can use to select the user role--> 
        <input type="radio" name="type" value="SW" checked> Sandwich<br> 
        <input type="radio" name="type" value="SN"> Snack<br> 
        <input type="radio" name="type" value="DK"> Drink<br>
        <input type="submit" value="Create Stock">  
    </form>  


    <br>
    <h3> Change Availiability </h3>
    <form action="UpdateStock.php" method = "post">
        <select name = "foodid">
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM Tbl_MealOptions ");
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo('<option value='.$row["FoodID"].'>'.$row["ItemName"].', '.$row["Availability"].'</option>');
        }
        ?>
        </select>
        Avaliability:<input Type="text" name= "newa">
        <input type="submit" value="Update Availiability"> 
    </form>

    <br>
    <br>

    <?php

    session_start(); 
    echo("logged in as: ". $_SESSION['Name'].  "<br>");
    if ($_SESSION['Role'] != 1) {   
        header("Location:PupilMenu.php");
    }


    $stmt = $conn->prepare("SELECT * FROM Tbl_MealOptions");
    $stmt->execute();
    echo "<br>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo($row["ItemName"].' Type: '.$row["ItemType"]." Availability: ".$row["Availability"]. " Re-order Level: ".$row["ReorderLevel"]."<br>");
    }
    ?>



    <!--  back to menu button -->
    <br>
    <form action="AdminMenu.php" method="get">
        <input type="submit" value="Menu">
    </form>




</body>
</html>