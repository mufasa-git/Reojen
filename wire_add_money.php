<?php
ob_start();
session_start();

if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name'])) {
    header('location:login.php');
}


require_once("header.php");
require_once("connect/db.php");
require_once ("functions.php");

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

$getcountrycode = "SELECT * FROM users WHERE user_id=" . $_SESSION['user_id'];
$data = mysqli_fetch_assoc(mysqli_query($connection, $getcountrycode));
$country = "SELECT * FROM countrycode WHERE name='" . strtoupper($data['Country']) . "'";
$c = mysqli_fetch_assoc(mysqli_query($connection, $country));
$mob = str_replace("+" . $c['Code'], " ", $data['mobile_no']);
$num = "+" . $c['Code'] . "  " . $mob;



if (isset($_POST['submit'])) {
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "INSERT INTO pending (fname,mobile_no, email, amount, mtcn,country,question,answer,status,Date) VALUES ('" . $_SESSION['user_name'] . "','" . $_SESSION["mob_id"] . "','" . $_POST["email"] . "','" . $_POST["amount"] . "','" . $_POST["mtcn"] . "','" . $data['Country'] . "','" . $_POST["question"] . "','" . $_POST["answer"] . "','Pending','" . $Default_time . "' )";
    if (!mysqli_query($connection, $sql)) {
        echo " error ";
    }
    mysqli_close($connection);
    $to = "marijana.upworktr@gmail.com"; // this is the receiver's Email address
    //$to = "nilesh.l@infiny.in"; // this is your Email address
    $subject = "Money Request"; // this is the sender's Email address
    $fname = $_SESSION['user_name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $mtcn = $_POST['mtcn'];
    $country = $data['Country'];
    $TestQn = $_POST['question'];
    $answer = $_POST['answer'];
    $headers2 = "From:" . $to;
    $message = "Mobile number " . $num . "\n" . "Name of sender:  " . $fname . "\n" . "Email: " . $email . "\n" . "Amount:   " . $amount . "\n" . "MTCN:  " . $mtcn . "\n" . "Country: " . $country . "\n" . "Test Question: " . $TestQn . "\n" . "Answer: " . $answer;
    $sent = mail($to, $subject, $message, $headers2);
    if ($sent) {
        ?>
        <div class="alert alert-success">Thank you <?php echo $fname ?>, we have received your deposit order. Balance will be credited to your account as soon as we verify your payment. You can see your deposit order status in <a href="deposits.php" >Deposits </a> page. You will also get a confirmation email after payment verification.
        </div>
        <?php
    } else {
        print "We encountered an error sending your mail";
    }
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
            <nav id="mainmenu" class="mainmenu">
                <ul>
                    <li class="logo-wrapper">
                        <a href="index.php">
                            <img src="img/logo.png" style="width: 250px;height: 30px;"/>
                        </a>
                    </li>
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li class="active">
                        <a href="addmoney.php">Add money</a>
                    </li>
                    <li >
                        <a href="deposits.php">Deposits</a>
                    </li>
                    <li>
                        <a href="insupport.php">Support</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="eshop-section section">
        <div class="container">
            <h2>Add money</h2>
            <div class="well well-small">
                <p align="center">
                    Add money to your account by making a wire transfer for making purchases.
                </p>
            </div>
            <img class="img-responsive chsv" src="img/wire-logo.png">

            <div class="col-sm-6 col-sm-offset-3">


                <form>
                    <div class="form-group">
                        <label for="name">First name:</label>
                        <input type="name" class="form-control" id="name" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label for="name">Last name:</label>
                        <input type="name" class="form-control" id="name" placeholder="Last name">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount to transfer (in USD):</label>
                        <input type="amount" class="form-control" id="amount" placeholder="Amount to transfer (in USD)">
                    </div>
                    <div class="form-group">
                        <label for="Country where your bank is located:">Country where your bank is located:</label>
<?php getCountryDropdownWithoutCode($location); ?>
                    </div>
                    <button type="submit" class="btn" name="submit">Continue</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function validate()
    {
        var ee = true;
        if ($("#fname").val() == '')
        {
            $("#fname").next('.error').children("p").html("Sender's name is required");
            $("#fname").next('.error').show();
            ee = false;
        }
        if ($("#Email").val() == '')
        {
            $("#Email").next('.error').children("p").html("Sender's email is required");
            $("#Email").next('.error').show();
            ee = false;
        } else
        {
            if (!validateEmail($("#Email").val()))
            {
                $("#Email").next('.error').children("p").html('Invalid email address');
                $("#Email").next('.error').show();
                ee = false;
            }
        }
        if ($("#Amount").val() == '')
        {
            $("#Amount").next('.error').children("p").html('Amount is required');
            $("#Amount").next('.error').show();
            ee = false;
        } else if (!v_amount($("#Amount").val()))
        {

            $("#Amount").next('.error').children("p").html('Use numbers and decimal point only');
            $("#Amount").next('.error').show();

            ee = false;

        }




        if ($("#mtcn").val() == '')
        {
            $("#mtcn").next('.error').children("p").html('MTCN is required');
            $("#mtcn").next('.error').show();
            ee = false;
        }
        /*else if(!v_MTCN($("#mtcn").val()))
         {
         $("#mtcn").next('.error').children("p").html("Don't use spaces, dashes, hyphens or any symbol");
         $("#mtcn").next('.error').show();
         ee=false;
         }*/
        if ($("#country").val() == '')
        {
            $("#country").next('.error').children("p").html("Sender's country is required");
            $("#country").next('.error').show();
            ee = false;
        }
        if (ee == true)
            return true;
        else
            return false;
    }
    function v_amount(s) {
        var rgx = /^[0-9.]+$/;
        return s.match(rgx);
    }
    function v_amountDecimal(s) {
        var rgx = /^[0-9]+\.?[0-9]*$/;
        return s.match(rgx);
    }
    function v_MTCN(s) {
        if ($("#mtcn").val() != "")
        {
            var rgx = /^[0-9]+$/;
            return s.match(rgx);
        } else
        {
            $("#mtcn").next('.error').children("p").html("Don't use spaces, dashes, hyphens or any symbol");
            $("#mtcn").next('.error').show();
            ee = false;
            return false;
        }
    }
    function validateEmail(email) {
        //var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        //return emailReg.test( email );
        if (email.indexOf('@') === -1)
        {
            return false;
        }
        return true;
    }
    function hide_nxt(c)
    {
        $(c).next('.error').hide();
    }
    function hide_amt(c)
    {
        $(c).next('.error').hide();
        $("#errorAmnt").hide();
    }
    function dynamicMTCN(txt)
    {
        if ($("#mtcn").val() != "")
        {
            /*if(!v_MTCN($("#mtcn").val()))
             {
             $("#mtcn").next('.error').children("p").html("Don't use spaces, dashes, hyphens or any symbol");
             $("#mtcn").next('.error').show();
             ee=false;
             }*/
        } else
        {
            $("#mtcn").next('.error').children("p").html('MTCN is required');
            $("#mtcn").next('.error').show();
            ee = false;
        }
    }
    function dynamiAmnt(txt)
    {
        if ($("#Amount").val() != "")
        {
            if (!v_amount($("#Amount").val()))
            {

                $("#Amount").next('.error').children("p").html('Use numbers and decimal point only');
                $("#Amount").next('.error').show();
                ee = false;

            }
        } else
        {
            $("#Amount").next('.error').children("p").html('Amount is required');
            $("#Amount").next('.error').show();
            ee = false;
        }


    }
    function ValidateDecimal()
    {
        if ($("#Amount").val() != "")
        {

            var temp = $("#Amount").val();
            var count = temp.split(".").length;
            if (count > 2)
            {

                $("#errorAmnt").html("<p>You can't use more than one decimal point.</p>");
                $("#errorAmnt").show();
                ee = false;
            }
        } else
        {
            $("#Amount").next('.error').children("p").html('Amount is required');
            $("#Amount").next('.error').show();
            ee = false;
        }

    }



</script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script type="text/javascript">
    //$(function() {
//    // code here
//    if($.cookie('money')=='Y')
//        alert("Add money to your account to purchase this product.");
//    $.removeCookie('money');
    //});

</script>

<script type="text/javascript">

    /*  $(document).ready(function () {
     
     window.addEventListener('beforeunload',recordeCloseTime);
     
     });
     
     function recordeCloseTime() {
     
     $.ajax({ type: "GET",
     
     url: "logout",
     });
     } */


</script>
<script type="text/javascript">
//    function ajaxFunction()
//    {
//        var xmlHttp;
//        try
//        {
//            // Firefox, Opera 8.0+, Safari
//            xmlHttp=new XMLHttpRequest();
//        }
//        catch (e)
//        {
//            // Internet Explorer
//            try
//            {
//                xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
//            }
//            catch (e)
//            {
//                try
//                {
//                    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
//                }
//                catch (e)
//                {
//                    alert("Your browser does not support AJAX!");
//                    return false;
//                }
//            }
//        }
//        xmlHttp.onreadystatechange=function()
//        {
//            if(xmlHttp.readyState==4)
//            {
//                document.myForm.time.value=xmlHttp.responseText;
//            }
//        }
//        xmlHttp.open("GET","logout",true);
//        xmlHttp.send(null);
//    }
</script>

<!-- End Homepage Slider -->





<?php require("footer.php"); ?>