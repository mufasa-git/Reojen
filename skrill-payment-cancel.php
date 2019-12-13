<?php
	session_start();

	$_SESSION["notification_skrill_fail"]	= "Your payment has been cancelled !";
	header("Location:https://www.reojen.com/add-money.php");
	exit(0);
?>

