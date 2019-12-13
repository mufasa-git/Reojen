<?php
ob_start();
session_start();
if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name'])) {
    header('location:login.php');
}
require_once("header.php");
require_once("connect/db.php");
require_once ("functions.php");
$query = new QueryFire();

if ($_POST) {
    $to = 'rosetree.water@gmail.com';
    if (isset($_SESSION['first_form'])) {
        $post_arr = $_SESSION['first_form'];
        $post_arr['created_at'] = date("Y-m-d H:i:s");
        $post_arr['date'] = date("Y-m-d");
        unset($post_arr['submit']);
        $id = $query->saveOrUpdateNew('wire_transfer', $post_arr);
        $random = getRandom($id);
        sendMailWireTransfer($to, $random);
        $res = $query->saveOrUpdateNew('wire_transfer', ['money_request_id' => $random], ['id' => $id]);
        $_SESSION['first_form_page3'] = $_SESSION['first_form'];
        unset($_SESSION['first_form']);
    }
}

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
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
    <div class="eshop-section section">
        <div class="container">

            <div class="exchange-data">
                <!--            <div class="xchange-data-title">-->
                <!--                <div class="send-message">-->
                <!--                    <h4>Send</h4>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--            <div class="xchange-data-cont">-->
                <!--                <div class="data-cont">-->
                <!--                    <span>max.: 4998 USD</span>-->
                <!---->
                <!--                    <dl id="sample" class="dropdown">-->
                <!--                        <dt><a href="#"><span><img class="flag" src="img/br.png" alt="" />Bank Wire/Swift USD</span></a></dt>-->
                <!--                        <dd>-->
                <!--                            <ul>-->
                <!--                                <li><a href="#"><img class="flag" src="img/br.png" alt="" />Bank Wire/Swift USD</a></li>-->
                <!--                                <li><a href="#"><img class="flag" src="img/br.png" alt="" />Bank Wire/Swift USD</a></li>-->
                <!--                            </ul>-->
                <!--                        </dd>-->
                <!--                    </dl>-->
                <!---->
                <!--                    <p>Including add. service fee (2 USD), you send</p>-->
                <!--                </div>-->
                <!--                <div class="amount-box">-->
                <!--                    <form>-->
                <!--                        <div class="form-group">-->
                <!--                            <label for="amount"> Amount*:</label>-->
                <!--                            <input type="amount" class="form-control" id="amount">-->
                <!--                        </div>-->
                <!--                        <div class="form-group">-->
                <!--                            <label for="amount"> Amount*:</label>-->
                <!--                            <input type="amount" class="form-control" id="amount">-->
                <!--                        </div>-->
                <!--                    </form>-->
                <!--                </div>-->
                <!--                <div class="clearfix"></div>-->
                <!--            </div>-->
                <div class="xchange-data-title">
                    <div class="receive-message">
                        <h4>Bank Details</h4>

                    </div>
                </div>
                <div class="xchange-data-cont">
                    <div class="data-cont">
                        <span>min.: 1 USD, max.: 1211.7851 USD</span>

                        <!--                    <dl id="sample" class="dropdown">-->
                        <!--                        <dt><a href="#"><span><img class="flag" src="img/br.png" alt="" />Bank Wire/Swift USD</span></a></dt>-->
                        <!--                        <dd>-->
                        <!--                            <ul>-->
                        <!--                                <li><a href="#"><img class="flag" src="img/br.png" alt="" />Bank Wire/Swift USD</a></li>-->
                        <!--                                <li><a href="#"><img class="flag" src="img/br.png" alt="" />Bank Wire/Swift USD</a></li>-->
                        <!--                            </ul>-->
                        <!--                        </dd>-->
                        <!--                    </dl>-->

                        <form method="post">
                            <div class="amount-box">
                                <div class="form-group">
                                    <label for="amount"> Amount*:</label>
                                    <input type="text" class="form-control" id="amount" value="<?php echo @$_SESSION['first_form_page3']['amount']; ?>">
                                </div>
                            </div>
                            <div class="amount-box">
                                <div class="form-group">
                                    <label for="bank_receipt"> Bank Receipt*: </label>
                                    <input type="file" class="form-control" name="bank_receipt" id="bank_receipt">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    </div>
                    <div class="xchange-data-title">
                        <div class="personal-data">
                            <h4>Personal data</h4>
                        </div>
                    </div>
                    <div class="xchange-data-cont">
                        <div class="personal-form">

                            <div class="form-group">
                                <label for="surname">Surname*:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo @$_SESSION['first_form_page3']['last_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Name*:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"  value="<?php echo @$_SESSION['first_form_page3']['first_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email*:</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo @$_SESSION['first_form_page3']['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone*:</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo @$_SESSION['first_form_page3']['phone']; ?>">
                            </div>
                            <button type="submit" class="btn pull-right" name="submit">Submit</button>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<?php require("footer.php"); ?>