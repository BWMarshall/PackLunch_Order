<!DOCTYPE html> 
<html> 
<head> 

     

    <title>Page title</title> 

     

</head> 
<body> 

    <?php 
        $servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname = "packlunch"; 
        try { 
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
            // set the PDO error mode to exception 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            //echo "Connected successfully <br>";  
            } 
        catch(PDOException $e) 
            { 
            echo "Connection failed: " . $e->getMessage(); 
            } 
    ?>   

 <?php
/* $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if ($conn->connect_errno) {
    echo "Error: " . $conn->connect_error;
} */
?>




</body> 
</html> 