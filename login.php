<?php
//https://countrycode.org/
ob_start();
session_start();

if (isset($_COOKIE['slrememberme']) && $_COOKIE['slrememberme'] != null) {
    
}

if (isset($_SESSION['mob_id']) && $_SESSION['mob_id'] != "") {
//    echo $_SESSION['mob_id'];die;
    header("location: home.php"); // Redirecting To Other Page
    return;
}
require_once('query.php');
$QueryFire = new QueryFire();
require("header.php");
include("connect/db.php"); //Establishing connection with our database
$error = ""; //Variable for storing our errors.
$sql = "SELECT * FROM settings WHERE name='password_check' LIMIT 1";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if (isset($_POST["btn-login"])) {
//    echo $row['value'];
    if ($row['value'] == 0) {
        if (empty($_POST["password"]) || empty($_POST["login-email"])) {
            $error = "Both fields are required.";
        } else {
            $username = $_POST['login-email'];
            $password = $_POST['password'];
            // To protect from MySQL injection
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);
            $password = md5($password);
            //Check username and password from database
            $sql = "SELECT * FROM users WHERE mobile_no='$username' and password='$password'";
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
					$usersTimezone = 'Europe/London';
					$date = new DateTime( $date, new DateTimeZone($usersTimezone) );
					$todate  = $date->format('H:i:s');
					$date_arr = explode(':',$todate);
					$hour = $date_arr[0];
					$min = $date_arr[1];
					$sec = $date_arr[2];
					$time_in_seconds = (24*3600) - ($hour*3600 + $min*60 + $sec);
                    $_SESSION['expire'] = time() + ($time_in_seconds);
					setcookie("remember_me", $username, time()+86400);
                    setcookie("slrememberme", $mob_id, time() + ($time_in_seconds));
                } else {
                    unset($_COOKIE['slrememberme']);
                    setcookie("slrememberme", "usersign", time() - 3600);
                    session_set_cookie_params(0);
					unset($_COOKIE["remember_me"]);
					setcookie("remember_me", "", time() - 3600);
                    session_start();
                }
                $_SESSION['mob_id'] = $mob_id;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                $_SESSION['CompanyName'] = $row['CompanyName'];
                header("location: home.php"); // Redirecting To Other Page
            } else {

                $sql = "SELECT * FROM users WHERE mobile_no='$username'";
                $result = mysqli_query($connection, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $mobile_number_exist = $row['mobile_no'];
                $error = "Incorrect username or password.";
            }
            //echo '<div class="alert alert-danger">'.$error.'</div>'; 
        }
    } else {
        $username = $_POST['login-email'];
        // To protect from MySQL injection
        $username = stripslashes($username);
        $username = mysqli_real_escape_string($connection, $username);
        //Check username and password from database
        $sql = "SELECT * FROM users WHERE mobile_no='$username'";
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
				$usersTimezone = 'Europe/London';
				$date = new DateTime( $date, new DateTimeZone($usersTimezone) );
				$todate  = $date->format('H:i:s');
				$date_arr = explode(':',$todate);
				$hour = $date_arr[0];
				$min = $date_arr[1];
				$sec = $date_arr[2];
				$time_in_seconds = (24*3600) - ($hour*3600 + $min*60 + $sec);
                $_SESSION['expire'] = time() + ($time_in_seconds);
				setcookie("remember_me", $username, time()+$time_in_seconds);
                setcookie("slrememberme", $mob_id, time() + ($time_in_seconds));
            } else {
                unset($_COOKIE['slrememberme']);
                setcookie("slrememberme", "usersign", time() - 3600);
				unset($_COOKIE["remember_me"]);
				setcookie("remember_me", "", time()+86400);
                session_set_cookie_params(0);
                session_start();
            }
            $_SESSION['mob_id'] = $mob_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['CompanyName'] = $row['CompanyName'];
            header("location: home.php"); // Redirecting To Other Page
        } else {

            $sql = "SELECT * FROM users WHERE mobile_no='$username'";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $mobile_number_exist = $row['mobile_no'];
            $error = "Incorrect username.";
        }
    }
}
?> 

<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->


    <!-- Navigation & Logo-->
    <div class="mainmenu-wrapper">
        <div class="container">

            <?php require_once 'nav.php'; ?>
        </div>
    </div>

    <!-- Page Title -->
    <div class="section section-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1>Log in to your Reojen account</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="basic-login">
                        <form role="form" onSubmit="<?= ($row['value'] == 1) ? 'return validate()' : 'return validate_email()'; ?>" action="login.php" method="post">
                            <?php
                            if(isset($_SESSION['password_change']) && $_SESSION['password_change']=="true")
                            {
                                    ?>
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            You have changed your password successfully. You may Log in now.
                                    </div>
                                    <?php 
                                    $_SESSION['password_change']="false"; 
                            } 
                             if(isset($_SESSION['password_change_faild']) && $_SESSION['password_change_faild']=="true")
                            {
                                    ?>
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo $_SESSION['password_change_msg'];?>
                                    </div>
                                    <?php 
                                    $_SESSION['password_change_faild']="false"; 
                                    $_SESSION['password_change_msg']=""; 
                            } 
                            ?>
                            <div class="form-group" id="login_mob">
                                <p>Don't have an account? <a href="signup.php">Sign up</a> </p>
                                <label for="login-username"><i class="icon-user"></i> <b>Mobile number</b></label>

                                <input name="login-email" onKeyUp="hide_nxt(this)" onKeyDown="hide_nxt(this)" class="form-control" 
                                       value="<?php if(isset($_COOKIE["remember_me"]) && $_COOKIE["remember_me"]!=""){ echo $_COOKIE["remember_me"];}?>" id="login-username" type="text" placeholder="in international format; e.g. +19174971072" onkeypress="javascript:return isNumberKey(event);"
                                       autocomplete="off"><span class="error" id="dd"><p></p></span>
                            </div>

                            <div class="form-group">
                                <label for="login-password"><i class="icon-lock" ></i> <b>Password* </b></label>
                                <input name="password" onKeyUp="hide_nxt(this)" onKeyDown="hide_nxt(this)" class="form-control" value="" id="login-password" type="password" placeholder="" autocomplete="off">
                                <span class="error" ><p></p></span>
                            </div>
                            <div class="form-group">

                                <div class="clearfix"></div>
								<?php 
								if(isset($_COOKIE["remember_me"]) && $_COOKIE["remember_me"]!=""){
									$checked = "checked";
								}else{
									$checked = "";
								}	?>
                                <input type="checkbox" name="check_list" value="Keep me logged in for 1 day" <?php echo $checked;?>>
                                <label>Keep me logged in for 1 day</label><br/>
                                <button type="submit" class="btn pull-right" name="btn-login">Log in</button>

                                <br>  <a href="forgotpassword.php">Forgot password?</a> 
                                <p>We will send a verification code to your mobile number via SMS each time you log in to your Reojen app. You can stay logged in for 1 day maximum.
                                </p>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
<?php
if ($_POST) {
    ?>
            var mobile_number_exist = '<?php echo isset($mobile_number_exist) ? $mobile_number_exist : ''; ?>';

            if (mobile_number_exist == '')
            {
                $("#login-username").next('.error').children("p").html('There is no user registered with this mobile number.');
                $("#login-username").next('.error').show();
            } else
            {
                $("#login-password").next('.error').children("p").html('Incorrect password');
                $("#login-password").next('.error').show();
            }
<?php } ?>
        function validate()
        {
            var ee = true;
            if ($("#login-username").val() == '')
            {

                $("#login-username").next('.error').children("p").html('Enter your mobile no.');
                $("#login-username").next('.error').show();
                ee = false;

            } else if (!validatePlus($("#login-username").val()))
            {
                $("#login-username").next('.error').children("p").html('Mobile number must start with a leading + sign.');
                $("#login-username").next('.error').show();
                ee = false;
            } else if ($("#login-username").val().match(/\+/gi).length > 1)
            {
                $("#login-username").next('.error').children("p").html('No more non-numeric character is allowed in "Mobile number" field apart from the leading + sign');
                $("#login-username").next('.error').show();
                ee = false;
            } else if (!isValidChar($("#login-username").val()))
            {
                $("#login-username").next('.error').children("p").html('Invalid mobile number. Spaces, dashes, hyphens,symbols (except the leading + sign) aren\'t allowed');
                $("#login-username").next('.error').show();
                ee = false;
            }
            if ($("#login-password").val() == '')
            {

                $("#login-password").next('.error').children("p").html('Enter your Password');
                $("#login-password").next('.error').show();
                ee = false;

            }
            if (ee == true)
                return true;
            else
                return false;
        }
        function validate_email()
        {
            var ee = true;
            if ($("#login-username").val() == '')
            {

                $("#login-username").next('.error').children("p").html('Enter your mobile no.');
                $("#login-username").next('.error').show();
                ee = false;

            } else if (!validatePlus($("#login-username").val()))
            {
                $("#login-username").next('.error').children("p").html('Mobile number must start with a leading + sign.');
                $("#login-username").next('.error').show();
                ee = false;
            } else if ($("#login-username").val().match(/\+/gi).length > 1)
            {
                $("#login-username").next('.error').children("p").html('No more non-numeric character is allowed in "Mobile number" field apart from the leading + sign');
                $("#login-username").next('.error').show();
                ee = false;
            } else if (!isValidChar($("#login-username").val()))
            {
                $("#login-username").next('.error').children("p").html('Invalid mobile number. Spaces, dashes, hyphens,symbols (except the leading + sign) aren\'t allowed');
                $("#login-username").next('.error').show();
                ee = false;
            }
            if (ee == true)
                return true;
            else
                return false;
        }

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
        function validatePlus(mbno)
        {
            var regExp = /^\+/;
            if (regExp.test(mbno))
            {
                return true;
            }
            return false;
        }
        function isValidChar(str)
        {
            //var str = $('#Search').val();
            if (/^[a-zA-Z0-9- +]*$/.test(str) == false)
            {
                return false;
            }
            return true;
        }

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

    <?php
    require("footer.php");
    ob_end_flush();
    ?>
