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
if ($nowType['value'] == 'WT')
    header("location:add-money-via-wire-transfer.php");
if ($nowType['value'] == 'OP')
    header("location:okpay_money.php");

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

        const SEPA_COUNTRIES = array('Austria', 'Belgium', 'Bulgaria', 'Croatia', 'Cyprus', 'Czech Republic', 'Denmark', 'Estonia', 'Finland', 'France', 'Germany', 'Greece', 'Hungary', 'Iceland', 'Ireland', 'Italy', 'Latvia', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Malta', 'Monaco', 'Netherlands', 'Norway', 'Poland', 'Portugal', 'Romania', 'San Marino', 'Slovakia', 'Slovenia', 'Spain', 'Sweden', 'Switzerland', 'United Kingdom');
?>
<style type="text/css">
    @media only screen and (min-width: 764px) {
        .chsv {
            width: 25%;
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
    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
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
    <?php if ($nowType['value'] == 'SEPA') { ?>
        <div class="eshop-section section">
            <div class="container">
                <h2>Add money</h2>
                <!--                <div class="well well-small">
                                    <p align="center"> Add money with bank transfer (SEPA transfer from European banks is supported). </p>
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
                <img class="img-responsive chsv" src="img/bank.png" alt="SEPA">



                <div class="col-sm-6 col-sm-offset-3" style="margin-top:30px">
                    <?php
                    if (isset($_POST['country_id'])) {
                        if (in_array($_POST['country_id'], SEPA_COUNTRIES)) {
                            ?>
                            <?php header("location:sepa-transfer.php"); ?>
                            <?php
                        } else {
                            ?>
                            <div class="alert">
                                <strong>Sorry!</strong> We are not yet able to accept bank transfer from your country.
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <form  method="post" action="sepa-country.php">                
                        <div class="form-group">
                            <label for="country_id">Originating country of the SEPA transfer:</label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="Select Country">Select Country</option>
                                <?php getCountryDropdownWithCode($location); ?>
                            </select>
                        </div>
                        <button type="submit" class="btn" name="submit">Continue</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <?php header("location:not_found_page.php"); ?>
    <?php } ?>

</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script type="text/javascript">
</script>
<?php require("footer.php"); ?>