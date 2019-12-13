<?PHP 
include_once 'redirection.php';
require_once 'amal-functions.php';
require_once 'functions.php';
$addr_data = getContactAddress();

$title = 'Reojen';
$url = $_SERVER['PHP_SELF'];
if (strpos($url, 'index.php')) {
	$title = 'Home - Reojen';
}
if (strpos($url, 'home.php')) {
	$title = 'Home - Reojen';
}
if (strpos($url, 'support.php')) {
	$title = 'Support - Reojen';
}
if (strpos($url, 'login.php')) {
	$title = 'Login - Reojen';
}
if (strpos($url, 'signup.php')) {
	$title = 'Signup - Reojen';
}
if (strpos($url, 'add-money.php')) {
	$title = 'Add money - Reojen';
}
if (strpos($url, 'myaccount.php')) {
	$title = 'My Account - Reojen';
}
if (strpos($url, 'terms_condition.php')) {
	$title = 'Terms & Conditions - Reojen';
}
$sql="SELECT * FROM site_settings ORDER BY id DESC LIMIT 1";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $name = $row['name'];
 $logo = $row['logo'];
 $favicon = $row['favicon'];
 
 
 
 ////// fetch currency symbol
$currency_symb="";
$currency_val="";
$changeCurrency = $connection->query('SELECT * FROM change_currency WHERE name="currency_type" LIMIT 1')->fetch_assoc();
$currency_symb = $changeCurrency['currency_symbol'];
$currency_val = $changeCurrency['value'];

?>
<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php echo $title;?></title>

        <meta name="description" content="">

        <meta name="viewport" content="width=device-width">

		<link rel="icon" href=".uploads/<?php echo $favicon;  ?>" type="image/x-icon"/>
        
        <link rel="shortcut icon" href="uploads/<?php echo $favicon;  ?>" type="image/x-icon"/>

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="css/icomoon-social.css">
		
		<link rel="stylesheet" href="css/elements.css">
		<link rel="stylesheet" href="css/elements2.css">
 		
 		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!--link rel="stylesheet" href="css/font-awesome.css"-->

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>



        <link rel="stylesheet" href="css/leaflet.css" />

		<!--[if lte IE 8]>

		    <link rel="stylesheet" href="css/leaflet.ie.css" />

		<![endif]-->

        <link rel="stylesheet" href="css/main.css">

        <!--<link href="css/flags.css" rel="stylesheet">-->



         <!--<script src="js/jquery.flagstrap.js"></script>-->

        <script src="js/jquery.min.js"></script>
 		<script src="js/custom_validation.js"></script>

	<script src="js/jquery.cookie.js"></script>

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="assets/js/jquery.form-validator.min.js"></script>
<style>
.error{display:none;}
</style>
    </head>
