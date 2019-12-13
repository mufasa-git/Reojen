<?php
/* ob_start();
  session_start(); */
if (isset($_SESSION['mob_id']) && $_SESSION['mob_id'] != "") {
    header("location: home.php"); // Redirecting To Other Page
    return;
}
require("header.php");
include('connect/db.php');  // Database connection and settings
// function mail_attachment($filename, $mailto, $from_mail, $from_name, $replyto, $bcc, $subject, $message){  
//     $uid = md5(uniqid(time()));
//     $mime_boundary = $uid; 
//     $header = "From: ".$from_name." <".$from_mail.">\r\n";
//     $header .= "Bcc: ".$bcc."\r\n";
//     $header .= "Reply-To: ".$replyto."\r\n";
//     $header .= "MIME-Version: 1.0\r\n";
//     $header .= "Content-Type: multipart/mixed; boundary=\"".$mime_boundary."\"\r\n\r\n";
//     $header .= "This is a multi-part message in MIME format.\r\n";
//     $header .= "--".$mime_boundary."\r\n";
//     $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
//     $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
//     $header .= nl2br($message)."\r\n\r\n";
//     $header .= "--".$mime_boundary."\r\n";
//     foreach($filename as $k=>$v){
//         $file = $v;
//         $file_size = filesize($file);
//         $handle = fopen($file, "r");
//         $content = fread($handle, $file_size);        
//         fclose($handle);
//         $content = chunk_split(base64_encode($content));
// 		$T=md5(uniqid(time()));
//         $header .= "Content-Type: application/octet-stream; name=\"".$T.".jpg\"\r\n"; // use different content types here
//         $header .= "Content-Transfer-Encoding: base64\n\n". $content. "\n\n";
//         $header .= "Content-Disposition: attachment; filename=\"".$T.".jpg\"\r\n\r\n";
//         $header .= $content."\r\n\r\n";
//         $header .= "--".$mime_boundary."--"."\r\n";
//     }     
//     if (mail($mailto, $subject, $message, $header)) {
//         echo "mail send ... OK"; // or use booleans here
//         return true;
//     } else {
//         echo "mail send ... ERROR!";
//         return false;
//     }
// }

if (isset($_POST["log_submit"])) {
    // if(empty($_POST["log_subject"]) || empty($_POST["log_email"]) || empty($_POST["log_message"]))
    // {
    // 	$error = "Both fields are required.";
    // }
    // else
    // {
    // 	$log_email = $_POST['log_email'];
    // 	$log_subject= $_POST['log_subject'];
    // 	$log_message= $_POST['log_message'];
    // 	$attach=$_POST['log_files'];
    // 	// To protect from MySQL injection
    // 	if(isset($_FILES['log_files']['tmp_name']) && count($_FILES['log_files']['tmp_name'])){
    // 		mail_attachment($_FILES['log_files']['tmp_name'], $log_email, 'B2C@marketing.com', 'B2C', '', '', $log_subject, $log_message);	
    // 	}else{
    // 		mail($log_email,'B2C','','',$log_subject,$log_message);	
    // 	}						
    // }
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
                                    <a href="#"><b>Balance: $0.00</b></a></li>							
                                <li>
                                    <div class="btn-group pull-right">
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
                                    </div>
                                </li>
                            </ul>

<?php } ?>

                    </ul>
                </div>
            </div>
<?php require_once 'nav.php'; ?>
        </div>
    </div>

    <!-- Homepage Slider -->
    <div class="homepage-slider">
        <div id="sequence">
            <ul class="sequence-canvas">
                <!-- Slide 1 -->
                <li class="bg4">
                    <!-- Slide Title -->
                    <!-- Slide Text -->
                    <img class="slide-img"   />
                </li>
                <!-- End Slide 1 -->
                <!-- Slide 2 -->
                <li class="bg3">
                    <!-- Slide Title -->
                    <!-- Slide Text -->
                    <img class="slide-img"   />
                </li>
                <!-- End Slide 2 -->
                <!-- Slide 3 -->
                <li class="bg1">
                    <!-- Slide Title -->
                    <!-- Slide Text -->
                    <p>
                        <img class="slide-img"  />
                </li>
                <!-- End Slide 3 -->
            </ul>
            <div class="sequence-pagination-wrapper">
                <ul class="sequence-pagination">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                </ul>
            </div>
        </div>
    </div>

    <h4 align="center" style=" font-size: 35px;">Submit A Support Ticket</h4>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">

                <!-- 	<form enctype="multipart/form-data" action="upload.php" method="post">
                            <input name="file[]" type="file" />
                            <button class="add_more">Add More Files</button>
                            <input type="button" value="Upload File" id="upload"/>
                        </form> -->

                <form class="loggedin" method="post" action="" enctype="multipart/form-data">
                    <div class="alert alert-success" id="submitmessage" style="display: none">
                        Your support ticket has been submitted successfully. A mail regarding the delivery confirmation of your support request has been sent to your email address.</div>
                    <label>Email</label>
                    <input type="email" id="email" name="log_email" placeholder="Email" class="form-control">
                    <label>Subject</label>
                    <input type="text" name="log_subject" id="log_subject" placeholder="Subject" class="form-control">
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
                    <label>Attachments</label>
                    <div>
                        <input class="uploadFile" style="padding: 5px 10px;" placeholder="Choose File" disabled="disabled" />
                        <div class="fileUpload btn btn-primary">
                            <span>Attach</span>
                            <input type="file" name="file[]" class="upload">
                        </div>
                    </div>		

                    <!-- <div class="clear"></div> -->
                    <button class="add_more btn btn-primary">Add More Files</button> 
                    <div class="clear"></div><br/>
                    <!-- <input type="file" multiple required="required" name="log_files[]"> -->
                    <label>Message</label>
                    <textarea name="log_message" id="log_message" placeholder="Message" class="form-control" rows="8"></textarea>
                    <input type="submit" class="btn" id="upload" value="SUBMIT" name="log_submit">
                    <img src="img/default.gif" class="loader" style="display: none;"> 
                </form>
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
                $(this).parent().prev().val(this.value);
            });

            // document.getElementById("uploadBtn").onchange = function () {
            //     document.getElementById("uploadFile").value = this.value;
            // };

            $('.add_more').click(function (e) {
                e.preventDefault();
                $(this).before('<div><input class="uploadFile" placeholder="Choose File" disabled="disabled" /><div class="fileUpload btn btn-primary"><span>Attach</span><input type="file" name="file[]" class="upload"></div></div>');
            });
        });

        $('body').on('click', '#upload', function (e) {
            e.preventDefault();
            var email = $("#email").val();
            var log_subject = $("#log_subject").val();
            var log_message = $("#log_message").val();

            if (email == '') {
                $("#email").css('border', '1px solid red').focus();
                return false;
            } else if (log_subject == '') {

                $("#log_subject").css('border', '1px solid red').focus();
                return false;
            } else if (log_message == '') {
                $("#log_message").css('border', '1px solid red').focus();
                return false;
            } else {
                var formData = new FormData($(this).parents('form')[0]);
                $('.loggedin input, .loggedin textarea').css('border', '1px solid #cccccc');
                $.ajax({
                    url: 'upload_files_mulitple.php',
                    type: 'POST',
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
                        $('#submitmessage').show().delay(5000).fadeOut('slow');
                        ;
                        $('.loader').hide();
                        $('form.loggedin').trigger("reset");
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;
            }
        });

    </script>
<?php require("footer.php"); ?>