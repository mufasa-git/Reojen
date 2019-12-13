<?php
session_start();
if (isset($_SESSION['mob_id']) || isset($_SESSION['user_name'])) {?>
<?php 

//~ var_dump($_SESSION);
//~ exit;
require_once("libraries/helper.php");

if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name'])) {
    header('location:login.php');
}

require("header.php");
include('connect/db.php');  // Database connection and settings
//require("libraries/helper.php");

$query = "SELECT * FROM users WHERE mobile_no ='" . $_SESSION['mob_id'] . "'";
$verified_email = mysqli_query($connection, $query) or die("Error: " . mysqli_error($connection));

$row = mysqli_fetch_array($verified_email, MYSQLI_ASSOC);

$nowType = $connection->query('SELECT * FROM settings WHERE name="payment_type" LIMIT 1')->fetch_assoc();
$_SESSION["show_notification"] = 1;
if ($nowType['value'] == 'BACS') {
    $currency_symbol = '&#163;';
} elseif($nowType['value'] == 'PAYPAL') {
	$currency_symbol = '<i class="fa fa-gbp"></i>';
}elseif($nowType['value'] == 'ADVCASH') {
	$currency_symbol = '<i class="fa fa-gbp"></i>';
} else {
    $currency_symbol = '&#x24;';
}
?>
<style>
    .addmoney{
            font-size: 1.2em;
    padding: 1.2em 1.5em;
    color: #999;
    display: inline-block;
    text-decoration: none;
    cursor: pointer;
    }
  .support{
    font-size: 1.2em;
    padding: 1.2em 1.5em;
    color: #999;
    display: inline-block;
    text-decoration: none;
    cursor: pointer;
 }
</style>
<body>
    <!-- Navigation & Logo-->
    <div class="mainmenu-wrapper indexpage">
        <div class="container">
            <div class="menuextras">
                <div class="extras">
                    <ul>
                        <?php if (!isset($_SESSION['mob_id'])) { ?>
                            <a href="login.php" title="Already A Member? Log In" data-toggle="tooltip" class="btn btn-warning">Log in</a>
                            <a href="signup.php" title="Not A Member? Register Now" data-toggle="tooltip" class="btn btn-warning">Sign up</a>
                        <?php } else { ?>
                            <ul>
                                <li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i>
                                    <a href="#"><b>Balance: <?php echo $currency_symb; ?> <?php echo wallet();?></b></a></li>
                                <li>
                                    <div class="btn-group pull-right">									
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">										
                                        <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo (isset($_SESSION['CompanyName']) && !empty($_SESSION['CompanyName'])) ? $_SESSION['CompanyName'] : $_SESSION['user_name'] ?></span>										
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

                        <?php } ?>

                    </ul>
                </div>
            </div>
            <nav id="mainmenu" class="mainmenu">
                <ul>
                    <?php
                    $sql="SELECT * FROM site_settings ORDER BY id DESC LIMIT 1";
                    $result=mysqli_query($connection,$sql);
                    $row1=mysqli_fetch_array($result,MYSQLI_ASSOC);
                     $name = $row1['name'];
                     $logo = $row1['logo'];
                     $favicon = $row1['favicon'];
                    ?>
                    <li class="logo-wrapper"><a href="index.php"><img src="uploads/<?php echo $logo;  ?>"/></a>
                    </li>
                    <li >
                        <a href="home.php">Home</a>
                    </li>
                    <li  <?php // select($page_name, $page); ?>>
				<?php if(isset($_SESSION['email']) && $_SESSION['email']!=""){?>
                    <a href="add-money.php">Add money</a>
                <?php }else{?>
					<p href="" onClick="div_show2();" class="addmoney">Add money</p>
				<?php }?>
				</li>
                    <?php 
                    if ($nowType['value'] != 'BACS' && $nowType['value'] != 'PAYPAL') {
                    ?>
<!--
                    <li>
                        <a href="deposits.php">Deposits</a>
                    </li>
-->
                    <?php }?>
                    <li class="active">
						<?php if(isset($_SESSION['email']) && $_SESSION['email']!=""){?>
							<a href="support.php">Support</a>
						<?php }else{?>
							<p style="" class="support" onClick="div_show2();">Support</p>
						<?php }?>
					</li>
                </ul>
            </nav>
        </div>
    </div>
<br>
<?php if(config("support_message_status")==1){?>   
   <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <strong> To contact us via email, complete the fields below or write us at <a href="mailto:support@reojen.com">support@reojen.com</a>. If you send us an email, mention your full name, mobile number (in international format) and your country of residence in the email that is associated with your account.If you already have an account and have access into your account, please <a href="login.php" title="Already A Member? Log In">Log in</a> to your account to submit a support ticket</strong>
                </div>
            </div>
        </div>
    </div>
<?php }?>
    <h4 align="center" style=" font-size: 35px;">Submit A Support Ticket</h4>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="row">
<div class="alert alert-success" id="submitmessage" style="display:none;">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
Your support ticket has been submitted successfully. A mail regarding the delivery confirmation of your support request has been sent to your email address.
</div>				
                    <form class="loggedin" method="post" action="" enctype="multipart/form-data">
                        

                        <div>
                            <p style="color:black;">Fields marked with <span class="mandatory">*</span> are mandatory.</p>
                        </div>
						<?php if(isset($_SESSION['email']) && $_SESSION['email']==""){?>
                        <div class="col-sm-12 frm-grp">
                            <label>Email <span class="mandatory">*</span></label>
                            <input type="email" id="email" name="log_email" placeholder="Email" class="form-control">
                            <span class="error"><p></p></span>
							<p>This email address will be added to your account once you submit the support ticket. You can manage your account email in <a href="myaccount.php">My account</a> page.</p>
                        </div>
						<?php }else{?>
							<input type="hidden" id="email" name="log_email" placeholder="Email" value="<?php echo $_SESSION['email'];?>" class="form-control">
						<?php }?>
                        <div class="col-sm-12 frm-grp">
                            <label>Subject <span class="mandatory">*</span></label>
                            <input type="text" name="log_subject" id="log_subject" placeholder="Subject" class="form-control">
                            <span class="error"><p></p></span>
                        </div>
                        <div class="col-sm-12 frm-grp">
                            <style>
                                .fileUpload {
                                    position: relative;
                                    overflow: hidden;
                                    margin: 10px;
                                }
                                .fileUpload input.upload {
                                    position: absolute;
                                    top: 0;
                                    right: 0;
                                    margin: 0;
                                    padding: 0;
                                    font-size: 20px;
                                    cursor: pointer;
                                    opacity: 0;
                                    filter: alpha(opacity=0);
                                }
                            </style>
                            <label>Attachments</label>
                            <div>
                                <input class="uploadFile" style="padding: 5px 10px;" placeholder="Choose File" disabled="disabled" />
                                <div class="fileUpload btn btn-primary">
                                    <span>Attach</span>
                                    <input type="file" name="file[]" class="upload">
                                </div>
                                <div>
                                    <span id="file_error" class="error"><p></p></span>
                                </div>
                            </div>
                            <div class="alertMsg">
                                 <p>Supported file formats: .jpg, .jpeg, .pdf, .png, .gif, .bmp, .tif</p>
                                <p>Maximum file size: 5 MB</p>
                            </div>

                            <!-- <div class="clear"></div> -->
                            <button class="add_more btn btn-primary">Add More Files</button>
                            <div class="clear"></div>
                        </div>
                        <div class="col-sm-12 frm-grp">
                            <input type="hidden" name="log_name" value="<?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']; ?>">
                            <input type="hidden" name="log_mobile" value="<?php echo $row['mobile_no']; ?>">
                            <input type="hidden" name="log_country" value="<?php echo $row['Country']; ?>">
                            <label>Message <span class="mandatory">*</span></label>
                            <textarea name="log_message" id="log_message" placeholder="Message" class="form-control" rows="8"></textarea>
                            <span class="error"><p></p></span>
                            <input type="submit" class="btn" id="upload" value="SUBMIT" name="log_submit">
                            <img src="img/default.gif" class="loader" style="display: none;">
                        </div>
                        <div class="clear" style="clear: both;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {

            // $("input.upload").change(function(){
            // 	 console.log(this.value, $(this).parent().prev());
            // 	$(this).parent().prev().val(this.value);
            // });

            $('body').on('change', "input.upload", function () {
                var ext = this.value.match(/\.(.+)$/)[1];
                //$("#file_error").html("");
                var file_type = Array('jpg', 'jpeg', 'pdf', 'png', 'gif', 'bmp','tif','JPG','JPEG','PDF','PNG','GIF','BMP','TIF');


                if ($.inArray(ext, file_type) != -1) {
                    var file_size = this.files[0].size;
                    //10485760
                    var fSize = 5000000;
            
                  
                    if (file_size > fSize)
                    {
                        $(this).parent().parent().find("#file_error").children("p").html("File size is greater than 5MB.");
                        $(this).parent().parent().find("#file_error").show();
                        this.value = '';
                    } else
                    {
                        //$('.uploadButton').attr('disabled', false);
                        $(this).parent().prev().val(this.value);
                        $(this).parent().parent().find("#file_error").children("p").html('');
                        $(this).parent().parent().find("#file_error").hide();
                    }
                } else {
                    $(this).parent().parent().find("#file_error").children("p").html("File type is not accepted.");
                    $(this).parent().parent().find("#file_error").show();
                    //$(this).find("#file_error").html("This is not an allowed file type.");
                    //$('.uploadButton').attr('disabled', true);
                    this.value = '';
                }
            });

            // document.getElementById("uploadBtn").onchange = function () {
            //     document.getElementById("uploadFile").value = this.value;
            // };

            $('.add_more').click(function (e) {
                e.preventDefault();
                $(this).before('<div class="add_more_fields"><input class="uploadFile" placeholder="Choose File" disabled="disabled" style="padding: 5px 10px;" /><div class="fileUpload btn btn-primary"><span>Attach</span><input type="file" name="file[]" class="upload"></div><div class="removeButton btn btn-red">Remove</div><div><span id="file_error" class="error"><p></p></span></div></div> ');
            });

            $('body').on('click', '.removeButton', function (e) {
                $(this).parent().remove();
            });

            $(document).on("keyup", "input, textarea, select", function () {
                $(this).css('border', '1px solid #ccc');
            });

        });

        $('body').on('click', '#upload', function (e) {
			
			
            e.preventDefault();
            $(".frm-grp span.error").each(function (i) {
                $(this).hide();
            });
            var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
            var email = $("#email").val();
            var log_subject = $("#log_subject").val();
            var log_message = $("#log_message").val();

            var valid = emailRegex.test(email);
if(email == '' || log_subject == '' || log_message == ''){
            if (email == '') {
                $("#email").next('.error').children("p").html('Enter your email');
                $("#email").next('.error').show();
//                return false;
            } if (!valid) {
                $("#email").next('.error').children("p").html('Invalid email');
                $("#email").next('.error').show();
//                return false;
            } if (log_subject == '') {
                $("#log_subject").next('.error').children("p").html('Enter your subject');
                $("#log_subject").next('.error').show();
//                return false;
            } if (log_message == '') {
                $("#log_message").next('.error').children("p").html('Enter your message');
                $("#log_message").next('.error').show();
//                return false;
            }} else {
                var formData = new FormData($(this).parents('form')[0]);
                //$('.loggedin input, .loggedin textarea').css('border','1px solid #cccccc');
                $.ajax({
                    url: 'upload_files_mulitple.php',
                    type: 'POST',
                    data: formData,
                    xhr: function () {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    beforeSend: function (jqXHR, setting) {
                        $('#upload').val('SUBMITTING...');
                        $('.loader').show();
                        $('#upload').attr('disabled', 'disabled');
                    },
                    success: function (data) {
						
                        $('#upload').val('SUBMIT');
                        $('#upload').removeAttr('disabled');
                        $('#submitmessage').show();
                        $('.add_more_fields').remove();
                        $('.loader').hide();
						$.post('ajax_addEmail.php',{email:email},function(data){});
                        $('form.loggedin').trigger("reset");
						$('html, body').animate({
							scrollTop: "0px"
						}, 800);
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;
            }
        });

    </script>
	<style>
	.error{
		display:none;
	}
	</style>
    <?php require("footer.php"); die(); ?>
        
    <!--header('location:insupport.php');-->
<?php }
require("header.php");require_once("libraries/helper.php");
include('connect/db.php');  // Database connection and settings
require("libraries/helper.php");

if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    $location = json_decode(file_get_contents('http://ip-api.com/json/' . $_SERVER['HTTP_X_FORWARDED_FOR']));
else
    $location = json_decode(file_get_contents('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR']));
$sql = "SELECT Code FROM countrycode WHERE Country='" . $location->country . "'";
$result = mysqli_query($connection, $sql);
$country_data = mysqli_fetch_assoc($result);
$country_code = isset($country_data['Code']) ? '+' . $country_data['Code'] : '';$currency_symbol = '<i class="fa fa-gbp"></i>';
?>

<body>
    <!-- Navigation & Logo-->
    <div class="mainmenu-wrapper indexpage">
        <div class="container">
            <div class="menuextras">
                <div class="extras">
                    <ul>							
                        <?php if (!isset($_SESSION['mob_id'])) { ?>							
                            <a href="login.php" title="Already A Member? Log In" data-toggle="tooltip" class="btn btn-warning">Log in</a>
                            <a href="signup.php" title="Not A Member? Register Now" data-toggle="tooltip" class="btn btn-warning">Sign up</a>
                        <?php } else { ?>                        
                            <ul>
                                <li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> 
                                    <a href="#"><b>Balance: <?php echo $currency_symb; ?> <?php echo wallet();?></b></a></li>

                                <li><div class="btn-group pull-right">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $_SESSION['user_name'] ?></span>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="home.php">Dashboard</a></li>
                                            <li><a href="myaccount.php">My Account</a></li>
                                            <li class="divider"></li>
                                            <li><a href="logout.php">Log out</a></li>
                                        </ul>
                                    </div></li>
                            </ul>

                        <?php } ?>

                    </ul>
                </div>
            </div>
            <?php require_once 'nav.php'; ?>
        </div>
    </div>

    <!-- Homepage Slider -->
<?php if(config("support_message_status")==1){?>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <strong> To contact us via email, complete the fields below or write us at <a href="mailto:support@reojen.com">support@reojen.com</a>. If you send us an email, mention your full name, mobile number (in international format) and your country of residence in the email that is associated with your account.If you already have an account and have access into your account, please <a href="login.php" title="Already A Member? Log In">Log in</a> to your account to submit a support ticket</strong>
                </div>
            </div>
        </div>
    </div>
<?php }?>
    <h4 align="center" style=" font-size: 35px;">Submit A Support Ticket</h4>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="row">
<div class="alert alert-success" id="submitmessage" style="display:none;">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
Your support ticket has been submitted successfully. A mail regarding the delivery confirmation of your support request has been sent to your email address.
</div>
                    <form class="loggedin" method="post"  enctype="multipart/form-data">
                        

                        <div>
                            <p style="color:black;">Fields marked with <span class="mandatory">*</span> are mandatory.</p>
                        </div>
                        <div class="col-sm-12 frm-grp">
                            <label>Name <span class="mandatory">*</span></label>
                            <input type="text" name="log_name" id="log_name" placeholder="Name" class="form-control"  >

                            <span class="error"><p></p></span>
                        </div>
                        <div class="col-sm-12 frm-grp">
                            <label>Email <span class="mandatory">*</span></label>
                            <input type="email" id="email" name="log_email" placeholder="Email" class="form-control">
                            <span class="error"><p></p></span>
                        </div>

                        <div class="col-sm-12 frm-grp">
                            <label>Country of Residence <span class="mandatory">*</span></label>
                            <select name="log_country" id="log_country" class="form-control">
                                <!--<option value="">Select Country</option>-->
                                <?php
                                getCountryDropdownWithoutCode($location, $connection);
                                ?>
                            </select>
                            <span class="error"><p></p></span>
                        </div>

                        <div class="col-sm-12 frm-grp">
                            <label>Mobile number (in international format) <span class="mandatory">*</span></label>
                            <input type="tel" name="log_mobile" id="log_mobile" onKeyPress="javascript:return isNumberKey(event);" class="form-control" value="<?php echo $country_code; ?>">
                            <span class="error" id="error1" name="error1"><p></p></span>
                        </div>
                        <div class="clear" style="clear: both;"></div>

                        <div class="col-sm-12 frm-grp">
                            <label>Subject <span class="mandatory">*</span></label>
                            <input type="text" name="log_subject" id="log_subject" placeholder="Subject" class="form-control">
                            <span class="error"><p></p></span>
                            <style>							 	
                                .fileUpload {
                                    position: relative;
                                    overflow: hidden;
                                    margin: 10px;
                                }
                                .fileUpload input.upload {
                                    position: absolute;
                                    top: 0;
                                    right: 0;
                                    margin: 0;
                                    padding: 0;
                                    font-size: 20px;
                                    cursor: pointer;
                                    opacity: 0;
                                    filter: alpha(opacity=0);
                                }
                            </style>
                            <!-- <span class="btn btn-success fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>Add files...</span>
                <input type="file" name="file[]">
            </span> -->
                        </div>

                        <div class="col-sm-12 frm-grp">           
                            <label>Attachments</label>
                            <div>
                                <input class="uploadFile" style="padding: 5px 10px;" placeholder="Choose File" disabled="disabled" />
                                <div class="fileUpload btn btn-primary">
                                    <span>Attach</span>
                                    <input type="file" name="file[]" class="upload">
                                </div>

                                <div>
                                    <span id="file_error" class="error"><p></p></span>
                                </div>
                            </div>
                            <div class="alertMsg">
                                <p>Supported file formats: .jpg, .jpeg, .pdf, .png, .gif, .bmp, .tif</p>
                                <p>Maximum file size: 5 MB</p>
                            </div>
                            <button class="add_more btn btn-primary">Add More Files</button> 
                        </div>

                        <div class="col-sm-12 frm-grp"> 					
                            <label>Message <span class="mandatory">*</span></label>
                            <textarea name="log_message" id="log_message" placeholder="Message" class="form-control" rows="8"></textarea>
                            <span class="error"><p></p></span>
                            <input type="submit" class="btn uploadButton" id="upload" value="SUBMIT" name="log_submit">
                            <img src="img/default.gif" class="loader" style="display: none;"> 
                        </div>
                        <div class="clear" style="clear: both;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        function validatePlus(mbno) {
            //var res = mbno.substring(0, 1);
            var regExp = /^\+/;
            if (regExp.test(mbno))
            {
                return true;
            }
            return false;
        }

        function unameValidation() {
            var cntry_length = $("#log_country option:selected").val().length;
            var mod_legnth = $("#log_mobile").val().length - 1;
            var org_mob_length = mod_legnth - cntry_length;
            if (!validatePlus($("#log_mobile").val()))
            {
                $("#error1").html('<p>Mobile number must start with a leading + sign</p>');
                $("#error1").show();
            } else if ($("#log_mobile").val().match(/\+/gi).length > 1)
            {
                $("#error1").html('<p>No more non-numeric character is allowed in "Mobile number" field apart from the leading + sign.</p>');
                $("#error1").show();
            } else if ($("#log_mobile").val().indexOf('+' + $("#log_country option:selected").val()) == -1)
            {
                $("#error1").html('<p>Country code must match the country selected in "Country of residence" field.</p>');
                $("#error1").show();
            } else if (org_mob_length < 4 || org_mob_length > 15) {
                $("#error1").html('<p>The local part of mobile number (excluding the country code) should contain a minimum of 4 digits and a maximum of 15 digits.</p>');
                $("#error1").show();
            } else {
                $("#error1").hide();
            }
        }

        $(document).ready(function () {

            $('#log_country').on('change', function () {
                $("#log_mobile").val('+' + this.value);
            });

            $('body').on('change', "input.upload", function () {
                var ext = this.value.match(/\.(.+)$/)[1];
                //$("#file_error").html("");

                var file_type = Array('jpg', 'jpeg', 'pdf', 'png', 'gif', 'bmp','tif','JPG','JPEG','PDF','PNG','GIF','BMP','TIF');

                if ($.inArray(ext, file_type) != -1) {
                    var file_size = this.files[0].size;
                    //10485760
                    var fSize = 5000000;
                    if (file_size > fSize)
                    {
                        $(this).parent().parent().find("#file_error").children("p").html("File size is greater than 5MB.");
                        $(this).parent().parent().find("#file_error").show();
                        this.value = '';
                    } else
                    {
                        //$('.uploadButton').attr('disabled', false);
                        $(this).parent().prev().val(this.value);
                        $(this).parent().parent().find("#file_error").children("p").html('');
                        $(this).parent().parent().find("#file_error").hide();
                    }
                } else {
                    $(this).parent().parent().find("#file_error").children("p").html("File type is not accepted.");
                    $(this).parent().parent().find("#file_error").show();
                    //$(this).find("#file_error").html("This is not an allowed file type.");
                    //$('.uploadButton').attr('disabled', true);
                    this.value = '';
                }

            });

            $('.add_more').click(function (e) {
                e.preventDefault();
                $(this).before('<div class="add_more_fields"><input class="uploadFile" placeholder="Choose File" disabled="disabled" style="padding: 5px 10px;" /><div class="fileUpload btn btn-primary"><span>Attach</span><input type="file" name="file[]" class="upload"></div><div class="removeButton btn btn-red">Remove</div><div><span id="file_error" class="error"><p></p></span></div></div> ');
            });

            $('body').on('click', '.removeButton', function (e) {
                $(this).parent().remove();
            });

            $(document).on("keyup", "input, textarea, select", function () {
                $(this).css('border', '1px solid #ccc');
            });
            $(document).on("change", "select", function () {
                $(this).css('border', '1px solid #ccc');
            });

        });

        $('body').on('click', '#upload', function (e) {
            e.preventDefault();
            $(".frm-grp span.error").each(function (i) {
                $(this).hide();
            });
            var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
            var email = $("#email").val();
            var log_subject = $("#log_subject").val();
            var log_message = $("#log_message").val();
            var log_name = $("#log_name").val();
            var log_country = $("#log_country").val();
            var log_mobile = $("#log_mobile").val();

            var cntry_length = log_country.length;
            var mod_legnth = log_mobile.length - 1;
            //alert(mod_legnth);
            var org_mob_length = mod_legnth - cntry_length;
            //alert(org_mob_length);

            var valid = emailRegex.test(email);


if(log_name == '' || email == '' || log_subject== '' || log_message== '' || log_country== '' || log_mobile== ''){

            if (log_name == '') {
//                $( "#log_name" ).focus();
                $("#log_name").next('.error').children("p").html('Enter your name');
                $("#log_name").next('.error').show();
//                return false;
            } if (email == '') {
//                $( "#log_email" ).focus();
                $("#email").next('.error').children("p").html('Enter your email');
                $("#email").next('.error').show();
//                return false;
            } if (!valid) {
//                $( "#log_email" ).focus();
                $("#email").next('.error').children("p").html('Invalid email');
                $("#email").next('.error').show();
//                return false;
            } if (log_country == '') {
//                $( "#log_country" ).focus();
                $("#log_country").next('.error').children("p").html('Select your country');
                $("#log_country").next('.error').show();
//                return false;
            } if (log_mobile == '') {
//                $( "#log_mobile" ).focus();
                $("#log_mobile").next('.error').children("p").html('Enter your mobile');
                $("#log_mobile").next('.error').show();
//                return false;
            } if (!validatePlus(log_mobile))
            {
//                $( "#log_mobile" ).focus();
                $("#log_mobile").next('.error').children("p").html('Mobile number must start with a leading + sign.');
                $("#log_mobile").next('.error').show();
//                return false;
            }  if ($("#log_mobile").val().match(/\+/gi).length > 1)
            {
//                $( "#log_mobile" ).focus();
                $("#log_mobile").next('.error').children("p").html('No more non-numeric character is allowed in "Mobile number" field apart from the leading + sign.');
                $("#log_mobile").next('.error').show();
//                return false;
            } if (log_mobile.indexOf('+' + log_country) == -1)
            {
//                $( "#log_mobile" ).focus();
                $("#log_mobile").next('.error').children("p").html('Country code must match the country selected in "Country of residence" field.');
                $("#log_mobile").next('.error').show();
//                return false;
            } if (org_mob_length < 4 || org_mob_length > 15) {
//                $( "#log_mobile" ).focus();
                $("#log_mobile").next('.error').children("p").html('The local part of mobile number (excluding the country code) should contain a minimum of 4 digits and a maximum of 15 digits.');
                $("#log_mobile").next('.error').show();
//                return false;
            } if (log_subject == '') {
//                $( "#log_subject" ).focus();
                $("#log_subject").next('.error').children("p").html('Enter your subject');
                $("#log_subject").next('.error').show();
//                return false;
            } if (log_message == '') {
                
                $("#log_message").next('.error').children("p").html('Enter your message');
                $("#log_message").next('.error').show();
//                $( "#log_message" ).focus();
//                return false;
            }} else {
                var formData = new FormData($(this).parents('form')[0]);
                //$('.loggedin input, .loggedin textarea, .loggedin select').css('border','1px solid #cccccc');
                $.ajax({
                    url: 'upload_files_mulitple.php',
                    type: 'POST',
                    data: formData,
                    //dataType: "JSON",
                    xhr: function () {
                        var myXhr = $.ajaxSettings.xhr();
                        return myXhr;
                    },
                    beforeSend: function (jqXHR, setting) {
                        $('#upload').val('SUBMITTING...');
                        $('.loader').show();
                        $('#upload').attr('disabled', 'disabled');
                    },
                    success: function (data) {
						
                        $('#upload').val('SUBMIT');
                        $('#upload').removeAttr('disabled');
                        $('#submitmessage').show();
                        $('.add_more_fields').remove();
                        $('.loader').hide();
                        $('form.loggedin').trigger("reset");
						$('html, body').animate({
							scrollTop: "0px"
						}, 800);

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
                //return false;
            }
        });

    </script>

    <?php require('footer.php'); ?>
