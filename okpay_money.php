<?php
$request_data = print_r($_REQUEST, true);
log_data($request_data);

function log_data($data = "This is test log data") {
    $myfile = file_put_contents('logs.txt', $data . PHP_EOL, FILE_APPEND | LOCK_EX);
}

ob_start();
session_start();
if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name']))
    header('location:login.php');
require_once("header.php");
require_once("connect/db.php");
require_once("functions.php");

$nowType = $connection->query('SELECT * FROM settings WHERE name="payment_type" LIMIT 1')->fetch_assoc();

if ($nowType['value'] == 'WU')
    header("location:addmoney.php");

//    if (isWesternUnionEnabled()) header("location:addmoney.php");
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
?>
<style type="text/css">
    @media only screen and (min-width: 764px) {
        .chsv {
            width: 48%;
            /*max-height: 100px;*/
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

</style>
<body>
    <div class="mainmenu-wrapper">
        <div class="container">
            <div class="menuextras">
                <div class="extras">
                    <ul>
                        <li class="shopping-cart-items">
                            <i class="glyphicon glyphicon-shopping-cart icon-white"></i>
                            <a href="#"><b> Balance $0.00</b></a>
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
    <?php
    if ($nowType['value'] == 'OP') {
        ?>
        <div class="eshop-section section">
            <div class="container">
                <h2>Add money</h2>
                <!--<div class="well well-small">
                    <p align="center">
                        Add money to your account by making a OKPAY for making purchases.
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
        <!--<img class="img-responsive chsv" src="img/okpay.jpg" alt="OKPAY">-->

                <div class="main-payment">
                    <div class="payment-box">
                        <h1 class="payment-title">You can add money to your account by selecting any of the below payment methods.</h1>
                        <p class="payment-name-with-icon">    
                            Credit Cards
                        </p>
                        <p class="payment-name-with-icon icon-2">    
                            E-Wallets
                        </p>
                        <p class="payment-name-with-icon icon-3">    
                            Bank Transfers
                        </p>
                        <p class="payment-name-with-icon icon-4">    
                            Mobile Payments
                        </p>
                        <p class="payment-name-with-icon icon-5">    
                            Payment Kiosks
                        </p>
                        <p class="payment-name-with-icon icon-6">    
                            Money Transfers
                        </p>
                        <p class="payment-name-with-icon icon-7">    
                            Retail Stores
                        </p>
                    </div>
                </div>

                <div class="col-sm-6 col-sm-offset-3">
                    <form  method="post" action="https://checkout.okpay.com/">
                        <div class="form-group">
                            <label for="name">First name:</label>
                            <input type="text" name="first_name" class="form-control" id="name" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <label for="name">Last name:</label>
                            <input type="text" name="last_name" class="form-control" id="name" placeholder="Last name">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <!--<div class="form-group">
                            <label for="amount">Recipient’s currency:</label>
                            <input type="text" name="re_currency" class="form-control" id="re_currency"
                                   placeholder="Amount to transfer (in USD)" value="USD">
                        </div>-->
                        <div class="form-group">
                            <label for="amount">Amount the recipient will receive (in USD):</label>
                            <input type="text" name="ok_item_1_price" class="form-control" id="amount"
                                   placeholder="Amount the recipient will receive (in USD)">
                        </div>
                        <div class="form-group">
                            <label for="country_id">Originating country of the OKPAY transfer:</label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="Select Country">Select Country</option>
                                <?php getCountryDropdownWithoutCode($location); ?>
                            </select>
                        </div>

                        <input type="hidden" name="ok_receiver" value="OK758208527"/>
                        <input type="hidden" name="ok_item_1_name" value="OKPAY Poster"/>
                        <!--<input type="hidden" name="ok_item_1_price" value="100"/>-->
                        <input type="hidden" name="ok_currency" value="USD"/>
                        <!--<input type="image" name="submit" alt="OKPAY Payment" src="https://download.okpay.com/images_buttons/en/buy/b07g56x35en.png" />-->

                        <button type="submit" class="btn" name="submit">Continue</button>
                    </form>

                </div>
            </div>
        </div>
    <?php } else { ?>
        Western Union Form
    <?php } ?>

</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script type="text/javascript">
</script>
<?php require("footer.php"); ?>