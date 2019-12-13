<?php
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
            width: 33%;
            max-height: 100px;
            text-align: center;
            margin: auto;
        }
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
    if ($nowType['value'] == 'WT') {
        ?>
        <div class="eshop-section section">
            <div class="container">
                <h2>Add money</h2>
                <!--                <div class="well well-small">
                                    <p align="center">
                                        Add money to your account by making a wire transfer for making purchases.
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
                <img class="img-responsive chsv" src="img/wire-logo.png">

                <div class="col-sm-6 col-sm-offset-3">
                    <form method="post" action="wire-transfer-step2.php">
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
                        <div class="form-group">
                            <label for="amount">Recipient’s currency:</label>
                            <input type="text" name="re_currency" class="form-control" id="re_currency"
                                   placeholder="Amount to transfer (in USD)" value="USD">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount the recipient will receive (in USD):</label>
                            <input type="text" name="amount" class="form-control" id="amount"
                                   placeholder="Amount the recipient will receive (in USD)">
                        </div>
                        <div class="form-group">
                            <label for="country_id">Originating country of the wire transfer:</label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="Select Country">Select Country</option>
                                <?php getCountryDropdownWithoutCode($location); ?>
                            </select>
                        </div>
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