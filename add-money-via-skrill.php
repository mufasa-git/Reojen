<?php
	require_once("libraries/helper.php");
	$request_data = print_r($_REQUEST, true);
	log_data($request_data);
	
	function log_data($data = "This is test log data") {
	    $myfile = file_put_contents('logs.txt', $data . PHP_EOL, FILE_APPEND | LOCK_EX);
	}
	
	ob_start();
	if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name']))
	    header('location:login.php');
	require_once("header.php");
	require_once("connect/db.php");
	require_once("functions.php");
	
	
	
	if(isset($_POST["dfws_btn"]))
	{
		require_once("query.php");
		$data	=	[
				"user_id"		=>	$_SESSION["user_id"],
				//"payment_id"	=>	$payment->id,
				"status"		=>	"created",
				"amount"		=>	$_POST["dfws_amount"],
				"payment_method"=>	"",
				"currency"		=>	$currency_val,
				"transaction_id_account_email"	=>	$_POST["tid_ac_mail"],
			];
		$query 	= 	new QueryFire();
		$query->insertData("app_payment_transactions", $data, implode(",",array_keys($data)));
		$_SESSION["notification.advcashmsg"]	=	"Your payment details have been submitted. The admin will verify your payment and funds will be credited to your Reojen account.";
		header("Location:".$_SERVER["HTTP_ORIGIN"].$_SERVER["PHP_SELF"]);
		exit(0);
		
	}
		// getRandomString 6 char start 
		$validCharacters = "1234567890";
		$validCharNumber = strlen($validCharacters);
		$result = "";
		for ($i = 0; $i < 6; $i++) 
		{
			$index = mt_rand(0, $validCharNumber - 1);
			$order_id = $validCharacters[$index];
		}
		
		// getRandomString 6 char  end
	
	
	if(isset($_SESSION['email']) && $_SESSION['email']==""){
		header('Location: home.php');
	}	
	$url = "https://maps.googleapis.com/maps/api/timezone/json?location=20,85&timestamp=1393575206&sensor=false";
	$json_timezone = json_decode(file_get_contents($url));
	date_default_timezone_set($json_timezone->timeZoneId);
	$date = date_create(date('Y-m-d H:i:s'), timezone_open($json_timezone->timeZoneId));
	$p = date_format($date, 'Y-m-d H:i:s A');
	if (strcasecmp('AM', $p))
	    $Default_time = date_format($date, 'Y-m-d H:i:s P');
	else
	    $Default_time = date_format($date, 'Y-m-d H:i:s A');
	
	$data = $connection->query("SELECT * FROM users WHERE user_id=" . $_SESSION['user_id'])->fetch_assoc();
	$c = $connection->query("SELECT * FROM countrycode WHERE name='" . strtoupper($data['Country']) . "'")->fetch_assoc();
	$mob = str_replace("+" . $c['Code'], " ", $data['mobile_no']);
	$num = "+" . $c['Code'] . "  " . $mob;
	
	
	if ($data['reference_number'] == "") {
	    /**
	     * function to generate random strings
	     * @param 		int 	$length 	number of characters in the generated string
	     * @return 		string	a new string is created with random characters of the desired length
	     */
	    $length = 12;
	    $randstr;
	    srand((double) microtime(TRUE) * 1000000);
	    //our array add all letters and numbers if you wish
	    $chars = array(
	        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p',
	        'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5',
	        '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
	        'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
	
	    for ($rand = 0; $rand < $length; $rand++) {
	        $random = rand(0, count($chars) - 1);
	        $randstr .= $chars[$random];
	    }
	
	    $sql = 'UPDATE users SET reference_number="' . $randstr . '" WHERE user_id=' . $_SESSION['user_id'];
	    $sql_run = mysqli_query($connection, $sql) or die("Error: " . mysqli_error($connection));
	}
	$data = $connection->query("SELECT * FROM users WHERE user_id=" . $_SESSION['user_id'])->fetch_assoc();
	
	//SEPA Countries
	        const SEPA_COUNTRIES = array('Austria', 'Belgium', 'Bulgaria', 'Croatia', 'Cyprus', 'Czech Republic', 'Denmark', 'Estonia', 'Finland', 'France', 'Germany', 'Greece', 'Hungary', 'Iceland', 'Ireland', 'Italy', 'Latvia', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Malta', 'Monaco', 'Netherlands', 'Norway', 'Poland', 'Portugal', 'Romania', 'San Marino', 'Slovakia', 'Slovenia', 'Spain', 'Sweden', 'Switzerland', 'United Kingdom');
	// Client SEPA Bank Details
	        const RecipientType = 'Individual';
	        const RecipientEmail = 'support@reojen.com';
	        const RecipientName = 'Dan Carlo Francia';
	        const RecipientDOB = '25 September 1992';
	        const RecipientCountry = 'United Kingdom';
	        const RecipientCity = 'Foston';
	        const RecipientState = 'England';
	        const RecipientAddress = '10 Seafield Place';
	        const RecipientPostCode = 'DE65 7WA';
	
	        const RecipientBankName = 'Barclays';
	        const RecipientBankCode = '23-14-86';
	        const RecipientBankAccount = '01870087';
	
	$nowType = $connection->query('SELECT * FROM settings WHERE name="payment_type" LIMIT 1')->fetch_assoc();
	
	if ($nowType['value'] == 'BACS') {
	    $currency_symbol = '&#163;';
	} elseif($nowType['value'] == 'PAYPAL') {
		$currency_symbol = '<i class="fa fa-gbp"></i>';
	}elseif($nowType['value'] == 'ADVCASH') {
		$currency_symbol = '<i class="fa fa-gbp"></i>';
	} else {
	    $currency_symbol = '&#x24;';
	}
	
	
	
	//~ 
	$users_paypal_status = $connection->query("select * from payment_option_status where name='paypal_status'");
	$paypal_status = $users_paypal_status->fetch_assoc();
	
	$users_skrill_status = $connection->query("select * from payment_option_status where name='skrill_status'");
	$skrill_status = $users_skrill_status->fetch_assoc();
	?>
<style type="text/css">
	@media only screen and (min-width: 764px) {
	.chsv {
	width: 33%;
	max-height: 100px;
	text-align: center;
	margin: auto;
	}
	}
	.payment-title{
	color:#53555c;
	font-size:18px;
	text-align:center;
	}
	.payment-name-with-icon{
	background-image:url(img/Reojen-one.png);
	background-position: -11px;
	background-repeat: no-repeat;
	width: 75px;
	padding-top: 100px;
	min-height:40px;
	text-align: center;
	display:inline-block;
	vertical-align:top;
	cursor:pointer;
	font-size:12px;
	line-height: 12px;
	font-family: 'Open Sans', sans-serif;
	}
	.payment-box{
	width:49%;
	margin:0 auto;
	}
	.icon-2{
	background-position: -111px;
	}
	.icon-3{
	background-position: -194px;
	}
	.icon-4{
	background-position: -281px;
	}
	.icon-5{
	background-position: -378px;
	}
	.icon-6{
	background-position: -474px;
	}
	.icon-7{
	background-position: -571px;
	} 
	.error{display:block !important;}	
	/*    .alert {
	padding: 20px;
	background-color: #f44336;
	color: white;
	}*/
</style>
<body>
	<div class="mainmenu-wrapper">
		<div class="container">
			<div class="menuextras">
				<div class="extras">
					<ul>
						<li class="shopping-cart-items">
							<i class="glyphicon glyphicon-shopping-cart icon-white"></i>
							<a href="#"><b> Balance <?php echo $currency_symb; ?> <?php echo wallet();?></b></a>
						</li>
						<li>
							<div class="btn-group pull-right">
								<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<i class="glyphicon glyphicon-user"></i>
								<span class="hidden-sm hidden-xs"> <?php echo (isset($_SESSION['CompanyName']) && !empty($_SESSION['CompanyName'])) ? $_SESSION['CompanyName'] : $_SESSION['user_name'] ?></span>
								<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="myaccount.php">My account</a></li>
									<li class="divider"></li>
									<li>
										<a href="logout.php">Log out</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<?php require_once 'nav.php'; ?>
		</div>
	</div>
	<?php if ($nowType['value'] == 'SKRILL') { ?>
	<div class="eshop-section section" style="min-height: calc(58vh - 70px);">
		<div class="container">
			<!------msg -----start----------->
			<?php if(isset($_SESSION["notification_skrill_success"]) && !empty($_SESSION["notification_skrill_success"])):?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $_SESSION["notification_skrill_success"];$_SESSION["notification_skrill_success"]="";?>
			</div>
			<?php endif;?>
			<?php if(isset($_SESSION["notification_skrill_fail"]) && !empty($_SESSION["notification_skrill_fail"])):?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $_SESSION["notification_skrill_fail"];$_SESSION["notification_skrill_fail"]="";?>
			</div>
			<?php endif;?>
			<!------msg -----end----------->
			<?php 
				if(isset($_GET['m']) && $_GET['m']==1){ 
				if($_SESSION["show_notification"]): $_SESSION["show_notification"] = 0;?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Add money to your account to make purchases.
			</div>
			<?php endif;
				}?>
			<?php if(isset($_SESSION["notification.add_money"]) && !empty($_SESSION["notification.add_money"])):?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $_SESSION["notification.add_money"];$_SESSION["notification.add_money"]="";?>
			</div>
			<?php endif;?>
			<h2>Add money with Skrill</h2>
			<div class="col-md-12" style="min-height:300px;">
				<div class="col-md-12"style="float: none;margin: 0 auto;">
					<form name="addMoney" action="skrill-process.php" method="post">
						<div class="form-group col-md-2" style="float: none;margin: 0 auto;" >
							<label>Amount (in <?php echo $currency_val;?>)</label>
							
							<?php $_SESSION['set_vk_currency'] = $currency_val; 
							$_SESSION['set_vk_country'] = $data['Country'];
							?>
							
							<input type="text" name="amount" value="" class="form-control" data-validation="number" data-validation-allowing="float"data-validation-error-msg="Please enter the correct amount." data-validation-length="max7"/>
						</div>
						<div class="form-group col-md-6" style="float: none;margin: 0 auto;">
							<p style="text-align: center;">Note: If you don't have a Skrill account, you can checkout with a credit/debit card as guest.</p>
						</div>
						<div class="form-group col-md-2" style="float: none;margin: 0 auto;">
							<button type="submit" name="addMoney" class="btn btn-primary">
							<i class="fa fa-paypal"></i> Deposit with Skrill
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php } else { ?>
	<?php header("location:not_found_page.php"); ?>
	<?php } ?>
	</div>
	</div>
	<script type="text/javascript">
		$.validate();
	</script>
	<?php require("footer.php"); ?>