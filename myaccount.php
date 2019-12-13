<?php
ob_start();
session_start();
require_once("libraries/helper.php");
if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name'])) {
    header('location:login.php');
}
require("header.php");

include('connect/db.php');  // Database connection and settings

 $uid = $_SESSION['user_id'];

//Check username and password from database

$file_name = "";
if (isset($_POST['changeName'])) {
    //update table
    unset($_POST['changeName']);
    include_once('query.php');
    $q = new QueryFire();
    $data = $_POST;
    $where = 'user_id =' . $uid;
    $data = $q->upDateTable('users', $where, $data);
}
if (isset($_POST['btn-edit'])) {
    // if(!empty($c) && strpos($_POST['mobile_no'], $num) !== false)
    // {
    $custom_question1 = 0;
    $custom_question2 = 0;
    if ($_POST['Question1'] == 'custom1') {
        $securityQn1 = trim(mysqli_escape_string($connection, $_POST['txtQustion1']));
        $custom_question1 = 1;
    } else {
        $securityQn1 = $_POST['Question1'];
    }
    $Answer1 = $_POST['c_answer1'];
    if ($_POST['Question2'] == 'custom2') {
        $securityQn2 = trim(mysqli_escape_string($connection, $_POST['txtQustion2']));
        $custom_question2 = 1;
    } else {
        $securityQn2 = $_POST['Question2'];
    }

    $countryres = GetCountry($_POST['country_res'], $connection);
    $country = GetCountry($_POST['country_res'], $connection);

    $set = '';
    if ((!empty($_POST['password']) && !empty($_POST['c_password'])) && (trim($_POST['password']) === trim($_POST['c_password'])))
        $set .= ', password="' . md5(trim($_POST['password'])) . '" , c_password= "' . md5(trim($_POST['password'])) . '"';

    if (!empty($_POST['country_res']))
        $set .= ', Country="' . $countryres . '" , country_res= "' . $country . '"';

    if (!empty($_POST['c_answer1']))
        $set .= ' , SecurituyQuestion1 ="' . $securityQn1 . '", custom_question1 ="' . $custom_question1 . '", Answer1="' . trim($_POST['c_answer1']) . '"';
    if (!empty($_POST['c_answer2']))
        $set .= ', SecurityQuestion2 = "' . $securityQn2 . '", custom_question2 ="' . $custom_question2 . '", Answer2 = "' . trim($_POST['c_answer2']) . '"';

	$UserEmail = $_POST['UserEmail'];	
    $query_create_user = 'UPDATE users SET mobile_no="' . trim($_POST['mobile_no']) . '" , CompanyName = "' . trim($_POST['CompanyName']) . '" , Email = "'.$UserEmail.'" ' . $set . ' where user_id=' . $uid;
    $created_user = mysqli_query($connection, $query_create_user) or die("Error: " . mysqli_error($connection));
    if ($created_user) {
        //If the Insert Query was successfull.
        $_SESSION['account_change'] = "true";
		$_SESSION['email'] = $UserEmail;
        $_SESSION['account_change_msg'] = '<div class="alert alert-success">Updated Successfully </div>';
        header("location: myaccount.php");
        exit();
    } else {
        $_SESSION['account_change'] = "true";
        $_SESSION['account_change_msg'] = '<div class="alert alert-info">You could not be update due to a system error. We apologize for any inconvenience.</div>';
        header("location: myaccount.php");
        exit();
    }
    // }
    // else 
    // { 
    //     $_SESSION['account_change'] ="true";
    //     $_SESSION['account_change_msg'] = '<div class="alert alert-info">Country and country code does not match. Please enter correct country code.</div>';
    //     header("location: myaccount.php");
    //     exit();
    // }
}

function GetCountry($code, $connection) {
    include('connect/db.php');
    $query_GetCountry = "SELECT * FROM countrycode WHERE Code ='$code'";
    $result = mysqli_query($connection, $query_GetCountry);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $Country = $row['Country'];
    return $Country;
}

$sql = "SELECT * FROM users u WHERE user_id=" . $uid;
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
/* $emailid = $row['Email']; */
 $names = ucfirst($row['fname']) . ' ' . ucfirst($row['mname']) . ' ' . ucfirst($row['lname']);
 $fname = $row['fname'];
 $mname = $row['mname'];
$lname = $row['lname'];
$_SESSION['user_name'] = $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'];
$_SESSION['CompanyName'] = $row['CompanyName'];
$CompanyName = $row['CompanyName'];
$CompanyNamess = $row['CompanyName'];
 $SecurituyQuestion1 = $row['SecurituyQuestion1'];
 $custom_question1 = $row['custom_question1'];
 $Answer1 = $row['Answer1'];

 $SecurityQuestion2 = $row['SecurityQuestion2'];
 $custom_question2 = $row['custom_question2'];
 $Answer2 = $row['Answer2'];

$mobno = $row['mobile_no'];
$country = $row['Country'];
$UserEmail = $row['Email']; 

$q = mysqli_query($connection, "select Code from countrycode where Country='" . $country . "'");
$c_result = mysqli_fetch_array($q);
$country_code = isset($c_result['Code']) ? $c_result['Code'] : '';
/* $address=$row['Address'];
  $Profile_pic=$row['Profile_pic']; */
$_SESSION["show_notification"] = 1;
$nowType = $connection->query('SELECT * FROM settings WHERE name="payment_type" LIMIT 1')->fetch_assoc();

if ($nowType['value'] == 'BACS') {
    $currency_symbol = '&#163;';
} elseif($nowType['value'] == 'PAYPAL') {
	$currency_symbol = '<i class="fa fa-gbp"></i>';
} else {
    $currency_symbol = '&#x24;';
}
?> 
<style>
    .col-xs-12.col-sm-8.nameprofile {
        text-align: center;
        margin-top: 93px;
    }
    .panel.panel-default.profile {
        border: 1px solid #EEE;
        box-shadow: 0 33px 38px -17px;
    }
    #uemail {
    background-attachment: scroll;
    background-clip: border-box;
    /*background-color: #C52525;*/
    background-image: none;
    background-origin: padding-box;
    background-position: 0 0;
    background-repeat: repeat;
    background-size: auto auto;
    color:red;
    /* font-size: 10px; */
    margin-bottom: 0;
    margin-left: 0;
    margin-right: 0;
    margin-top: 1px;
    /*padding-bottom: 7px;*/
    padding-left: 12px;
    padding-right: 12px;
    padding-top: 0;
    position: relative;
    text-align: left;
    /* text-indent: -15px; */
    z-index: 1;
    border-radius: 23px;
}
.errer11{
    background-attachment: scroll;
    background-clip: border-box;
    /*background-color: #C52525;*/
    background-image: none;
    background-origin: padding-box;
    background-position: 0 0;
    background-repeat: repeat;
    background-size: auto auto;
    color:red;
    /* font-size: 10px; */
    margin-bottom: 0;
    margin-left: 0;
    margin-right: 0;
    margin-top: 1px;
    /*padding-bottom: 7px;*/
    padding-left: 12px;
    padding-right: 12px;
    padding-top: 0;
    position: relative;
    text-align: left;
    /* text-indent: -15px; */
    z-index: 1;
    border-radius: 23px;
}
</style>
<body>

    <!--[if lt IE 7]>
            
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <!-- Navigation & Logo-->

    <div class="mainmenu-wrapper">
        <div class="container">
            <div class="menuextras">
                <div class="extras">
                    <ul>
                        <li class="shopping-cart-items">
                            <i class="glyphicon glyphicon-shopping-cart icon-white"></i> 
                            <a href="#">
                                <b> Balance <?php echo $currency_symb; ?> <?php echo wallet();?></b>
                            </a>
                        </li>
                        <li>
                            <div class="btn-group pull-right">
                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span class="hidden-sm hidden-xs"> <?php echo $CompanyNamess; ?></span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="myaccount.php">My account</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Log out</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
<?php require_once 'nav.php'; ?>

        </div>

    </div>



    <!-- Page Title -->
    <div class="section section-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1>My Account</h1>
                </div>
            </div>
        </div>
    </div>

    <form role="form" action="myaccount.php" method="post" enctype="multipart/form-data" onSubmit="return validate();">

        <div class="container">
            <div class="row">
                <div class="col-md-10 pro">
                    <div class="container">

                        <div class="panel panel-default profile">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 nameprofile">
<?php
if (isset($_SESSION['account_change']) && $_SESSION['account_change'] == "true") {
    ?>
    <?php echo $_SESSION['account_change_msg']; ?>

    <?php
    unset($_SESSION['account_change']);
}
?>
                                        <div class="form-group">
                                            <strong>Name</strong>:  
                                            <input class="form-control" type="text" placeholder=" Name " value="<?= $names; ?>" readonly> <a href="#"><span data-toggle="modal" data-target="#myModal"><small>change</small></span></a> </div>

                                        <div class="form-group">
                                            <label for="register-password"><i class="icon-lock"></i> <b>Country of residence*</b></label>           
                                            <select name="country_res" id="country_res" class="form-control">
                                                <!--<option value="Select Country">Select Country</option>-->
                                        <?php
                                        getCountryDropdownWithoutIP($country_code);
                                        ?>
                                            </select>
                                            <span class="error" id="Cntryreserror" name="Cntryreserror" ><p></p></span>
                                        </div>

                                        <div class="form-group"><strong>Mobile number (in international format)</strong>: <input name="mobile_no" class="form-control" onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" id="register-mobile" onkeypress="javascript:return isNumberKey(event);" type="text" placeholder="Enter Your Mobile Number" value="<?php echo $mobno ?>"> 
                                            <span class="error"><p></p></span>
                                            <span class="error" id="Cntryerror" name="Cntryerror" ></span>
                                            <div id="mob_errorsuccess" class="errorsuccess" style="display: none;color:Green;"></div>
                                            <div id="mob_error" class="error" style="display: none;color:red;"></div>
                                            <div id="email_error" class="error" style="display: none;color:red;"></div>
                                        </div>
										<div class="form-group">
                                            <strong>Email Address <?php if($UserEmail){echo '*';}else{echo '';}; ?></strong>  
                                            <input name="UserEmail" id="UserEmail" class="form-control" type="text" placeholder="Email Address " value="<?php echo $UserEmail; ?>"> 
                                            <input  id="UserEmails" class="form-control" type="hidden" placeholder="Email Address " value="<?php echo $UserEmail; ?>">      
                                            <span><p id="uemail"></p></span>
                                        </div>
										
                                                                                <!--<span class="error" ><p></p></span>-->
                                        <div class="form-group">
                                            <strong>Company Name (optional)</strong>:  <input name="CompanyName" class="form-control" type="text" placeholder="Company Name " value="<?php echo $CompanyName; ?>"> 
                                        </div>

                                        <div class="form-group">
                                            <label for="register-password"><i class="icon-lock"></i> <b>Password</b></label>
                                            <div style="width:200px;padding-left: 50px;float: right;cursor: pointer;">
                                                <a id="showpwd" onclick="shohide()">Show password</a></div>
                                            <input onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" 
                                                   class="form-control" id="registerpassword" type="password" placeholder=""
                                                   name="password" autocomplete="off" value="<?php //if(isset($_REQUEST['password'])){echo $_REQUEST['password'];} ?>">
                                            <span class="error" ><p></p></span>
                                        </div>
                                        <div class="show_tooltip notification-password" style="display: none;">
                                            <img src="img/noti.png">
                                            Your password must contains a minimum of 8 characters and must contain at least two of the following-<br>
                                            * Upper case letter(s)<br>
                                            * Lower case letter(s)<br>
                                            * Number(s).
                                        </div>

                                        <div class="form-group">
                                            <label for="register-password2"><i class="icon-lock"></i> <b>Re-enter password</b></label>
                                            <div style="width:200px;padding-left: 50px;float: right;cursor: pointer;">
                                                <a id="showpwdr" onclick="shohider()">Show password</a></div>
                                            <input onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" 
                                                   autocomplete="off" id="registerpassword2" type="password" placeholder="" name="c_password" 
                                                   value="<?php //if(isset($_REQUEST['c_password'])){echo $_REQUEST['c_password'];} ?>">
                                            <span class="error" name="pwderror" id="pwderror" ><p></p></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="register-Qn1"><i class="icon-lock"></i> <b>Security Question 1 </b></label>
                                            <select name="Question1" id="Question1" placeholder="Select Question" class="form-control" onChange="ShowHideDiv();hide_nxt(this);">
                                                <!--<option selected>Select question</option>-->
                                                <option value="custom1" <?php 
                                                    if ($SecurituyQuestion1 == 'custom1') {
                                                        echo 'selected';
                                                    } else if ($custom_question1 == '1') {
                                                    echo "selected";
                                                } ?>>Create a custom security question</option>

                                                <option <?php 
                                                    if ($custom_question1 == "What was the house number and street name you lived in as a child?") {
                                                        echo 'selected';
                                                    }
                                                else if ($SecurituyQuestion1 == 'What was the house number and street name you lived in as a child?') {
                                                    echo "selected";
                                                } ?>>What was the house number and street name you lived in as a child?</option>

                                                <option <?php 
                                                    if ($custom_question1== "What were the last four digits of your childhood telephone number?") {
                                                        echo 'selected';
                                                    }
                                                 else if ($SecurituyQuestion1 == 'What were the last four digits of your childhood telephone number?') {
                                                    echo "selected";
                                                } ?>>What were the last four digits of your childhood telephone number?</option>

                                                <option <?php 
                                                    if ($custom_question1 == "What primary school did you attend?") {
                                                        echo 'selected';
                                                    }
                                                 else if ($SecurituyQuestion1 == 'What primary school did you attend?') {
                                                    echo "selected";
                                                } ?>>What primary school did you attend?</option>

                                                <option <?php 
                                                    if ($custom_question1 == "In what town or city was your first full time job?") {
                                                        echo 'selected';
                                                    }
                                                 else if ($SecurituyQuestion1 == 'In what town or city was your first full time job?') {
                                                    echo "selected";
                                                } ?>>In what town or city was your first full time job?</option>

                                                <option <?php 
                                                    if ($custom_question1 == "In what town or city did you meet your spouse/partner?") {
                                                        echo 'selected';
                                                    }
                                                 else if ($SecurituyQuestion1 == 'In what town or city did you meet your spouse/partner?') {
                                                    echo "selected";
                                                } ?>>In what town or city did you meet your spouse/partner?</option>

                                                <option <?php 
                                                if ($custom_question1 == 'What is the last name of the teacher who gave you your first failing grade?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurituyQuestion1 == 'What is the last name of the teacher who gave you your first failing grade?') {
                                                echo "selected";
                                            } ?>>What is the last name of the teacher who gave you your first failing grade?</option>

                                                <option <?php 
                                                if ($custom_question1 == 'In what city or town does your nearest sibling live?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurituyQuestion1 == 'In what city or town does your nearest sibling live?') {
                                                echo "selected";
                                            } ?>>In what city or town does your nearest sibling live?</option>

                                                <option <?php 
                                                if ($custom_question1 == 'In what year was your father born?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurituyQuestion1 == 'In what year was your father born?') {
                                                echo "selected";
                                            } ?>>In what year was your father born?</option>

                                                <option <?php 
                                                if ($custom_question1 == 'What is the name of your favorite childhood friend?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurituyQuestion1 == 'What is the name of your favorite childhood friend?') {
                                                echo "selected";
                                            } ?>>What is the name of your favorite childhood friend?</option>

                                                <option <?php 
                                                if ($custom_question1 == 'What was your favorite food as a child?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurituyQuestion1 == 'What was your favorite food as a child?') {
                                                echo "selected";
                                            } ?>>What was your favorite food as a child?</option>

                                                <option <?php
                                                if ($custom_question1 == 'What is your favorite team?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurituyQuestion1 == 'What is your favorite team?') {
                                                echo "selected";
                                            } ?>>What is your favorite team?</option>

                                                <option <?php 
                                                if ($custom_question1 == 'What was your favorite sport in high school?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurituyQuestion1 == 'What was your favorite sport in high school?') {
                                                echo "selected";
                                            } ?>>What was your favorite sport in high school?</option>
                                            </select>
                                            <?php
                                            if ((isset($_REQUEST['txtQustion1']) && $custom_question1 == 'custom1' && $_REQUEST['txtQustion1'] != '') || (isset($SecurituyQuestion1) && $custom_question1 == 1 && $SecurituyQuestion1 != '')) {
                                                $sty1 = 'style="display: block"';
                                            } else {
                                                $sty1 = 'style="display: none"';
                                            }
                                            ?>
                                            <div id="dvCustomize" <?php echo $sty1; ?>>
                                                <input class="form-control" type="text" id="txtQustion1" name="txtQustion1" onChange="hide_question1()"
                                                       placeholder="Security Question 1" value="<?php if ($custom_question1) {
                                                echo $SecurituyQuestion1;
                                            } else if ($custom_question1 == '1' && $SecurituyQuestion1 != '') {
                                                $SecurituyQuestion1;
                                            } ?>" />
                                            </div>
                                            <span class="error" id="Qn1error" name="Qn1error" ><p></p></span>


                                        </div>
                                        <div class="form-group">
                                            <label for="register-password2"><i class="icon-lock"></i> <b>Answer 1</b></label>
                                            <input id="c_answer1" onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" 
                                                   autocomplete="off" type="text" placeholder="" name="c_answer1" 
                                                   value="">
                                            <?php // echo $Answer1; ?>
                                            <span><p id="ec_answer1" class="errer11"></p></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="register-Qn2"><i class="icon-lock"></i> <b>Security Question 2</b></label>
                                            <select name="Question2" id="Question2" placeholder="Select Question" class="form-control" 
                                                    onChange="ShowHideDiv2();hide_nxt(this);">
                                                <!--<option selected>Select question</option>-->
                                                <option value="custom2" <?php 
                                                if ($custom_question2 == 'custom2') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == '1') {
                                                echo "selected";
                                            } ?>>Create a custom security question</option>

                                                <option <?php 
                                                if ($custom_question2 == "What is the middle name of your oldest child?") {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == 'What is the middle name of your oldest child?') {
                                                echo "selected";
                                            } ?>>What is the middle name of your oldest child?</option>

                                                <option <?php 
                                                if ($custom_question2 == "What are the last five digits of your driver's licence number?") {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == "What are the last five digits of your driver's licence number?") {
                                                echo "selected";
                                            } ?>>What are the last five digits of your driver's licence number?</option>

                                                <option <?php 
                                                if ($custom_question2 == "What is your grandmother's (on your mother's side) maiden name?") {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == "What is your grandmother's (on your mother's side) maiden name?") {
                                                echo "selected";
                                            } ?>>What is your grandmother's (on your mother's side) maiden name?</option>

                                                <option <?php 
                                                if ($custom_question2 == "What is your spouse or partner's mother's maiden name?") {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == "What is your spouse or partner's mother's maiden name?") {
                                                echo "selected";
                                            } ?>>What is your spouse or partner's mother's maiden name?</option>

                                                <option <?php 
                                                if ($custom_question2 == "In what town or city did your mother and father meet?") {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == 'In what town or city did your mother and father meet?') {
                                                echo "selected";
                                            } ?>>In what town or city did your mother and father meet? </option>

                                                <option <?php 
                                                if ($custom_question2 == 'What was the make and model of your first car?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == 'What was the make and model of your first car?') {
                                                echo "selected";
                                            } ?>>What was the make and model of your first car?</option>

                                                <option <?php 
                                                if ($custom_question2== 'What was the name of the hospital where you were born?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == 'What was the name of the hospital where you were born?') {
                                                echo "selected";
                                            } ?>>What was the name of the hospital where you were born?</option>

                                                <option <?php 
                                                if ($custom_question2 == 'Who is your childhood sports hero?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == 'Who is your childhood sports hero?') {
                                                echo "selected";
                                            } ?>>Who is your childhood sports hero?</option>

                                                <option <?php 
                                                if ($custom_question2 == 'What was the name of the company where you had your first job?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == 'What was the name of the company where you had your first job?') {
                                                echo "selected";
                                            } ?>>What was the name of the company where you had your first job?</option>

                                                <option <?php 
                                                if ($custom_question2 == 'When is your anniversary?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == 'When is your anniversary?') {
                                                echo "selected";
                                            } ?>>When is your anniversary?</option>

                                                <option <?php 
                                                if ($custom_question2 == 'What is your favorite color?') {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == 'What is your favorite color?') {
                                                echo "selected";
                                            } ?>>What is your favorite color?</option>

                                                <option <?php 
                                                if ($custom_question2 == "What is your oldest cousin/'s first and last name?") {
                                                    echo 'selected';
                                                }
                                             else if ($SecurityQuestion2 == "What is your oldest cousin's first and last name?") {
                                                echo "selected";
                                            } ?>>What is your oldest cousin's first and last name?</option>
                                            </select>

<?php
if ((isset($_REQUEST['txtQustion2']) && $custom_question2 == 'custom2' && $_REQUEST['txtQustion2'] != '') || (isset($SecurityQuestion2) && $custom_question2 == 1 && $SecurityQuestion2 != '')) {
    $sty2 = 'style="display: block"';
} else {
    $sty2 = 'style="display: none"';
}
?>
                                            <div id="dvCustomize2" <?php echo $sty2; ?>>
                                                <input class="form-control" type="text" id="txtQustion2" name="txtQustion2" onChange="hide_question2()"
                                                       placeholder="Security Question 2" value="<?php if (isset($_REQUEST['txtQustion2'])) {
    echo $_REQUEST['txtQustion2'];
} else if ($custom_question2 == '1' && $SecurityQuestion2 != '') {
    echo $SecurityQuestion2;
} ?>" />
                                            </div>
                                            <span class="error" id="Qn2error" name="Qn2error" ><p></p></span>

                                        </div>
                                        <div class="form-group">
                                            <label for="register-password2"><i class="icon-lock"></i> <b>Answer 2</b></label>
                                            <input id="c_answer2" onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" 
                                                   autocomplete="off" type="text" placeholder="" name="c_answer2" value=""/>
                                            <?php // echo $Answer2; ?>
                                            <span><p id="ec_answer2" class="errer11"></p></span>
                                        </div>

                                        <button type="submit" class="btn pull-right" name="btn-edit">Save </button>
                                    </div>

                                </div><!--/row-->
                            </div><!--/panel-body-->
                        </div><!--/panel-->


                    </div>
                </div>
            </div>
        </div>
    </form>


</div>

</div>


</div>

</div> 

</div>

</div>

</div>


<!-- Modal for change name -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Name</h4>
            </div>
            <form action="myaccount.php" method="post">
                <div class="modal-body">
                    <p><strong>First Name*</strong>: <input name="fname" required class="form-control" type="text" placeholder="First Name" value="<?php echo $fname; ?>"> 
                    </p>
                    <p><strong>Middle Name(optional)</strong>: <input name="mname" class="form-control" type="text" placeholder="Middle Name" value="<?php echo $mname; ?>"> 
                    </p>
                    <p><strong>Last Name*</strong>: <input name="lname" required class="form-control" type="text" placeholder="Last Name" value="<?php echo $lname; ?>"> 
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="changeName" >Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
        </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    function shohide(){
//        alert('hi');
        var inputtype = document.getElementById('registerpassword').type;
//        alert(inputtype);
        if(inputtype=='text'){
            document.getElementById('registerpassword').type='password';
            document.getElementById('showpwd').innerHTML='Show Password';
        }else if(inputtype=='password'){
             document.getElementById('registerpassword').type='text';
             document.getElementById('showpwd').innerHTML='Hide Password';
        }
    }
function shohider(){
//        alert('hi');
        var inputtype = document.getElementById('registerpassword2').type;
//        alert(inputtype);
        if(inputtype=='text'){
            document.getElementById('registerpassword2').type='password';
            document.getElementById('showpwdr').innerHTML='Show Password';
        }else if(inputtype=='password'){
             document.getElementById('registerpassword2').type='text';
             document.getElementById('showpwdr').innerHTML='Hide Password';
        }
    }
    // var table = document.getElementsByTagName('table')[0],

    //     rows = table.getElementsByTagName('tr'),

    //     text = 'textContent' in document ? 'textContent' : 'innerText';

    // console.log(text);



    // for (var i = 1, len = rows.length; i < len; i++){

    //     rows[i].children[0][text] = i + '. ' + rows[i].children[0][text];

    // }

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#country_res').on('change', function () {
             $("#register-mobile").val('+' + this.value);
        });
        $('#registerpassword').blur(function () {
            $(".show_tooltip").hide();
        });

        $('#registerpassword').focus(function () {
            $(".show_tooltip").show();
        });
    });
    function validate()
    {
        var ee = true;
        var cntry_length = $("#country_res option:selected").val().length;
        var mod_legnth = $("#register-mobile").val().length - 1;
        var org_mob_length = mod_legnth - cntry_length;
        $('#register-mobile').next('.error').hide();

        $(".form-group span.error").each(function (i) {
            $(this).hide();
        });
        if ($('#country_res option:selected').val() == 'Select Country')
        {
            $("#Cntryreserror p").html("Please select Country of residence");
            $("#Cntryreserror").show();
            ee = false;
        }

        if ($("#register-mobile").val() == '')
        {
            $("#register-mobile").next('.error').children("p").html('Enter your mobile number in international format');
            $("#register-mobile").next('.error').show();
            ee = false;
        } else if (!validatePlus($("#register-mobile").val()))
        {
            $("#register-mobile").next('.error').children("p").html('Mobile number must start with a leading + sign.');
            $("#register-mobile").next('.error').show();
            ee = false;
        } else if ($("#register-mobile").val().match(/\+/gi).length > 1)
        {
            $("#register-mobile").next('.error').children("p").html('No more non-numeric character is allowed in "Mobile number" field apart from the leading + sign');
            $("#register-mobile").next('.error').show();
            ee = false;
        } else if ($("#register-mobile").val().indexOf('+' + $("#country_res option:selected").val()) == -1)
        {
            $("#register-mobile").next('.error').children("p").html('Country code must match the country selected in "Country of residence" field');
            $("#register-mobile").next('.error').show();
            ee = false;
        } else if (!isValidChar($("#register-mobile").val()))
        {
            $("#register-mobile").next('.error').children("p").html('Invalid mobile number. Spaces, dashes, hyphens,symbols (except the leading + sign) aren\'t allowed');
            $("#register-mobile").next('.error').show();
            ee = false;
        } else if (org_mob_length < 4 || org_mob_length > 15)
        {
            $("#register-mobile").next('.error').children("p").html('The local part of mobile number (excluding the country code) should contain a minimum of 4 digits and a maximum of 15 digits');
            $("#register-mobile").next('.error').show();
            ee = false;
        }

        if ($("#registerpassword").val() != '')
        {
            if (!Validatepass($("#registerpassword").val()))
            {
                $("#registerpassword").next('.error').children("p").html('<small>Your password must contain minimum 8 characters and must contain at least two of the following: upper case letter(s), lower case letter(s), number(s)</small>');
                $("#registerpassword").next('.error').show();
                ee = false;
            }
            if ($("#registerpassword2").val() == '')
            {

                $("#registerpassword2").next('.error').children("p").html('');
                $("#registerpassword2").next('.error').show();
                ee = false;
            } else
            {
                if ($("#registerpassword").val() != $("#registerpassword2").val())
                {
                    ee = false;
                    $("#registerpassword2").next('.error').children("p").html("Your passwords don't match");
                    $("#registerpassword2").next('.error').show();
                }
            }
        }
//        if ($("#Question1").val() == 'Select question')
//        {
//
//            $("#Question1").parent().find('.error').children("p").html('Select security question 1');
//            $("#Question1").parent().find('.error').show();
//            ee = false;
//        }
//        if ($("#Question1").val() == 'custom1')
//        {
//            if ($("#txtQustion1").val() == '')
//            { 
//                $("#Question1").parent().find('.error').children("p").html('Enter your custom security question 1');
//                $("#Question1").parent().find('.error').show();
//                ee = false;
//            }
//        }
//        if ($("#Question2").val() == 'Select question')
//        {
//            $("#Question2").parent().find('.error').children("p").html('Selct security question 2');
//            $("#Question2").parent().find('.error').show();
//            ee = false;
//        }
//        if ($("#Question2").val() == 'custom2')
//        {
//            if ($("#txtQustion2").val() == '')
//            {
//                $("#Question2").parent().find('.error').children("p").html('Enter your custom security question 2');
//                $("#Question2").parent().find('.error').show();
//                ee = false;
//            }
//        }
//        if ($("#c_answer1").val() == '')
//        {
//
//            document.getElementById('ec_answer1').innerHTML="Enter answer 1.";
//            document.getElementById('c_answer1').focus();
//            ee = false;
//        }
//        if ($("#c_answer2").val() == '')
//        {
//
//            document.getElementById('ec_answer2').innerHTML="Enter answer 2.";
//            document.getElementById('c_answer2').focus();
//            ee = false;
//        }
          if ($("#UserEmail").val() == '' && $("#UserEmails").val() != '')
            { 
//                alert('hi');
                document.getElementById('uemail').innerHTML="Enter your email id.";
                document.getElementById('UserEmail').focus();
                ee = false;
            }
        if ($("#Cntryerror").html() != '')
        {
            ee = false;
        }
        if (ee == true)
        {

            if ($("#registerpassword").val() != $("#registerpassword2").val())
            {
                ee = false;
                $("#registerpassword").val("");
                $("#registerpassword2").val("");
                $("#registerpassword2").next('.error').children("p").html("Your passwords don't match");
                $("#registerpassword2").next('.error').show();
            } else
            {
                $(".form-group span.error").each(function (i) {
                    if ($(this).is(":visible"))
                    {
                        ee = false;
                    }

                });
            }
        }
        check_pass('p');
        check_conf_pass('rp');
        if (ee == true)
            return true;
        else
            return false;
    }



    function Validatepass(pass)
    {
		
		var passReg1 = /^(?=.*[a-z])(?=.*[A-Z])[A-Za-z\d\W]{8,}$/;
	 
		var passReg2 = /^(?=.*[A-Z])(?=.*\d)[A-Z\d\W]{8,}$/;
		var passReg5 = /^(?=.*[A-Z])(?=.*\W)[A-Z\d\W]{8,}$/;

		var passReg3 = /^(?=.*[a-z])(?=.*\d)[a-z\d\W]{8,}$/;
		var passReg6 = /^(?=.*[a-z])(?=.*\W)[a-z\d\W]{8,}$/;

		var passReg4 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d\W]{8,}$/;
		var passReg7 = /^(?=.*[A-Za-z])(?=.*\W)[A-Za-z\d\W]{8,}$/;

		if(!(passReg1.test( pass )) && !(passReg2.test( pass )) && !(passReg3.test( pass )) && !(passReg4.test( pass )) && !(passReg5.test( pass )) && !(passReg6.test( pass )) && !(passReg7.test( pass )))
		return false;
		else
			return true;
		
		//~ var passReg1 = /^(?=.*[a-z])(?=.*[A-Z])[A-Za-z\d]{8,}$/;
        //~ var passReg2 = /^(?=.*[A-Z])(?=.*\d)[A-Z\d]{8,}$/;
        //~ var passReg3 = /^(?=.*[a-z])(?=.*\d)[a-z\d]{8,}$/;
        //~ var passReg4 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
//~ 
        //~ if (!(passReg1.test(pass)) && !(passReg2.test(pass)) && !(passReg3.test(pass)) && !(passReg4.test(pass)))
            //~ return false;
        //~ else
            //~ return true;
        /*/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;*/
    }

    function CodeValidation() {

        var cntry = document.getElementById("country");
        var txtmbno = document.getElementById("register-mobile").value;
        if (cntry.value == "Select Country")
        {
            return false;

        }
        var len = cntry.value.length;

        var res = txtmbno.substring(len + 1, txtmbno.length);
        if (res.length < 4 || res.length > 15)
        {
            return false;
        }
        return true;

    }
    function Validatephonenumber1(inputtxt)
    {
        var numbers = /^\+[1-9]{1}[0-9]{5,15}$/;
        //var numbers = /^[-+]?[0-9]+$/; 
        if (inputtxt.match(numbers))
        {
            // value is ok, use it
            return true;
        } else {
            // alert("Invalid number; must be ten digits")
            // number.focus()
            return false;
        }
    }

    function hide_nxt(c)
    {
        $(c).next('.error').hide();
        document.getElementById('ec_answer1').innerHTML='';
        document.getElementById('ec_answer2').innerHTML='';
    }

    function check_pass(c)
    {
        $("#registerpassword").next('.error').hide();
        if ($("#registerpassword").val() == '')
        {
            $("#registerpassword").next('.error').children("p").html('');
            $("#registerpassword").next('.error').show();

            ee = false;
        } else
        {
            if (!Validatepass($("#registerpassword").val()))
            {
                $("#registerpassword").next('.error').children("p").html('<small>Your password must contain minimum 8 characters and must contain at least two of the following: upper case letter(s), lower case letter(s), number(s)</small>');
                $("#registerpassword").next('.error').show();
                ee = false;
            }
        }
    }
    function check_conf_pass(c)
    {
        $("#registerpassword2").next('.error').hide();
        if ($("#registerpassword2").val() == '')
        {
            $("#registerpassword2").next('.error').children("p").html('');
            $("#registerpassword2").next('.error').show();

            ee = false;
        } else if ($("#registerpassword").val() != $("#registerpassword2").val())
        {
            ee = false;
            $("#registerpassword2").next('.error').children("p").html("Your passwords don't match");
            $("#registerpassword2").next('.error').show();
        }
    }
    function showpass1()
    {
        if ($("#registerpassword").attr('type') == "text")
        {
            $("#registerpassword").attr('type', 'password');
            $("#registerpassword2").attr('type', 'password');

        } else
        {
            $("#registerpassword").attr('type', 'text');
            $("#registerpassword2").attr('type', 'text');
        }
    }

    function showpass2()
    {
        if ($("#registerpassword2").attr('type') == "text")
        {
            $("#registerpassword").attr('type', 'password');
            $("#registerpassword2").attr('type', 'password');
        } else
        {
            $("#registerpassword").attr('type', 'text');
            $("#registerpassword2").attr('type', 'text');
        }
    }

    function CheckUserName(mobileNum) {

        $.ajax({
            type: "POST",
            url: "check.php",
            data: {mobile_no: mobileNum},
            success: function (result) {
                if (result.trim() == "Available")
                {
                    $("#mob_errorsuccess").html(result);
                    $("#mob_error").html('');
                } else
                {
                    $("#mob_error").html(result);
                    $("#mob_errorsuccess").html('');
                }


            }
        });
    }
    ;

    function ShowHideDiv()
    {
        var question1 = document.getElementById("Question1").value;
        var c_answer1 = document.getElementById("c_answer1");
            c_answer1.value = "";
        var dvCustomize = document.getElementById("dvCustomize");
        dvCustomize.style.display = (question1 == 'custom1') ? "block" : "none";
        if (question1 != 'custom1')
        {
            var txt = document.getElementById("txtQustion1");
            txt.value = "";
        }

    }
    function ShowHideDiv2()
    {
        var question2 = document.getElementById("Question2").value;
        var c_answer2 = document.getElementById("c_answer2");
            c_answer2.value = "";
        var dvCustomize = document.getElementById("dvCustomize2");
        dvCustomize.style.display = (question2 == 'custom2') ? "block" : "none";
        if (question2 != 'custom2')
        {
            var txt = document.getElementById("txtQustion2");
            txt.value = "";
        }
    }

    function hide_question1()
    {
        var txt = document.getElementById("Qn1error");
        txt.style.display = "none";

    }
    function hide_question2()
    {
        var txt = document.getElementById("Qn2error");
        txt.style.display = "none";
    }
    function CheckCountryCode()
    {
        var cntry = document.getElementById("country");
        var txt = document.getElementById("register-mobile");
        var len = cntry.value.length;
        var str = txt.value;
        var error = document.getElementById("Cntryerror");

        if (str != "" && cntry.value != "Select Country")
        {
            str = str.substring(1, len + 1);

            if (cntry.value == str)
            {
                error.style.display = "none";
                error.innerHTML = "";
            } else
            {

                error.innerHTML = "<p>Country code doesn't match your country.</p>";
                error.style.color = "red";
                error.style.display = "block";
            }
        }
    }



    function validatePlus(mbno) {
        var regExp = /^\+/;
        if (regExp.test(mbno))
        {
            return true;
        }
        return false;
    }
    function isValidChar(str) {
        //var str = $('#Search').val();
        if (/^[a-zA-Z0-9+]*$/.test(str) == false)
        {
            return false;
        }
        return true;
    }
    function Validatephonenumber(inputtxt)
    {
        var numbers = /^\+[1-9]{2}[0-9]{4,15}$/;
        //  var numbers = /^[-+]?[0-9]+$/; 
        if (inputtxt.match(numbers))
        {
            // value is ok, use it
            return true;
        } else {
            // alert("Invalid number; must be ten digits")
            // number.focus()
            return false;
        }
    }

    function unameValidation() {

        if ($("#register-mobile").val() == '')
        {

            $("#register-mobile").next('.error').children("p").html('Enter your mobile number');
            $("#register-mobile").next('.error').show();

        } else
        {
            $('#register-mobile').next('.error').hide();

        }
        if (!validatePlus($("#register-mobile").val()))
        {

            $("#error1").html('<p>Include your country code(always begins with a + sign)</p>');
            $("#error1").show();
        } else
        {
            $('#error1').hide();
        }
        if (!isValidChar($("#register-mobile").val()))
        {
            $("#error2").html("<p>Invalid mobile number. Spaces, dashes, hyphens,symbols (except the leading + sign) aren't allowed.</p>");
            $("#error2").show();

        } else
        {
            $('#error2').hide();
        }
        if ($("#country").val() != 'Select Country')
        {
            if (!CodeValidation())
            {

                $("#error3").html("<p>Invalid mobile number.Mobile number should contain at least 4 digits and upto 15 digits after country code</p> ");
                $("#error3").show();

            } else
            {
                $('#error3').hide();
            }
        }

        if (!Validatephonenumber($("#register-mobile").val()))
        {
            $("#error4").html('<p>Invalid mobile number</p>');
            $("#error4").show();

        } else
        {
            $('#error4').hide();
        }

    }
</script>
<style>
.error{
	display:none;
}
</style>
<?php require("footer.php"); ?>
<script src="js/jquery.min.js"></script>	
<script src="js/jquery.cookie.js"></script>	
