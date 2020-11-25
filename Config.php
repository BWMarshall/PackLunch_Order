<?php
$conn = new mysqli("localhost", "root", "", "packlunch");
 
if ($conn->connect_errno) {
    echo "Error: " . $conn->connect_error;
}