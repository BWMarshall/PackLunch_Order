<?php
session_start(); 
echo("logged in as: ". $_SESSION['Name'].  "<br>");
if ($_SESSION['Role'] != 1) {   
    header("Location:PupilMenu.php");
}
require_once('Config.php');
///This shit doesnt work ask c man!!!!!!!!!!!!!!!!!!!!!! cant read data into the variable for the table aorund line 5-8, Too BAd!
$sql = "SELECT Username, SWID, SNID, DKID, Date, MealMissed FROM tbl_orders";
$result = $conn->query($sql);
$arr_orders = [];
if ($result->num_rows > 0) {
$arr_orders = $result->fetch_all(MYSQLI_ASSOC);
}
?>
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
    <table id="OrderTable">
        <thead>
            <th>Username</th>
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
                        <td><?php echo $order['SWID']; ?></td>
                        <td><?php echo $order['SNID']; ?></td>
                        <td><?php echo $order['DKID']; ?></td>
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
</body>
</html>