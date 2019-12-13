<?php
	session_start();
	
	
	require_once("libraries/helper.php");
	if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name'])) {
		header('location:login.php');
	}
	include('connect/db.php');  // Database connection and settings
	//Get payment information from Skrill
	if(isset($_POST['mb_transaction_id']) && !empty($_POST['mb_transaction_id']) && isset($_POST['status']) && !empty($_POST['status']) && $_POST['status'] == '2' && isset($_POST['web_user_id']) && !empty($_POST['web_user_id'])){
		
		if($_POST['status'] == '2')	{
			$p_status = 'approved'; // mandatory to display on user panel
		} else {
			$p_status = $_POST['status'];
		}
		
		$app_payment_transactions = 'INSERT INTO app_payment_transactions (
			user_id, 
			payment_id, 
			payer_id,
			status, 
			amount, 
			payment_method, 
			currency,  
			transaction_id_account_email
		)  VALUES (
			"'.$_POST['web_user_id'].'",
			"'.$_POST['mb_transaction_id'].'",
			"0",
			"'.$p_status.'",
			"'.$_POST['amount'].'",
			"Skrill",
			"'.$_POST['currency'].'",
			"'.$_POST['pay_to_email'].'"
		)';
		mysqli_query($connection,$app_payment_transactions); 
		
		$query_create_skrill_payment = 'INSERT INTO testing (
			user_id, 
			mb_transaction_id, 
			status, 
			amount, 
			currency, 
			mb_currency, 
			merchant_id, 
			pay_to_email,
			payment_type, 
			source
		)  VALUES (
			"'.$_POST['web_user_id']. '", 
			"'.$_POST['mb_transaction_id'].'",
			"'.$_POST['status'].'",
			"'.$_POST['amount'].'",
			"'.$_POST['currency'].'",
			"'.$_POST['mb_currency'].'",
			"'.$_POST['merchant_id'].'",
			"'.$_POST['pay_to_email'].'",
			"'.$_POST['payment_type'].'",
			"Skrill"
		)';
		mysqli_query($connection,$query_create_skrill_payment); 
		
	}

	header('HTTP/1.1 200 OK');
	echo 'SUCCESS';
	
?>

