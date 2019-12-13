<?php
	session_start();
	if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name']))
	header('location:login.php');
	
	$_SESSION["notification.advcashmsgfail"]	="Your payment has been failed";
	header("Location:https://www.reojen.com/add-money.php");
	exit(0);

?>
	
