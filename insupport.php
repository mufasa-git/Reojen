<?php 

require_once("libraries/helper.php");

if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name'])) {
    header('location:login.php');
}

require("header.php");
include('connect/db.php');  // Database connection and settings
require("libraries/helper.php");

$query = "SELECT * FROM users WHERE mobile_no ='" . $_SESSION['mob_id'] . "'";
$verified_email = mysqli_query($connection, $query) or die("Error: " . mysqli_error($connection));

$row = mysqli_fetch_array($verified_email, MYSQLI_ASSOC);

$nowType = $connection->query('SELECT * FROM settings WHERE name="payment_type" LIMIT 1')->fetch_assoc();
$_SESSION["show_notification"] = 1;
if ($nowType['value'] == 'BACS') {
    $currency_symbol = '&#163;';
} elseif($nowType['value'] == 'PAYPAL') {
	$currency_symbol = '<i class="fa fa-gbp"></i>';
} else {
    $currency_symbol = '&#x24;';
}
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
                                    <a href="#"><b>Balance: <?php echo $currency_symbol; ?> <?php echo wallet();?></b></a></li>
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
                    <li class="logo-wrapper"><a href="index.php"><img src="img/logo.png"/></a>
                    </li>
                    <li >
                        <a href="home.php">Home</a>
                    </li>
                    <li >
                        <a href="add-money.php">Add money</a>
                    </li>
                    <?php 
                    if ($nowType['value'] != 'BACS' && $nowType['value'] != 'PAYPAL') {
                    ?>
                    <li>
                        <a href="deposits.php">Deposits</a>
                    </li>
                    <?php }?>
                    <li class="active">
                        <a href="insupport.php">Support</a>
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
							<p>This email address will be added to your Reojen account automatically. You can manage your Reojen account email address in <a href="myaccount.php">My account</a> page.</p>
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
                var file_type = Array('jpg', 'jpeg', 'pdf', 'png', 'gif', 'bmp','tif');

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

            if (email == '') {
                $("#email").next('.error').children("p").html('Enter your email');
                $("#email").next('.error').show();
                return false;
            } else if (!valid) {
                $("#email").next('.error').children("p").html('Invalid email');
                $("#email").next('.error').show();
                return false;
            } else if (log_subject == '') {
                $("#log_subject").next('.error').children("p").html('Enter your subject');
                $("#log_subject").next('.error').show();
                return false;
            } else if (log_message == '') {
                $("#log_message").next('.error').children("p").html('Enter your message');
                $("#log_message").next('.error').show();
                return false;
            } else {
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
    <?php require("footer.php"); ?>