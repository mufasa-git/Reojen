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

$nowType = $connection->query('SELECT * FROM settings WHERE name="payment_type" LIMIT 1')->fetch_assoc();

if ($nowType['value'] == 'WU')
    header("location:addmoney.php");
if ($nowType['value'] == 'WT')
    header("location:add-money-via-wire-transfer.php");
if ($nowType['value'] == 'OP')
    header("location:okpay_money.php");
if (trim($nowType['value']) == 'SKRILL'){
    header("location:add-money-via-skrill.php?m=1");
	exit;
}
if (trim($nowType['value']) == 'SKRILL_ADVCASH'){
    header("location:add-money-via-skrill-advcash.php?m=1");
	exit;
}
//if (isWesternUnionEnabled()) header("location:addmoney.php");
//set default time zone (Nilesh)
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
}
elseif($nowType['value'] == 'ADVCASH') {
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
    <?php if ($nowType['value'] == 'PAYPAL') { ?>
	<div class="eshop-section section" style="min-height: calc(58vh - 70px);">
		<div class="container">
			
			<!------msg -----start----------->
				
				<?php if(isset($_SESSION["notification.advcashmsg"]) && !empty($_SESSION["notification.advcashmsg"])):?>
				<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php echo $_SESSION["notification.advcashmsg"];$_SESSION["notification.advcashmsg"]="";?>
				</div>
			<?php endif;?>
			<?php if(isset($_SESSION["notification.advcashmsgfail"]) && !empty($_SESSION["notification.advcashmsgfail"])):?>
				<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php echo $_SESSION["notification.advcashmsgfail"];$_SESSION["notification.advcashmsgfail"]="";?>
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
			<?php endif;}?>
			
			
			<?php if(isset($_SESSION["notification.add_money"]) && !empty($_SESSION["notification.add_money"])):?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $_SESSION["notification.add_money"];$_SESSION["notification.add_money"]="";?>
			</div>
			<?php endif;?>
			<h2>Add money with PayPal</h2>
			<div class="col-md-12" style="min-height:300px;">
				<div class="col-md-12"style="float: none;margin: 0 auto;">
                                    <form name="addMoney" action="process_paypal.php" method="post">
					<div class="form-group col-md-2" style="float: none;margin: 0 auto;" >
						<label>Amount (in <?php echo $currency_val;?>)</label>
						<input type="text" name="amount" value="" class="form-control" data-validation="number" data-validation-allowing="float"data-validation-error-msg="Please enter the correct amount." data-validation-length="max7"/>
					</div>
                                    <div class="form-group col-md-6" style="float: none;margin: 0 auto;">
                                        <p style="text-align: center;">Note: If you don't have a PayPal account, you can checkout with a credit/debit card as guest.</p>
					</div>
					<div class="form-group col-md-2" style="float: none;margin: 0 auto;">
						<button type="submit" name="addMoney" class="btn btn-primary">
							<i class="fa fa-paypal"></i> Deposit with PayPal
						</button>
					</div>
				</form>
				</div>
			</div>
			
			
			<!------AdvCash -----start----------->
			<?php  if($data['enable_advcash'] == 1) { ?>
			<h2>Add money with AdvCash</h2>
			
			<div class="col-md-12" style="min-height:300px;">
				<div class="col-md-12"style="float: none;margin: 0 auto;">
                 <form action="https://wallet.advcash.com/sci/" method="post">
					<div class="form-group col-md-2" style="float: none;margin: 0 auto;" >
						<label>Amount (in <?php if($currency_val == "GBP"){ echo "EUR" ;}else{ echo $currency_val;}?>)</label>
						<input type="text" name="ac_amount" value="" style="width:192px;" class="form-control" data-validation="number" data-validation-allowing="float"data-validation-error-msg="Please enter the correct amount." data-validation-length="max7"/>
					</div>
					
					
                    <input type="hidden" name="ac_account_email" value="astro3454@gmail.com" /> 
					<input type="hidden" name="ac_sci_name" value="Reojen Co." /> 
					<input type="hidden" name="ac_currency" value="<?php if($currency_val == "GBP"){ echo "EUR" ;}else{ echo $currency_val;}?>" /> 
					<input type="hidden" name="ac_order_id" value="12345678" /> 
					<input type="hidden" name="ac_sign" value="46acaa8bccb2ccc106e6d5d823986f781691cb8d8b613b97ac591163152e9908" /> 
					<!-- Optional Fields --> 
					<input type="hidden" name="ac_success_url" value="http://www.reojen.com/payment-success.php" /> 
					<input type="hidden" name="ac_success_url_method" value="POST" /> 
					<input type="hidden" name="ac_fail_url" value="http://www.reojen.com/payment-fail.php" /> 
					<input type="hidden" name="ac_fail_url_method" value="POST" /> 
					<input type="hidden" name="ac_status_url" value="http://www.reojen.com/payment-status.php" /> 
					<input type="hidden" name="ac_status_url_method" value="POST" /> 
					<input type="hidden" name="ac_comments" value="Comment" /> 
					<div class="form-group col-md-2" style=" float: none;margin-bottom: auto; margin-left: auto;  margin-right: auto;margin-top: 20px !important;">
						<button type="submit" class="btn btn-primary" style="background-color:#0b0c0b;">
							<img src="https://www.reojen.com/img/advcash.png" style="height:23px;width:23px;"><span style="padding-left:5px;">Deposit with AdvCash</span>
						</button>
					</div>
					
				</form>
				</div>
				</div>
			<?php  } ?>
			
			
			<!------AdvCash ----end------------>
			
			
			
			
		</div>
	</div>
    <?php }elseif ($nowType['value'] == 'BACS') { ?>
        <div class="eshop-section section">
            <div class="container">
                <h2>Add money</h2>
                <!--                <div class="well well-small">
                                    <p align="center"> Add money with bank transfer.
                                    </p>
                                </div>-->
                <?php
                if (isset($_COOKIE['money']) && $_COOKIE['money'] == "Y") {
                    setcookie('money', '', time() - 3600);
                    ?>
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Add money to your account to make purchases.
                    </div>
                    <?php
                }
                ?>
                <img class="img-responsive chsv" src="img/transferwise_logo.png" alt="TransferWise">




                <div class="col-md-5 col-md-offset-1 col-sm-12">
                    <div class="shop-item addmony_two">
                        <div class="title">
                            <h3>Instructions</h3>
                        </div>
                        <div class="actions">
                            <p>
                            </p>
                            <ul>
                                <li>Make a local UK bank transfer (BACS or FPS) to our bank account with <a href="https://transferwise.com/" target="_blank">www.transferwise.com</a> if you are not from United Kingdom.</li><br />
                                <li>You can pay with “Debit card", “Credit card", “Bank transfer", “SOFORT", “Trustly", “iDEAL" (if you are paying with EUR) and with other compatible payment methods (depending on the currency you pay in) in TransferWise to complete a bank transfer.</li><br />
                                <li>TransferWise always sends a local bank transfer to the recipient.</li><br />
                                <li>You will be asked a question "Is this a personal or business transfer?" in TransferWise.
                                    If you are an individual, select "Personal" and enter your personal details such as name, address, date of birth, mobile number.
                                    If you are a company, select "Business" and enter your company details."</li><br />
                                <li>If you pay with USD in TransferWise, if you are paying from a bank located in United States, you have to provide TransferWise your US Social Security Number. US users who pay in USD in TransferWise can also pay with US bank account.</li>
                            </ul>
                            <br/>
                            <br/>

                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="shop-item">
                        <div class="title">
                            <h3>TransferWise recipient’s details</h3>
                        </div>
                        <div class="actions">
                            <div class="form-group">
                                <label for="name">Recipient type:</label>	<?php echo RecipientType; ?>                    
                            </div>
                            <div class="form-group">
                                <label for="name">Recipient’s email:</label>  <?php echo RecipientEmail; ?>                    
                            </div>
                            <div class="form-group">
                                <label for="name">Recipient’s name:</label>  <?php echo RecipientName; ?>                    
                            </div>
                            <div class="form-group">
                                <label for="email">Recipient’s date of birth:</label>	<?php echo RecipientDOB; ?>                    
                            </div>
                            <div class="form-group">
                                <label for="amount">Recipient’s country:</label>	<?php echo RecipientCountry; ?>                    
                            </div>
                            <div class="form-group">
                                <label for="amount">Recipient’s city:</label>	<?php echo RecipientCity; ?>                    
                            </div>
                            <div class="form-group">
                                <label for="amount">Recipient’s state:</label>	<?php echo RecipientState; ?>                    
                            </div>
                            <div class="form-group">
                                <label for="amount">Recipient’s address:</label>	<?php echo RecipientAddress; ?>                    
                            </div>
                            <div class="form-group">
                                <label for="amount">Recipient’s postal code:</label>	<?php echo RecipientPostCode; ?>                    
                            </div>
                            <!--<hr/>-->
                            <div class="form-group">
                                <label for="amount">Recipient’s bank name:</label>	<?php echo RecipientBankName; ?>                    
                            </div>
                            <div class="form-group">
                                <label for="amount">Recipient’s bank sort code:</label>	<?php echo RecipientBankCode ?>                    
                            </div>
                            <div class="form-group">
                                <label for="amount">Recipient’s bank account number:</label>	<?php echo RecipientBankAccount; ?>                    
                            </div>
                            <div class="form-group">
                                <label for="amount">Reference Number:</label> <?php echo $data['reference_number']; ?> purchase in reojen.com
                            </div>
                            <div class="form-group">
                                <strong>[You should be asked to enter reference in the "Review" page in TransferWise while making a transfer.]</strong>
                            </div>
                            <hr />

                            <div class="title">
                                <h3>Important note for UK users like to use direct bank transfer</h3>
                            </div>
                            <div class="actions">
                                <ol>
                                    <li>If you are from United Kingdom and like to send us a bank transfer from a UK bank account, please note that only BACS and FPS (UK local bank) transfers in GBP can be accepted. Transfers from individuals are accepted, but the transfer must be made from a company bank account. Transfers in USD will be automatically rejected. Wire transfers are not supported.</li><br>
                                    <li>We accept bank transfers from TransferWise and if you send the bank transfer with TransferWise, you don’t need to have a company bank account and you can pay with alternative methods such as debit/credit card.
                                        As sender's currency and recipient's currency can't be same in TransferWise, in that case, you have to pay in a different currency than GBP. We recommend you to pay in EUR.</li><br>	             	
                                </ol> 
                            </div>
                            <!--                            <div class="form-group">
                                                            <label for="amount">Reference Number:</label> <?php //echo $data['reference_number'];   ?>                    
                                                        </div>   -->
                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>

                <!--<div class="col-sm-6 col-sm-offset-3" style="margin-top:30px">
                        <div class="form-group">
                             <h4>NOTES:</h4>	
                             <ul>
                                <li>Make a local UK bank transfer (BASC or FPS) to the below bank account with <a href="www.transferwise.com" target="_blank">www.transferwise.com</a> if you are not from United Kingdom.</li>
                                <li>You can pay with “Debit card�?, “Credit card�?, “Bank transfer�?, “SOFORT�?, “Trustly�?, “iDEAL�? (if you are paying with EUR) and with other compatible payment methods (depending on the currency you pay in) in TransferWise to complete a bank transfer.</li>
                                <li>TransferWise always sends a local bank transfer to the recipient.</li>
                                <li>If you pay with USD in TransferWise, if you are paying from a bank located in United States, you have to provide TransferWise your US Social Security Number. US users who pay in USD in TransferWise can also pay with US bank account.</li>
                             </ul>                    
                        </div>
                </div>-->

                <!--<div class="col-sm-6 col-sm-offset-3" style="margin-top:30px">
                <h4>TransferWise recipient’s details -</h4>
                                <div class="form-group">
                                    <label for="name">Recipient type:</label>	<?php echo RecipientType; ?>                    
                                </div>
                                <div class="form-group">
                                    <label for="name">Recipient’s email:</label>  <?php echo RecipientEmail; ?>                    
                                </div>
                                <div class="form-group">
                                    <label for="name">Recipient’s name:</label>  <?php echo RecipientName; ?>                    
                                </div>
                                <div class="form-group">
                                    <label for="email">Recipient’s date of birth:</label>	<?php echo RecipientDOB; ?>                    
                                </div>
                                <div class="form-group">
                                    <label for="amount">Recipient’s country:</label>	<?php echo RecipientCountry; ?>                    
                                </div>
                                <div class="form-group">
                                    <label for="amount">Recipient’s city:</label>	<?php echo RecipientCity; ?>                    
                                </div>
                                <div class="form-group">
                                    <label for="amount">Recipient’s state:</label>	<?php echo RecipientState; ?>                    
                                </div>
                                <div class="form-group">
                                    <label for="amount">Recipient’s address:</label>	<?php echo RecipientAddress; ?>                    
                                </div>
                                <div class="form-group">
                                    <label for="amount">Recipient’s postal code:</label>	<?php echo RecipientPostCode; ?>                    
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="amount">Recipient’s bank name:</label>	<?php echo RecipientBankName; ?>                    
                                </div>
                                <div class="form-group">
                                    <label for="amount">Recipient’s bank sort code:</label>	<?php echo RecipientBankCode ?>                    
                                </div>
                                <div class="form-group">
                                    <label for="amount">Recipient’s bank account number:</label>	<?php echo RecipientBankAccount; ?>                    
                                </div>-->


                <!--<button type="submit" class="btn" name="submit">Continue</button>-->


                <!--<div class="form-group">
                     <h4>Important note for UK users like to use direct bank transfer:</h4>	
                     <ol>
                        <li>If you are from United Kingdom and like to send us a bank transfer from a UK bank account, please note that only BACS and FPS (UK local bank) transfers in GBP can be accepted. Transfers from individuals are accepted, but the transfer must be made from a company bank account. Transfers in USD will be automatically rejected. Wire transfers are not supported.</li>
                        <li>We accept bank transfers from TransferWise and if you send the bank transfer with TransferWise, you don’t need to have a company bank account and you can pay with alternative methods such as debit/credit card.</li>	             	
                     </ol> 
                     <div class="form-group">
                            <label for="amount">Reference Number:</label> <?php echo $data['reference_number']; ?>                    
                     </div>                   
                </div>-->
                <!--</div>-->
            </div>
        </div>
    <?php }elseif ($nowType['value'] == 'ADVCASH') { ?>
		
			<div class="eshop-section section" style="min-height: calc(58vh - 70px);">
			<div class="container">
				<!------msg -----start----------->
				
				<?php if(isset($_SESSION["notification.advcashmsg"]) && !empty($_SESSION["notification.advcashmsg"])):?>
				<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php echo $_SESSION["notification.advcashmsg"];$_SESSION["notification.advcashmsg"]="";?>
				</div>
			<?php endif;?>
			<?php if(isset($_SESSION["notification.advcashmsgfail"]) && !empty($_SESSION["notification.advcashmsgfail"])):?>
				<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php echo $_SESSION["notification.advcashmsgfail"];$_SESSION["notification.advcashmsgfail"]="";?>
				</div>
			<?php endif;?>
				
				
				<!------msg -----end----------->
				
				<!------paypal -----start----------->
				
				
				
				<?php  
				
				$status_enable_paypal = 0;
				if($paypal_status['status'] == 1){
					$status_enable_paypal= $paypal_status['status'];
				}
				elseif($data['enable_paypal'] == 1){
					$status_enable_paypal=$data['enable_paypal'];
				}
				
				if($status_enable_paypal == 1) {
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
			<h2>Add money with PayPal</h2>
			<div class="col-md-12" style="min-height:300px;">
				<div class="col-md-12"style="float: none;margin: 0 auto;">
                                    <form name="addMoney" action="process_paypal.php" method="post">
					<div class="form-group col-md-2" style="float: none;margin: 0 auto;" >
						<label>Amount (in <?php echo $currency_val;?>)</label>
						<input type="text" name="amount" value="" class="form-control" data-validation="number" data-validation-allowing="float"data-validation-error-msg="Please enter the correct amount." data-validation-length="max7"/>
					</div>
                                    <div class="form-group col-md-6" style="float: none;margin: 0 auto;">
                                        <p style="text-align: center;">Note: If you don't have a PayPal account, you can checkout with a credit/debit card as guest.</p>
					</div>
					<div class="form-group col-md-2" style="float: none;margin: 0 auto;">
						<button type="submit" name="addMoney" class="btn btn-primary">
							<i class="fa fa-paypal"></i> Deposit with PayPal
						</button>
					</div>
				</form>
				</div>
			</div>
			<?php }   ?>
			<!------paypal -----end----------->
			
			
		

			
		
			<!------AdvCash -----start----------->
			<h2>Add money with AdvCash</h2>
			
			<div class="col-md-12" style="min-height:300px;">
				<div class="col-md-12"style="float: none;margin: 0 auto;">
                    <form action="https://wallet.advcash.com/sci/" method="post">
					<div class="form-group col-md-2" style="float: none;margin: 0 auto;" >
						<label>Amount (in <?php if($currency_val == "GBP"){ echo "EUR" ;}else{ echo $currency_val;}?>)</label>
						<input type="text" name="ac_amount" value="" style="width:192px;" class="form-control" data-validation="number" data-validation-allowing="float"data-validation-error-msg="Please enter the correct amount." data-validation-length="max7"/>
					</div>
					
					
                    <input type="hidden" name="ac_account_email" value="astro3454@gmail.com" /> 
					<input type="hidden" name="ac_sci_name" value="Reojen Co." /> 
					<input type="hidden" name="ac_currency" value="<?php if($currency_val == "GBP"){ echo "EUR" ;}else{ echo $currency_val;}?>" /> 
					<input type="hidden" name="ac_order_id" value="12345678" /> 
					<input type="hidden" name="ac_sign" value="46acaa8bccb2ccc106e6d5d823986f781691cb8d8b613b97ac591163152e9908" /> 
					<!-- Optional Fields --> 
					<input type="hidden" name="ac_success_url" value="http://www.reojen.com/payment-success.php" /> 
					<input type="hidden" name="ac_success_url_method" value="POST" /> 
					<input type="hidden" name="ac_fail_url" value="http://www.reojen.com/payment-fail.php" /> 
					<input type="hidden" name="ac_fail_url_method" value="POST" /> 
					<input type="hidden" name="ac_status_url" value="http://www.reojen.com/payment-status.php" /> 
					<input type="hidden" name="ac_status_url_method" value="POST" /> 
					<input type="hidden" name="ac_comments" value="Comment" /> 
					<div class="form-group col-md-2" style=" float: none;margin-bottom: auto; margin-left: auto;  margin-right: auto;margin-top: 20px !important;">
						<button type="submit" class="btn btn-primary" style="background-color:#0b0c0b;">
							<img src="https://www.reojen.com/img/advcash.png" style="height:23px;width:23px;"><span style="padding-left:5px;">Deposit with AdvCash</span>
						</button>
					</div>
					
				</form>
				</div>
				</div>
			
			
			
			<!------AdvCash ----end------------>
			
			<!------deposit funds with Skrill ----start------------>


			<?php if($skrill_status['status'] == 1) { ?>
			
			
			
			<h2>Want to deposit funds with Skrill?</h2>
			<form class="form-horizontal" name ="dfws_addmoney" action="" method="post">
			  <div class="form-group">
				<label class="control-label col-sm-2">Send a payment to:</label>
				<div class="col-sm-10">
				<?php
				$skrillnotifyemail = $connection->query("SELECT * FROM app_settings WHERE id ='43' LIMIT 1")->fetch_assoc();
				$notifyemail = (string)trim($skrillnotifyemail['setting_value']); // get admin email for get payments
				
				
				if(isset($notifyemail) && !empty($notifyemail)){
					echo $notifyemail;
				}	
				
			?>
				
				  <?php // echo 'payments@reojen.com' ;?>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="dfws_amount">Amount (in <?php echo $currency_val;?>):</label>
				<div class="col-sm-3">
				  <input type="text" name="dfws_amount" value="" class="form-control" data-validation="number" data-validation-allowing="float"data-validation-error-msg="Please enter the correct amount." data-validation-length="max7"/>
				</div>
				<div class="col-sm-7">
				  
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="tid_ac_mail">Transaction ID/Sender's account email:</label>
				<div class="col-sm-3">
				  <input type="text" name="tid_ac_mail" class="form-control" data-validation="length"  data-validation-length="1-100" data-validation-error-msg="Please enter the correct value.">
				</div>
				<div class="col-sm-7">
				  
				</div>
			  </div>
			  <div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" name="dfws_btn"class="btn btn-default">Submit</button>
				</div>
			  </div>
			  
			  
			</form>
			
			<?php } ?>
			
			<div class="col-sm-12" style="margin-top: 33px;">
			  <h2>Want to deposit funds with any other payment method?</h2> 
			  <?php
				$sql="SELECT * FROM dashboard where id=8";
				$result=mysqli_query($connection,$sql);
				$row=mysqli_fetch_array($result);
				echo $row['contents'];
             ?>
			  
			</div>
			  
			<!------deposit funds with Skrill ------end---------->
			
		
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
