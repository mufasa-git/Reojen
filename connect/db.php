<?php
date_default_timezone_set("Asia/Kolkata");
//$connection =new mysqli("localhost", "manoj255", "]@[RTep4#$#X", "codebeginer_reojen"); 
$connection =new mysqli("localhost", "root", "", "reojen"); 
$db = mysqli_select_db($connection, "reojen");
if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
