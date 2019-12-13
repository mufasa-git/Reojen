<?php
	session_start();
	if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name']))
    header('location:login.php');
    
	require_once('./connect/db.php');
	require_once('query.php');
	//$_SESSION["user_id"]=12;
	//~ $_REQUEST['ac_transfer'] = "sasasdasdadbbnh123";
	//~ $_REQUEST['ac_src_wallet'] = "U123456789012";
	//~ $_REQUEST['ac_dest_wallet'] = "U123456789012";
	//~ $_REQUEST['ac_amount'] = "1";
	//~ $_REQUEST['ac_merchant_currency'] = "USD";
	//~ $_REQUEST['ac_order_id'] = "12";
	
	//Get payment information from ADVCASh
	if(!empty($_REQUEST['ac_transfer'])){
	$ac_src_wallet = $_REQUEST['ac_src_wallet']; 					//Buyer's Advanced Cash wallet number.
	$ac_dest_wallet = $_REQUEST['ac_dest_wallet']; 					//Merchant's Advanced Cash wallet number. 
	$ac_amount = $_REQUEST['ac_amount']; 							// Amount that was funded to Merchant's wallet. 
	$ac_merchant_currency = $_REQUEST['ac_merchant_currency']; 		// The currency of amount that was funded to Merchant'swallet.
	$ac_order_id = $_REQUEST['ac_order_id']; 						// In this field the seller sets the purchase identifier according to the system of the account. It is recommended that users choose a unique number for each payment.
	$ac_transfer = $_REQUEST['ac_transfer']; 						// Unique Advanced Cashtransaction id.

	$data	=	[
		"user_id"		=>	$_SESSION["user_id"],
		"payment_id"	=>	$ac_transfer,
		"status"		=>	"created",
		"amount"		=>	$ac_amount,
		"payment_method"=>	"advcash",
		"currency"		=>	"USD"
	];
	
	$query 	= 	new QueryFire();
	$query_create_user = 'INSERT INTO app_payment_transactions(user_id,payment_id,payer_id, status,amount, payment_method, currency) 
	VALUES ("'.$_SESSION["user_id"].'", "'.$ac_transfer.'","0", "created", "'.$ac_amount.'", "advcash","'.$ac_merchant_currency.'")';
	$created_user = mysqli_query($connection,$query_create_user);
	$_SESSION["notification.advcashmsg"]	= "Your payment has been successful";
	header("Location:https://www.reojen.com/add-money.php");
	exit(0);

}else {
	$_SESSION["notification.advcashmsgfail"]	="Your payment has been failed";
	header("Location:https://www.reojen.com/add-money.php");
	exit(0);
}
?>

