<!DOCTYPE html>
<html>
<head>
    
    <title>Create order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Stylesheet.CSS">
  
</head>
<body class="bg">
    <div class="container bg-light text-dark   text-center  pb-sm-5" >
        <h1> Create Order </h1>
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
            <button type="submit" class="btn btn-primary">Order</button>
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
            <button type="submit" class="btn btn-primary">Menu</button>
        </form>
    </div>



</body>
</html>