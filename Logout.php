<?php
session_start();
if(isset($_SESSION['Name']))
{
    unset($_SESSION['Name']);
    unset($_SESSION['Role']);
}
header("Location: login.php");
?>