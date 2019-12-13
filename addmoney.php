<?php
ob_start();
session_start();
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name'])) {
    header('location:login.php');
}
require_once("header.php");
require_once("connect/db.php");
require_once ('query.php');
require_once("functions.php");

$db = new QueryFire();

$nowType = $connection->query('SELECT * FROM settings WHERE name="payment_type" LIMIT 1')->fetch_assoc();

if ($nowType['value'] == 'WT')
    header("location:add-money-via-wire-transfer.php");

/* if(!isWesternUnionEnabled()) {
  header("location:add-money-via-wire-transfer.php");
  } */
////set default time zone (Nilesh)
//$url = "https://maps.googleapis.com/maps/api/timezone/json?location=20,85&timestamp=1393575206&sensor=false";
//$json_timezone = json_decode(file_get_contents($url));
//date_default_timezone_set($json_timezone->timeZoneId);
//$date = date_create(date('Y-m-d H:i:s'), timezone_open($json_timezone->timeZoneId));
//$p = date_format($date, 'Y-m-d H:i:s A');
//if (strcasecmp('AM', $p))
//    $Default_time = date_format($date, 'Y-m-d H:i:s P');
//else
//    $Default_time = date_format($date, 'Y-m-d H:i:s A');
//
//$getcountrycode = "SELECT * FROM users WHERE user_id=" . $_SESSION['user_id'];
//$data = mysqli_fetch_assoc(mysqli_query($connection, $getcountrycode));
//$country = "SELECT * FROM countrycode WHERE name='" . strtoupper($data['Country']) . "'";
//$c = mysqli_fetch_assoc(mysqli_query($connection, $country));
//$mob = str_replace("+" . $c['Code'], " ", $data['mobile_no']);
//$num = "+" . $c['Code'] . "  " . $mob;


if (isset($_POST['submit'])) {
    $post_array = $_POST;
    $isFileUploaded = '';
    $post_array['user_id'] = $_SESSION['user_id'];
    unset($post_array['submit']);
    if (!empty($_FILES["wureceipt"]["name"])) {
        $isFileUploaded = uploadFile();
    }

    $post_array['wureceipt'] = $isFileUploaded;
    $post_array['created_at'] = date('Y-m-d H:i:s');
    //print_r($post_array);exit;
    if ($isFileUploaded) {
        $isSaved = $db->saveOrUpdateNew('pending', $post_array);
        if ($isSaved) {
            $to = "rosetree.water@gmail.com";

//            $to = "karmickphp4@gmail.com";
            $random = getRandom($isSaved);
            $sql = "update pending set payment_request_id='" . $random . "' where id=" . $isSaved;
            $db->runSQL($sql);
            sendMailWUAddMoney($to, "wureceipt/" . $isFileUploaded, $random);
            successMsgWUAddMoney();
        } else {
            echo "<p style='color:red;'>Fill the form properly</p>";
        }
    } else {
        msg("Incorrect file type! Only jpg, .bmp, .gif, .pdf are allowed");
    }
}
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

    .actions > ul {
        padding-left: 10px;
    }

    .actions > ul > li {
        background: url(img/arrow.png) no-repeat left 5px;
        list-style: none;
        padding: 0 0 8px 18px;
    }

    .red {
        color: red;
        font-size: 12px;
    }

    .customErrorClass {
        color: red;
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
            <h2>Add money</h2>
            <div class="row">
                <!--                <div class="well well-small">
                                    <p align="center">
                                         Add money to your account with Payments Hub or Western Union for making purchases 
                                        Add money to your account with Western Union for making purchases
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
                <img class="img-responsive chsv" src="img/we.png">

                <div class="col-md-5 col-md-offset-1 col-sm-12">
                    <div class="shop-item addmony_two">
                        <div class="title">
                            <h3>Instructions</h3>
                        </div>
                        <div class="actions">
                            <p>
                            </p>
                            <p> Contact <a href="#">support@reojen.com</a> to get the Western Union details of the
                                recipient.</p>
                            <p>When you email us, mention your</p>
                            <ul>
                                <li>Full Name</li>
                                <li>Mobile number (in international format)</li>
                                <li> Your country of residence in the email that is associated with your account.</li>

                            </ul>
                            <br/>
                            <br/>


                            <p> After sending money to the recipient, fill in the payment details in the form in this page
                                and submit the
                                details.
                            </p>

                            <p style="font-weight:bold"> *Please note that the currency of the recipient will be USD. </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="shop-item">
                        <div class="title">
                            <h3>Already made Western Union transfer?</h3>
                            <h3>Please fill in the details.<span class="danger"> </span></h3>
                        </div>
                        <div class="actions">
                            <form action="addmoney.php" id="addmoney_form" method="post" enctype="multipart/form-data">
                                <div class="hidden">
                                    <input type="hidden" name="date" value="" id="date">
                                    <input type="hidden" name="time" value="" id="time">
                                </div>

                                <label>Sender's first name<span class="red">*</span> :</label>
                                <input type="text" required class="form-control" id="first_name" name="first_name"
                                       placeholder="As you submitted in the Western Union money sending form">

                                <p>

                                    <label>Sender’s middle name (if applicable):</label>
                                    <input type="text" class="form-control" id="middle_name" name="middle_name"
                                           placeholder="As you submitted in the Western Union money sending form">

                                <p>
                                    <label>Sender’s last name <span class="red">*</span>:</label>
                                    <input required type="text" class="form-control" id="last_name" name="last_name"
                                           placeholder="As you submitted in the Western Union money sending form">
                                </p>


                                <label>Sender's Email<span class="red">*</span>:</label>
                                <input required type="email" class="form-control"
                                       required id="Email" name="sender_email" placeholder="Sender's Email">
                                <p>

                                    <label>Originating country of the transfer<span class="red">*</span>:</label>
                                    <select name="originating_country" id="originating_country" class="form-control">
                                        <option value="Select Country">Select Country</option>
                                        <?php getCountryDropdownWithoutCode(); ?>
                                    </select>
                                <p>

                                    <label>How was the money sent<span class="red">*</span>:</label>
                                    <select name="money_sent_type" id="money_sent_type" required="required"
                                            class="form-control">
                                        <option value="">Select One</option>
                                        <option value="1">Sent in person at agent location</option>
                                        <option value="2">Sent online</option>
                                    </select>
                                <p>

                                    <label>Recipient’s currency<span class="red">*</span>:</label>
                                    <input type="text" readonly="readonly" class="form-control" id="recipient_currency"
                                           name="recipient_currency"
                                           placeholder="USD">
                                <p>

                                    <label>Amount (in USD)<span class="red">*</span>:</label>
                                    <input type="digits" required="required" class="form-control" name="amount" id="Amount"
                                           placeholder="Amount (in USD)">

                                <p>
                                    <label>MTCN<span class="red">*</span>:</label>
                                    <input type="text" required="required" class="form-control" id="mtcn" name="mtcn"
                                           placeholder="MTCN">

                                <p>
                                    <label>Western Union payment confirmation receipt<span class="red">*</span>:</label>
                                    <input type="file" required="required" name="wureceipt" id="receipt"/>
                                <p>Only jpg, jpeg, gif, pdf, bmp and png files are allowed. Maximum size aloowed 5MB</p>

                                <div>
                                    <span id="file_error" class="error"><p></p></span>
                                </div>
                                <br>
                                <button type="submit" class="btn pull-right" name="submit">Submit</button>
                                <br><br>
                                <div class="clearfix"></div>
                                <p>
                                    <i>
                                        After you submit these details, your deposit order will instantly appear in the <a
                                            href="deposits.php">Deposits</a> page. Balance will be credited to your
                                        account as soon as we verify your payment. You will also get a confirmation email
                                        after payment verification.
                                    </i>
                                </p>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="js/jquery.validate.min.js"></script>
<script>
    //alert(new Date().toTimeString());
    function getTime()
    {
        var date_format = '12';
        var d = new Date();
        var hour = d.getHours();
        var minutes = d.getMinutes();
        var result = hour;
        var ext = '';

        if (date_format == '12')
        {
            if (hour > 12) {
                ext = 'PM';
                hour = (hour - 12);

                if (hour < 10) {
                    result = "0" + hour;
                } else if (hour == 12) {
                    hour = "00";
                    ext = 'AM';
                }
            } else if (hour < 12) {
                result = ((hour < 10) ? "0" + hour : hour);
                ext = 'AM';
            } else if (hour == 12) {
                ext = 'PM';
            }
        }

        if (minutes < 10)
        {
            minutes = "0" + minutes;
        }
        var offset = d.getTimezoneOffset(), o = Math.abs(offset);
        var time_zone = (offset < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + ":" + ("00" + (o % 60)).slice(-2);
        return result = result + ":" + minutes + ' ' + ext + ' ' + 'GMT' + time_zone;
    }

    function getDate()
    {
        var d = new Date();
        var strDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
        return strDate;
    }
    $(document).ready(function () {
        $('#time').val(getTime());
        $('#date').val(getDate());
        $("#addmoney_form").submit(function () {
            $('#date').val(getDate());
            $('#time').val(getTime());
        });
    });
    $('#addmoney_form').validate({
        errorClass: 'customErrorClass',
    });

    $(document).ready(function () {

        //upload file validation
        $('body').on('change', 'input#receipt', function () {
            //file size validation
            var file_size = this.files[0].size;
            if (file_size > 5000000) {
                $("#file_error").children("p").html("File size is greater than 5MB.");
                $("#file_error").show();
                this.value = '';
            } else {
                $("#file_error").children("p").html("");
                $("#file_error").hide();
            }

            //file extension validation
            var ext = this.value.match(/\.(.+)$/)[1];

            var ext_arr = new Array();
            ext_arr = ['jpg', 'jpeg', 'pdf', 'png', 'gif', 'bmp'];

            if ($.inArray(ext, ext_arr) == -1) {
                $("#file_error").children("p").html("File type is not accepted.");
                $("#file_error").show();
                this.value = '';
            } else {
                $("#file_error").children("p").html("");
                $("#file_error").hide();
            }
        });


        //MTCN field validation
        $("#mtcn").keydown(function (e) {

            var txtVal = $(this).val();

            //desh prefixed
            if (e.keyCode != 8) {
                if (txtVal.length == 3 || txtVal.length == 7) {
                    $(this).val(txtVal + "-");
                }
            }
            //number only validation
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    (e.keyCode >= 35 && e.keyCode <= 40)) {

                return;
            }

            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }

            // 10 digites numbers only
            if (txtVal.length > 11) {
                e.preventDefault();
                return false;
            }
        });

        $('#addmoney_form').on("submit", function () {
            var mtc = $("#mtcn").val().length;

            if (mtc < 12 && $("#mtcn").val() != "") {
                alert("Please insert 10 digites MTCN number");
                return false;
            }
        });

    });

</script>
<?php require("footer.php"); ?>