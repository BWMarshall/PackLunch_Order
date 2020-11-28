<?php
///Session Stuff -----------------------:
session_start(); 
echo("logged in as: ". $_SESSION['Name'].  "<br>");
if ($_SESSION['Role'] != 1) {   
    header("Location:PupilMenu.php");
}


require_once('Config.php');
///This only just works, had to create alternate connection path... Too Bad!
$sql =' SELECT tu.house as hs, dk.itemname as drink, sw.itemname as sandw, sn.itemname as snack, tu.Username, Date, MealMissed  
        FROM Tbl_orders 
        INNER JOIN tbl_mealoptions as dk ON dk.foodid = Tbl_orders.DKID
        INNER JOIN tbl_mealoptions as sw ON sw.foodid = Tbl_orders.SWID
        INNER JOIN tbl_mealoptions as sn ON sn.foodid = Tbl_orders.SNID
        INNER JOIN tbl_users as tu ON tu.Username = Tbl_orders.Username';


//"SELECT Username, SWID, SNID, DKID, Date, MealMissed FROM tbl_orders";
$result = $conn->query($sql);
$arr_orders = [];
if ($result->num_rows > 0) {
$arr_orders = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!-- Css Stuff -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatable</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
</head>



<body>
 <!--  back to menu button -->
 <br>
    <form action="AdminMenu.php" method="get">
        <input type="submit" value="Menu">
    </form>
    <br>
<!-- table stuff -->
    <table id="OrderTable">
        <thead>
            <th>Username</th>
            <th>House</th>
            <th>Sandwich</th>
            <th>Snack</th>
            <th>Drink</th>
            <th>Date</th>
            <th>Meal Missed</th>

        </thead>
        <tbody>
            <?php if(!empty($arr_orders)) { ?>
                <?php foreach($arr_orders as $order) { ?>
                    <tr>
                        <td><?php echo $order['Username']; ?></td>
                        <td><?php echo $order['hs']; ?></td>
                        <td><?php echo $order['sandw']; ?></td>
                        <td><?php echo $order['snack']; ?></td>
                        <td><?php echo $order['drink']; ?></td>
                        <td><?php echo $order['Date']; ?></td>
                        <td><?php echo $order['MealMissed']; ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#OrderTable').DataTable();
    });
    </script>
    <br>
    <?php
        $CurrentDate = date("Y-m-d");
        echo($CurrentDate);
        echo(" Today's Orders:");
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT tu.house as hs, dk.itemname as drink, sw.itemname as sandw, sn.itemname as snack, tu.Username, Date, MealMissed  
            FROM Tbl_orders 
            INNER JOIN tbl_mealoptions as dk ON dk.foodid = Tbl_orders.DKID
            INNER JOIN tbl_mealoptions as sw ON sw.foodid = Tbl_orders.SWID
            INNER JOIN tbl_mealoptions as sn ON sn.foodid = Tbl_orders.SNID
            INNER JOIN tbl_users as tu ON tu.Username = Tbl_orders.Username
            Where Date  = :CurrentDate ");
        $stmt->bindParam(':CurrentDate', $CurrentDate);   
        $stmt->execute();
        
        echo "<br>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo($row["Username"].', '.$row["hs"].', '.$row["sandw"]." SN: ".$row["snack"]. " DK: ".$row["drink"]."<br>");
        }
    ?>

        <!--Links to complete order to delete daily orders -->
        <br>
        <form action="CompleteOrder.php" method="get">
        <input type="submit" value="Complete Daily orders">
        </form>
        <br>


    
</body>
</html>