<!DOCTYPE html>
<html>
<head>
    
    <title>Create order</title>
    
  
</head>
<body>

    <h3> Create Order </h3>
    <form action="AddOrder.php" method = "post">
        <select name = "SWid">
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM Tbl_MealOptions WHERE ItemType = 0 And Availability > 0");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo('<option value='.$row["FoodID"].'>'.$row["ItemName"].', '.$row["Availability"].'</option>');
        }
        ?>
        </select>
        <select name = "SNid">
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM Tbl_MealOptions WHERE ItemType = 1 And Availability > 0" );
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo('<option value='.$row["FoodID"].'>'.$row["ItemName"].', '.$row["Availability"].'</option>');
        }
        ?>
        </select>
        <select name = "DKid">
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM Tbl_MealOptions WHERE ItemType = 2 And Availability > 0");
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo('<option value='.$row["FoodID"].'>'.$row["ItemName"].', '.$row["Availability"].'</option>');
        }
        ?>
        </select>
        <br>
        date:<input type="date" name="date"><br>
        <!--Next 3 lines create a radio button which we can use to select the user role--> 
        <input type="radio" name="mm" value="0" checked> Breakfast<br> 
        <input type="radio" name="mm" value="1"> Lunch<br> 
        <input type="radio" name="mm" value="2"> Dinner<br> 
        <input type="submit" value="Order">  
    </form>  

    <br>


    <?php

    session_start(); 
    echo("logged in as: ". $_SESSION['Name'].  "<br>");
    if(!isset($_SESSION['Name'])) {   
        header("Location:Login.php");
    }


    /* $stmt = $conn->prepare("SELECT * FROM Tbl_MealOptions");
    $stmt->execute();
    echo "<br>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo($row["ItemName"].' Type: '.$row["ItemType"]." Availability: ".$row["Availability"]. " Re-order Level: ".$row["ReorderLevel"]."<br>");
    } */
    ?>



    <!--  back to menu button -->
    <br>
    <form action="AdminMenu.php" method="get">
        <input type="submit" value="Menu">
    </form>




</body>
</html>