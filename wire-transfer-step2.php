<?php
ob_start();
session_start();
if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name'])) {
    header('location:login.php');
}
require_once("header.php");
require_once("connect/db.php");
require_once ("functions.php");
if ($_POST) {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $_SESSION['first_form'] = $_POST;
}
?>
<style type="text/css">

    @media only screen and (min-width: 764px) {
        .chsv{
            width: 33%;   max-height: 100px; text-align: center; margin: auto;
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
                            <a href="Balance"><b> Balance $0.00</b></a>
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
    <div class="eshop-section section">
        <div class="container">

            <div class="exchange-data">

                <div class="xchange-data-title">
                    <div class="make-payment">
                        <h4>How to make a payment </h4>
                    </div>
                </div>
                <div class="payment-details">
                    <p>In order to complete the payment, you need to make a bank/wire transfer to our bank account via internet banking or through the nearest bank branch.</p>
                    <p>Contact <a href="support@reojen.com">support@reojen.com</a> to get the wire transfer details of the recipient. </p>
                    <p>When you email us:</p>
                    <ul>
                        <li>Mention your full name</li>
                        <li>Mobile number (in international format)</li>
                        <li>Your country of residence in the email that is associated with your account</li>
                    </ul>
                    <p>After sending money to the recipient, click on the “I paid” button in this page and fill in the payment details in the form that appears in the next page.</p>
                    <p>You must have to submit the bank confirmation number (transaction ID) and the wire transfer receipt. Though optional, we highly recommend you to submit the SWIFT document of the wire transfer as well for faster processing.</p>
                    <p style="font-size:80%"> *Please note that the currency of the recipient will be USD.</p>
                    <p><strong> Attention:</strong> All costs associated with the transfer are payable by you.</p>
                    <p><strong> Attention:</strong> Do not press “I Paid” button, until you have completed the payment according to the instructions.</p>
                    <p><strong> Amount the recipient needs to receive: &dollar;<?php echo $_SESSION['first_form']['amount']; ?> </strong></p>
                </div>

                <div class="xchange-data-cont">
                    <a href="home.php"> <button type="submit" class="btn btn-default pull-left" name="submit">Cancel payment</button></a>
                    <form method="post" action="wire-transfer-step3.php" >
                        <a href="wire-transfer-step3.php"> <button type="submit" class="btn pull-right" name="submit">I paid</button></a>
                    </form>

                    <div class="clearfix"></div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<?php require("footer.php"); ?>