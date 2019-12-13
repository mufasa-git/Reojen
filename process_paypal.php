<style>
    .details ul.detail-extras {
    display: none;
}
</style>
<?php  
error_reporting(E_ALL);
//error_reporting(E_ALL & ~E_NOTICE);
session_start();

if(isset($_POST["addMoney"]))
{
	//load paypal library classes
	require __DIR__  . '/libraries/paypal/vendor/autoload.php';
	
	//load database files
	require_once('connect/db.php');
	require_once('query.php');
	require_once('libraries/helper.php');
	
	////// fetch currency value
	
	$currency_val="";
	$changeCurrency = $connection->query('SELECT * FROM change_currency WHERE name="currency_type" LIMIT 1')->fetch_assoc();
	$currency_val = $changeCurrency['value'];
	
	//use PayPal\Api\Details;
	 $amountToPays	=	trim($_POST["amount"]);
         $amountToPayss=(261* $amountToPays)/250;
         $amountToPay=$amountToPayss+0.2;
         $amountss = $amountToPay-$amountToPays;
	 $apiContext = new \PayPal\Rest\ApiContext(new \PayPal\Auth\OAuthTokenCredential(config("paypal_client_id"),config("paypal_secret_key")));
	 $apiContext->setConfig(
		  array(
			'mode'		=>	'live',
			'log.LogEnabled' => true,
			'log.FileName' => 'PayPal.log',
			'log.LogLevel' => 'DEBUG'
		  )
	);
//	print_r($apiContext);
	$payer = new \PayPal\Api\Payer();
	$payer->setPaymentMethod('paypal');
	
            $item1 = new \PayPal\Api\Item();
            $item1->setName('Adding funds to account')
            ->setCurrency($currency_val)
            ->setQuantity(1)
            ->setPrice($amountToPays);
            
            $item2 = new \PayPal\Api\Item();
            $item2->setName('Paypal Fees')
            ->setCurrency($currency_val)
            ->setQuantity(1)
            ->setPrice($amountss);
            $itemList = new \PayPal\Api\ItemList();
            $itemList->setItems(array($item1, $item2));
            // ### Additional payment details
            // Use this optional field to set additional
            // payment information such as tax, shipping
            // charges etc.
            $details = new \PayPal\Api\Details();
            $details->setShipping(0.0)
            ->setTax(0.0)
            ->setSubtotal($amountToPays+$amountss);
            // ### Amount
            // Lets you specify a payment amount.
            // You can also specify additional details
            // such as shipping, tax.
            $amount = new \PayPal\Api\Amount();
            $amount->setCurrency($currency_val)
            ->setTotal($amountToPays+$amountss);
//            ->setDetails($details);
            // ### Transaction
            // A transaction defines the contract of a
            // payment - what is the payment for and who
            // is fulfilling it. 
            $transaction = new \PayPal\Api\Transaction();
            $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

	
	$redirectUrls = new \PayPal\Api\RedirectUrls();
	
	$return_url		=	$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/paypal.php";
	$cancel_url		=	$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/paypalcancel.php";
	$redirectUrls->setReturnUrl($return_url)->setCancelUrl($cancel_url);

	
	// Create the WebProfile
    $presentation = new \PayPal\Api\Presentation();
     $presentation->setLogoImage($_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/img/1811440956_reojen1.png")
        ->setBrandName("Reojen Co.")
        ->setLocaleCode("en_US");
    $inputFields = new \PayPal\Api\InputFields();
    $inputFields->setAllowNote(true)
        ->setNoShipping(1)
        ->setAddressOverride(0);
    
    $webProfile = new \PayPal\Api\WebProfile();
    $webProfile->setName("Reojen Co." . uniqid())
        ->setPresentation($presentation)
        ->setInputFields($inputFields);
    
    try {
//        print_r($apiContext);
        $createdProfile = $webProfile->create($apiContext);
        $createdProfileID = json_decode($createdProfile);
        $profileid = $createdProfileID->id;
    } catch(PayPal\Exception\PayPalConnectionException $pce) {
//        echo '<pre>',print_r(json_decode($pce->getData())),"</pre>";
        exit;
    }
	
	
	$payment = new \PayPal\Api\Payment();
	$payment->setExperienceProfileId($profileid)->setIntent('sale')->setPayer($payer)->setTransactions(array($transaction))->setRedirectUrls($redirectUrls);
	
	
	
	try {
		$payment->create($apiContext);
//		echo "<pre>";print_r($payment);die;
		$data	=	[
			"user_id"		=>	$_SESSION["user_id"],
			"payment_id"	=>	$payment->id,
			"status"		=>	"created",
			"amount"		=>	$amountToPay,
			"payment_method"=>	"paypal",
			"currency"		=>	"USD"
		];
		
		$query 	= 	new QueryFire();
//		echo "<pre>";print_r($data);
                $query_create_user = 'INSERT INTO app_payment_transactions(user_id,payment_id,payer_id, status,amount, payment_method, currency) 
			VALUES ("'.$_SESSION["user_id"].'", "'.$payment->id.'","0", "created", "'.$amountToPays.'", "paypal","USD")';
			$created_user = mysqli_query($connection,$query_create_user);
//			echo $lstid=mysqli_insert_id($connection);
//		echo $query->insertData("app_payment_transactions", $data, implode(",",array_keys($data)));
//		die;
		header("Location:".$payment->getApprovalLink());exit(0);
//		echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
	}catch (\PayPal\Exception\PayPalConnectionException $ex) {
		// This will print the detailed information on the exception.
		//REALLY HELPFUL FOR DEBUGGING
		$data = $ex->getData();
		$data	=	json_decode($data);
		$_SESSION["notification.add_money"]	=	$data->details[0]->issue;
		header("Location:add-money.php");exit(0);
	}
}else{
	header("Location:index.php");
}
?>
