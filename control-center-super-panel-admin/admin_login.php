<?php
include '../redirection.php';
require("../connect/db.php"); //Establishing connection with our database
ob_start();
session_start();

global $connection;

if (isset($_SESSION['mob_id']) && $_SESSION['mob_id'] != "") {
    $usr = $connection->query("select * from users where mobile_no='" . $_SESSION['mob_id'] . "' and user_type='admin'");

    if ($usr->num_rows > 0) {
        header("location: home.php"); // Redirecting To Other Page
        return;
    }
}

$error = ""; //Variable for storing our errors.
if (isset($_POST["btn-login"])) {
    if (empty($_POST["password"]) || empty($_POST["login-email"])) {
        $error = "Both fields are required.";
    } else {
        // Define $username and $password
        $username = $_POST['login-email'];
        $password = $_POST['password'];
        // To protect from MySQL injection
        $username = stripslashes($username);
        //$password = stripslashes($password);
        $username = mysqli_real_escape_string($connection, $username);
        //$password = mysqli_real_escape_string($connection,$password);
        $password = md5($password);
        //Check username and password from database
        $sql = "SELECT * FROM users WHERE mobile_no='$username' and password='$password' and user_type='admin'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $mob_id = $row['mobile_no'];
        $email = $row['Email'];
        $user_name = $row['fname'] . ' ' . $row['mname'] . " " . $row['lname'];
        $user_id = $row['user_id'];

        //If username and password exist in our database then create a session.
        //Otherwise echo error. 
        if (mysqli_num_rows($result) == 1) {
            if (!empty($_POST['check_list'])) {
                $_SESSION['expire'] = time() + (24 * 60 * 60);
            } else {
                session_set_cookie_params(0);
                session_start();
            }
            $_SESSION['mob_id'] = $mob_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['CompanyName'] = $row['CompanyName'];
            // Initializing Session
            header("location: home.php"); // Redirecting To Other Page
        } else {
            $sql = "SELECT * FROM users WHERE mobile_no='$username'";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $mobile_number_exist = $row['Email'];
            $error = "Incorrect username or password.";
        }
        echo '<div class="alert alert-danger">' . $error . '</div>';
    }
}
require_once '../amal-functions.php';
require_once '../functions.php';
$addr_data = getContactAddress();
?>
<?php 
$sql="SELECT * FROM site_settings ORDER BY id DESC LIMIT 1";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $name = $row['name'];
 $logo = $row['logo'];
 $favicon = $row['favicon'];
?>
<head>
<?php date_default_timezone_set("Asia/Kolkata"); ?>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php echo isset($addr_data['company_name']) ? $addr_data['company_name'] : "Reojen"; ?></title>

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon"/>
    <link rel="icon" href="../uploads/<?php echo $favicon;  ?>" type="image/x-icon"/>

    <link rel="shortcut icon" href="../uploads/<?php echo $favicon;  ?>" type="image/x-icon"/>
<!--    <link rel="icon" href="../img/favicon.ico" type="image/x-icon"/>

    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>-->

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/icomoon-social.css">

    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/font-awesome.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>



    <link rel="stylesheet" href="../css/leaflet.css" />

    <!--[if lte IE 8]>

        <link rel="stylesheet" href="css/leaflet.ie.css" />

    <![endif]-->

    <link rel="stylesheet" href="../css/main.css">

    <link href="../css/flags.css" rel="stylesheet">



    <script src="../js/jquery.flagstrap.js"></script>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/custom_validation.js"></script>

    <script src="../js/jquery.cookie.js"></script>

    <script src="../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->


    <!-- Navigation & Logo-->
    <div class="mainmenu-wrapper">
        <div class="container">

            <nav id="mainmenu" class="mainmenu">
                <ul>
                    <li class="logo-wrapper"><a href="index.php" style="border:none ! important;"><img src="../uploads/<?php echo $logo;  ?>" /></a></li>
                  </ul>
            </nav>
        </div>
    </div>

    <!-- Page Title -->
    <div class="section section-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1>Log in to Admin Panel</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="basic-login" style="margin: auto auto auto;width: 50%;">
                        <form role="form" onSubmit="return validate()" action="admin_login.php" method="post">
                            <div class="form-group">
                                <label for="login-username"><i class="icon-user"></i> <b>Mobile number*</b></label>

                                <input name="login-email" onKeyUp="hide_nxt(this)" onKeyDown="hide_nxt(this)" class="form-control" 
                                       value="" id="login-username" type="text" placeholder="Mobile No" onkeypress="javascript:return isNumberKey(event);" onchange="UnameCheck(this);"
                                       autocomplete="off" onc><span class="error" style="display:none;"  id="dd"><p></p></span>
                            </div>

                            <div class="form-group">
                                <label for="login-password"><i class="icon-lock" ></i> <b>Password * </b></label>
                                <input name="password" onKeyUp="hide_nxt(this)" onKeyDown="hide_nxt(this)" class="form-control" value="" id="login-password" type="password" placeholder="" autocomplete="off">
                                <span class="error" style="display:none;" ><p></p></span>
                            </div>
                            <div class="form-group">

                                <div class="clearfix"></div>
                                <button type="submit" class="btn pull-right" name="btn-login">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
<?php if ($_POST) { ?>
            var mobile_number_exist = '<?php echo isset($mobile_number_exist) ? $mobile_number_exist : ''; ?>';

            if (mobile_number_exist == '') {
                $("#login-username").next('.error').children("p").html('There is no user registered with this mobile number.');
                $("#login-username").next('.error').show();
            } else {
                $("#login-password").next('.error').children("p").html('Incorrect password');
                $("#login-password").next('.error').show();
            }
<?php } ?>
        /*function validate()
         {
             
         var ee=true;
             
         if($("#login-email").val()=='')
         {
             
         $("#login-email").next('.error').children("p").html('Enter your mobile no.');
         $("#login-email").next('.error').show();
         ee=false;
             
         }
         else if(!validateEmail($("#login-email").val()))
         {
             
         $("#login-email").next('.error').children("p").html('Invalid mobile no.');
         $("#login-email").next('.error').show();
         ee=false;
             
         }	
         //alert($("#country_code").val());
         if($("#login-password").val()=='')
         {
             
         $("#login-password").next('.error').children("p").html('Enter your Password');
         $("#login-password").next('.error').show();
         ee=false;
             
         }
         if(ee==true)	
         return true;
         else
         return false;
         }*/
        function hide_nxt(c)
        {
            $(c).next('.error').hide();
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

        function onc()
        {

            $('#dd').hide();

        }
        function validatePlus(mbno) {
            //var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            //return emailReg.test( email );
            var res = mbno.substring(0, 1);
            if (res == '+')
            {
                return true;
            }
            return false;
        }
        function isValidChar(str) {
            //var str = $('#Search').val();
            if (/^[a-zA-Z0-9- +]*$/.test(str) == false)
            {
                return false;
            }
            return true;
        }

        /*function validateEmail(email1) 
         {
         var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
         if($("#login-email").val()!="")
         {
         var email = document.getElementById('login-email');
         var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
             
         if (!filter.test(email.value)) 	  
         {
         $("#login-email").next('.error').children("p").html('Invalid mobile no.');
         $("#login-email").next('.error').show();
             
         }
         }
         else
         {
             
         $("#login-email").next('.error').children("p").html('Enter your mobile no.');
         $("#login-email").next('.error').show();
         }
         return filter.test(email.value);
         }
             
         $(document).on('change','.country_code',function(){
         $(this).parent().find('.code').html('+'+$(this).val());
         //$('.code').html('+'+$(this).val());
         });*/

        function UnameCheck(txt)
        {
            if (!validatePlus($("#login-username").val()))
            {

                $("#login-username").next('.error').children("p").html('Include your country code(always begins with a + sign)');
                $("#login-username").next('.error').show();
                ee = false;

            } else if (!isValidChar($("#login-username").val()))
            {
                $("#login-username").next('.error').children("p").html("Invalid mobile number. Spaces, dashes, hyphens,symbols (except the leading + sign) aren't allowed.");
                $("#login-username").next('.error').show();
                ee = false;
            } else if (!Validatephonenumber($("#login-username").val()))
            {
                $("#login-username").next('.error').children("p").html('Invalid mobile number');
                $("#login-username").next('.error').show();
                ee = false;
            }

        }

    </script>

    <!-- Footer -->
<?php
require("../footer.php");
ob_end_flush();
?>
