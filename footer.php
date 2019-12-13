<?php
require_once 'amal-functions.php';
require_once 'functions.php';
$addr_data = getContactAddress();
if (isset($addr_data) && count($addr_data) > 0) {
    $country_name = getCountryNameById($addr_data['country']);
}
require_once("libraries/helper.php");
?>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-footer col-md-4 col-xs-6">
                <h3>Contacts</h3>
                <p class="contact-us-details">
                    <b>Address:</b> 
					
					<?php
					//var_dump($country_name);
					?>
					
                    <?php if (isset($country_name) > 0) { ?>
                        <br>			
                        <?php echo isset($addr_data['company_name']) ? html_entity_decode(stripcslashes($addr_data['company_name'])) : "" ?><br>
                        <?php echo isset($addr_data['address_line1']) ? html_entity_decode(stripcslashes($addr_data['address_line1'])) : "" ?>,<br>

                        <?php
                        if (isset($addr_data['address_line2']) && $addr_data['address_line2'] != '') {
                            ?>
                            <?php echo html_entity_decode(stripcslashes($addr_data['address_line2'])) . ',<br>'; ?>
                        <?php } ?>

                        <?php echo isset($addr_data['city']) ? html_entity_decode(stripcslashes($addr_data['city'])) : "" ?>,

                        <?php
                        if (isset($addr_data['state']) && $addr_data['state'] != '') {
                            ?>
                            <?php echo html_entity_decode(stripcslashes($addr_data['state'])) . ','; ?>
                        <?php } ?>

                        <?php echo isset($addr_data['post_code']) ? html_entity_decode(stripcslashes($addr_data['post_code'])) : "" ?>,<br>
                    <?php } ?>
                    <?php echo isset($country_name) ? $country_name : "" ?>.
                    <br/>
					<?php if(config("support_message_status")==1){?>
                    Email: <a href="mailto:support@reojen.com">support@reojen.com</a>
					<?php }?>
				</p>
            </div>
        
        
        <div class="col-footer col-md-4 col-xs-6" style="padding-top: 20px;">
			 <h3></h3>
        <div class="row" style="padding-bottom:5px;">
            <div class="col-md-12">
                  <a class="footer-copyright" style="border-top: 0px dotted #7C7C7C; " href="terms_condition.php">Terms & Conditions</a>
                <!--<a class="footer-copyright" href="terms_condition.php"  >Terms & Conditions</a>-->
            </div>
        </div>
        <div class="row" style="padding-bottom:5px;">
            <div class="col-md-12">
                  <a class="footer-copyright" href="privacy_policy.php">Privacy policy</a>
                <!--<a class="footer-copyright" href="terms_condition.php"  >Terms & Conditions</a>-->
            </div>
        </div>
        <div class="row" style="padding-bottom:5px;">
            <div class="col-md-12">
                  <a class="footer-copyright" href="refund_policy.php">Refund policy</a>
                <!--<a class="footer-copyright" href="terms_condition.php"  >Terms & Conditions</a>-->
            </div>
        </div>
       </div>
       </div>
        <div class="row">
            <div class="col-md-12">
                <div class="footer-copyright">Copyright &copy; <?php echo date("Y") ?> Reojen Co. All rights reserved.</div>
            </div>
        </div>
    </div>
</div>
<div id="abcc">
<div id="popupContact2">
<form action="#" id="form2" method="post" name="form2">
<img id="close" src="img/wrong.png" onclick ="div_hide2()">
<h4>Add an email address to your Reojen account </h4>
<hr>
<p id="emailSuccMessage" style="color:#3c763d;"></p>
<!--<p id="emailErrMessage" style="color:#FF0000;"></p>-->
<p>Email Address:<br><input type="text" name="email_address" id="email_address"></p>
<p id="emailErrMessage" style="color:#FF0000;margin-top: 0px;"></p>
<p style="margin-top: 0px;"><a href="javascript:void(0);" onClick="addEmail()" class="btn btn-small" ><i class="icon-shopping-cart icon-white"></i>Continue</a></p>
<p style="padding-left:15px;padding-right:15px;">You can manage your Reojen account email address in <a href="myaccount.php">My account</a> page</p>
</form>
</div>
</div>
<style>
.error{display:none;}
</style>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/leaflet.js"></script>
<script src="js/jquery.fitvids.js"></script>
<script src="js/jquery.sequence-min.js"></script>
<script src="js/jquery.bxslider.js"></script>
<script src="js/main-menu.js"></script>
<script src="js/template.js"></script>
<script>
$(document).ready(function(){
	//alert($('#login_mob .error p').html());
	if($('#login_mob .error p').html()!=""){
		$('#login_mob .error').show();
	}
});
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}
function div_show2() {
document.getElementById('abcc').style.display = "block";
}
//Function to Hide Popup
function div_hide2(){
document.getElementById('abcc').style.display = "none";
}
function addEmail(){
	var email = document.getElementById('email_address').value;
	if(email == ""){
		$('#emailErrMessage').html('Please enter email address');
	}else{
		$(emailErrMessage).html('');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(email)) {
			$(emailErrMessage).html('Please enter a valid email address');	
		}else{
			$(emailErrMessage).html('');
			$.post('ajax_addEmail.php',{email:email},function(data){
				$('#emailSuccMessage').html('-');
				setTimeout(
				function() 
				{
				window.location.href = 'add-money.php'; 
				}, 250);
				
			});
		}	
	}
}
</script>
</body>
</html>
