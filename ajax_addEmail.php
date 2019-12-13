<?php
require("connect/db.php");
require_once("libraries/helper.php");
ob_start();
@session_start();
global $connection;

$email =  $_POST['email'];
$user_id = $_SESSION['user_id'];
$sql = "update users set Email = '$email' where user_id = '$user_id'";
//$connection->query("update users set Email = '$email' where user_id = '$user_id'");

mysqli_query($connection,$sql);
$_SESSION['email'] = $email;
echo 1; 
?>