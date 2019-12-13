<?php
	session_start();
	$_SESSION["notification_skrill_success"]	= "Your payment has been successful";
	header("Location:https://www.reojen.com/add-money.php");
	exit(0);
?>

