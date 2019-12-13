<?php
ob_start();
session_start();
// print_r($location->geoplugin_countryName);
if(isset($_SESSION['mob_id']) && $_SESSION['mob_id']!="")
{
	header("location: home.php"); // Redirecting To Other Page
}
require("header.php");

include('connect/db.php');  // Database connection and settings
require_once("functions.php");

ini_set('display_errors', 0);
/*ini_set('error_reporting',E_ALL);*/

if(isset($_POST['btn-signup']))
{
	$is_Csrf_Verified=csrf_verify();
	if(!$is_Csrf_Verified)
	{
		$_SESSION['sign_up_err'] = '<div class="alert alert-danger">Token mismatch.Please try again later.</div>';
	    //header("location: signup.php");
	    //exit();
	}
	else
	{
		// $data_arr=array();
		// $custom_question1=0;
		// $custom_question2=0;
		// if($_POST['Question1']=='custom1')
		// {
		// 	$securityQn1 = $_POST['txtQustion1'];
		// 	$custom_question1=1;
		// }
		// else
		// {
		// 	$securityQn1 = $_POST['Question1'];
		// }
		// $Answer1 = $_POST['c_answer1'];
		// if($_POST['Question2']=='custom2')
		// {
		// 	$securityQn2 =$_POST['txtQustion2'];
		// 	$custom_question2=1;
		// }
		// else
		// {
		// 	$securityQn2 = $_POST['Question2'];
		// }
		// $data_arr['fname']=$_POST['fname'];
		// $data_arr['mname']=$_POST['mname'];
		// $data_arr['lname']=$_POST['lname'];
		// $data_arr['mobile_no']=$_POST['mobile_no'];
		// $data_arr['password']=$_POST['password'];
		// $data_arr['c_password']=$_POST['c_password'];
		// $data_arr['CompanyName']=$_POST['cmpname'];
		// $data_arr['SecurituyQuestion1']=$securityQn1;
		// $data_arr['custom_question1']=$custom_question1;
		// $data_arr['Answer1']=$_POST['c_answer1'];
		// $data_arr['SecurityQuestion2']=$securityQn2;
		// $data_arr['custom_question2']=$custom_question2;
		// $data_arr['Answer2']=$_POST['c_answer2'];
		// $data_arr['Country']=$_POST['fname'];
		// $data_arr['country_res']=$_POST['fname'];

		$fname = trim(mysqli_escape_string($connection,$_POST['fname']));
		$lname = trim(mysqli_escape_string($connection,$_POST['lname']));
		$Cmpname = trim(mysqli_escape_string($connection,$_POST['cmpname']));
		$mobile_no = trim(mysqli_escape_string($connection,$_POST['mobile_no']));
		$password = trim(mysqli_escape_string($connection,$_POST['password']));
		$c_password = trim(mysqli_escape_string($connection,$_POST['c_password']));
		$custom_question1=0;
		$custom_question2=0;
		
		$userpass = $password;
		
		if($_POST['Question1']=='custom1')
		{
			$securityQn1 = trim(mysqli_escape_string($connection,$_POST['txtQustion1']));
			$custom_question1=1;
		}
		else
		{
			$securityQn1 = $_POST['Question1'];
		}
		$Answer1 = $_POST['c_answer1'];
		if($_POST['Question2']=='custom2')
		{
			$securityQn2 =trim(mysqli_escape_string($connection, $_POST['txtQustion2']));
			$custom_question2=1;
		}
		else
		{
			$securityQn2 = $_POST['Question2'];
		}
		$mname = trim($_POST['mname']);
		$countryres= GetCountry($_POST['country_res'],$connection);
		//$country = GetCountry($_POST['country'],$connection);
		$country = GetCountry($_POST['country_res'],$connection);
		$Answer2 = $_POST['c_answer2'];
		$password = md5($password);
		$c_password = md5($c_password);
                $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";  
                $size = strlen( $chars );
                $str = '';
               for( $i = 0; $i < 12; $i++ ) {
                      $str .= $chars[ rand( 0, $size - 1 ) ];
               }
	        $query_verify_email = "SELECT * FROM users WHERE mobile_no=".$_POST['mobile_no'];
		$verified_email = mysqli_query($connection,$query_verify_email) or die("Error: ".mysqli_error($connection));
		
                if (!$verified_email) 
		{
			echo ' System Error';
		}
                print_r(mysqli_num_rows($verified_email) == 0);
		if (mysqli_num_rows($verified_email) == 0) 
		{
			$date = new DateTime("now", new DateTimeZone('Europe/Kiev') );
			$dt = $date->format('Y-m-d H:i:s'); 
			 $create_date = strtotime($dt);
			
			// Generate a unique code:
			 $hash = md5(uniqid(rand(), true));
		        $query_create_user = 'INSERT INTO users ( reference_number,fname, mname,lname, mobile_no, password, c_password,CompanyName,SecurituyQuestion1,custom_question1,Answer1,SecurityQuestion2,custom_question2,Answer2,Country,country_res,date_of_creation) 
			VALUES ("'.$str.'", "'.$fname.'","'.$mname.'", "'.$lname.'", "'.$mobile_no.'", "'.$password.'","'.$c_password.'","'.$Cmpname.'","'.$securityQn1.'","'.$custom_question1.'","'.$Answer1.'","'.$securityQn2.'","'.$custom_question2.'","'.$Answer2.'","'.$country.'","'.$countryres.'","'.$create_date.'")';
			$created_user = mysqli_query($connection,$query_create_user);
			$lstid=mysqli_insert_id($connection);
			if (!$created_user) 
			{
				echo 'Query Failed ';
			}
	        
			if (mysqli_affected_rows($connection) == 1) 
			{ 
				//If the Insert Query was successfull.

				//Check username and password from database
				$sql="SELECT * FROM users WHERE user_id='$lstid'";
				$result=mysqli_query($connection,$sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				$mob_id = $row['mobile_no'];
				$user_name = $row['fname'].' '. $row['mname'].' '.$row['lname'];
				$user_id=$row['user_id'];
				$CompanyName = $row['CompanyName'];
				//If username and password exist in our database then create a session.
				//Otherwise echo error.
				 
				if(mysqli_num_rows($result) == 1)
				{
				$_SESSION['firstlogin']="true";
				$_SESSION['mob_id'] = $mob_id;
				$_SESSION['user_name'] = $user_name;
				$_SESSION['user_id']=$user_id;
				$_SESSION['CompanyName']=$CompanyName;
				//for sending email block this function beacuse email not get by user.
				//signup_mail($lstid,$userpass); //send confirmation email to register user
				 // Initializing Session
				header("location: home.php"); // Redirecting To Other Page
				}
				else
				{
					$error = "Error occured.";
				}
				echo '<div class="alert alert-success">Registration Successful </div>';
			} 
			else 
			{ 
				// If it did not run OK.
				echo '<div class="alert alert-info">You could not be registered due to a system
				error. We apologize for any
				inconvenience.</div>';
				die(mysqli_error($connection));
			}
		}
		else
		{
			echo '<script>setInterval(function(){ if($("#register-mobile").val()!=""){document.getElementById("email_error").innerHTML ="<p>This Mobile no is already registered</p>"; }}, 1000);</script>';
		}
	}
}

function GetCountry($code,$connection)
{
	 include('connect/db.php');
	$query_GetCountry = "SELECT * FROM countrycode WHERE Code ='$code'";
	$result=mysqli_query($connection,$query_GetCountry);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$Country = $row['Country'];
	return $Country;
}

if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	$location= json_decode(file_get_contents('http://ip-api.com/json/'.$_SERVER['HTTP_X_FORWARDED_FOR']));
}
else 
{
	$location= json_decode(file_get_contents('http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR']));
	
	//$location= json_decode( file_get_contents('http://ip-api.com/json/104.36.180.129') );
//$location= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
	//print_r($_SERVER); exit;
	
	/*$curl_handle=curl_init();
	curl_setopt($curl_handle, CURLOPT_URL,'http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR']);
	curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
	$curl_data = curl_exec($curl_handle);
	curl_close($curl_handle);
	
	$location = json_decode($curl_data);*/

}
	
	
	$sql="SELECT Code FROM countrycode WHERE Country='".$location->country."'";
	
	$result=mysqli_query($connection,$sql);
	$country_data=mysqli_fetch_assoc($result);
	$country_code=isset($country_data['Code'])?'+'.$country_data['Code']:'';
	
?>

    <body>
        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
	        	<div class="menuextras">
					<div class="extras">
						
					</div>
		        </div>
		        <?php require_once 'nav.php';?>
			</div>
		</div>

        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Create your Reojen account</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="basic-login">
						<?php
                          if(isset($_SESSION['sign_up_err']) && $_SESSION['sign_up_err']!="")
                          {
                            ?>
                              <?php echo $_SESSION['sign_up_err']; ?>

                            <?php 
                            unset($_SESSION['sign_up_err']);
                          }
                          ?>
							<form role="form" action="signup.php" onSubmit="return validate();" method="post" autocomplete="off">
								<div class="hidden">
									<input type="hidden" name="<?php echo get_csrf_token_name(); ?>" value="<?php echo get_csrf_hash(); ?>">
								</div>
								<div class="form-group">
									<p>Already have an account? <a href="login.php">Log in</a></p>
									<p style="color:black;">Fields marked with * are mandatory.</p>
		        				 	<label for="register-username"><i class="icon-user"></i> <b>First name*</b></label>
									<input class="form-control" onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" id="register-username" 
                                    type="text" placeholder="First name" name="fname" 
                                    value="<?php if(isset($_REQUEST['fname'])){echo $_REQUEST['fname'];}?>">
                                    <span class="error" ><p></p></span>
								</div>
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Middle name (optional)</b></label>
									<input class="form-control" onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" id="register-middlename" 
                                    type="text" placeholder="Middle name" name="mname" 
                                    value="<?php if(isset($_REQUEST['lname'])){echo $_REQUEST['lname'];}?>">
								    <span class="error" ><p></p></span>
								</div>
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Last name*</b></label>
									<input class="form-control" onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" id="register-lastname" 
                                    type="text" placeholder="Last name" name="lname" 
                                    value="<?php if(isset($_REQUEST['lname'])){echo $_REQUEST['lname'];}?>">
								    <span class="error" ><p></p></span>
								</div>
                                <div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Company name (optional)</b></label>
									<input class="form-control" id="register-cmpname" type="text" placeholder="Company name" name="cmpname" 
                                    value="<?php if(isset($_REQUEST['lname'])){echo $_REQUEST['cmpname'];}?>">								   
								</div>

                                <div class="form-group">
                                	<label for="register-password"><i class="icon-lock"></i> <b>Country of residence*</b></label>						
                                    <select name="country_res" id="country_res" class="form-control">
                                    <!--<option value="Select Country">Select Country</option>-->
                                    <?php
										getCountryDropdownWithoutCode($location);
                                    ?>
                                    </select>
                                   <input type="hidden" name="cntry_hidden" id="cntry_hidden" 
                                   value="<?php echo $location->country ?>" />
                                   <span class="error" id="Cntryreserror" name="Cntryreserror" ><p></p></span>
                                   <span>Your country of residence must match your IP address.</span>
                                </div>

								<div class="form-group">
									
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Mobile number (in international format)*</b></label>
									<!--Country-selection-->
                                    
                                    <!--Country-selection end-->
                                    <input onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" 
                                           id="register-mobile" onkeypress="javascript:return isNumberKey(event);" onchange="mobileregister()" type="text" name="mobile_no" 
                                    value="<?php if(isset($_REQUEST['mobile_no'])){echo $_REQUEST['mobile_no'];}else{echo $country_code;}?>">
                                    <span class="error"><p></p></span>
                                    <input type="hidden" id="mob_exist" value="0">
                                    <span class="error" id="Cntryerror" name="Cntryerror" ></span>
                                    <div id="mob_errorsuccess" class="errorsuccess" style="display: block;color:Green;"></div>
									<!--<div id="mob_error" class="error" style="display: block;color:red;"></div>-->
									<span>Your mobile number should be of same country as your country of residence.</span>
									<!--<div id="email_error" class="error" style="display: block;color:red;"></div>-->
								</div>
                          
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Password*</b></label>
                                    <div style="width:200px;padding-left: 50px;float: right;cursor: pointer;">
                                    <a onClick="showpass1()" id="showpwd">Show password</a></div>
									<input onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" id="register-password" type="password" onblur="check_pass123(this);" placeholder=""
                                     name="password" autocomplete="off" value="<?php //if(isset($_REQUEST['password'])){echo $_REQUEST['password'];}?>">
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
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Re-enter password*</b></label>
                                    <div style="width:200px;padding-left: 50px;float: right;cursor: pointer;">
                                    <a onClick="showpass2()" id="showpwdr">Show password</a></div>
                                    <input onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" 
                                    autocomplete="off" id="register-password2" type="password" placeholder="" onblur="check_conf_pass123(this);" name="c_password" 
                                    value="<?php //if(isset($_REQUEST['c_password'])){echo $_REQUEST['c_password'];}?>">
                                    <span class="error" name="pwderror" id="pwderror" ><p></p></span>
								</div>                                
                                
                                <div class="form-group">
		        				   <label for="register-Qn1"><i class="icon-lock"></i> <b>Security Question 1 *</b></label>
                                   <select name="Question1" id="Question1" placeholder="Select Question" class="form-control" onChange="ShowHideDiv();hide_nxt(this);">
                                   <option selected>Select question</option>
                                   <option value="custom1" <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='custom1'){ echo 'selected';}} ?>>Create a custom security question</option>
                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='What was the house number and street name you lived in as a child?'){ echo 'selected';} }?>>What was the house number and street name you lived in as a child?</option>
                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='What were the last four digits of your childhood telephone number?'){ echo 'selected';} }?>>What were the last four digits of your childhood telephone number?</option>
                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='What primary school did you attend?'){ echo 'selected';} }?>>What primary school did you attend?</option>
                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='In what town or city was your first full time job?'){ echo 'selected';} }?>>In what town or city was your first full time job?</option>
                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='In what town or city did you meet your spouse/partner?'){ echo 'selected';} }?>>In what town or city did you meet your spouse/partner?</option>
                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='What is the last name of the teacher who gave you your first failing grade?'){ echo 'selected';} }?>>What is the last name of the teacher who gave you your first failing grade?</option>

                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='In what city or town does your nearest sibling live?'){ echo 'selected';} }?>>In what city or town does your nearest sibling live?
                                   </option>
                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='In what year was your father born?'){ echo 'selected';} }?>>In what year was your father born?</option>
                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='What is the name of your favorite childhood friend?'){ echo 'selected';} }?>>What is the name of your favorite childhood friend?</option>
                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='What was your favorite food as a child?'){ echo 'selected';} }?>>What was your favorite food as a child?</option>
                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='What is your favorite team?'){ echo 'selected';} }?>>What is your favorite team?</option>
                                   <option <?php if(isset($_REQUEST['Question1'])){if($_REQUEST['Question1']=='What was your favorite sport in high school?'){ echo 'selected';} }?>>What was your favorite sport in high school?</option>
                                   </select>
                                   <?php
                                   if(isset($_REQUEST['txtQustion1']) && $_REQUEST['Question1']=='custom1' && $_REQUEST['txtQustion1']!='')
                                   {
                                   		$sty1='style="display: block"';
                                   }
                                   else
                                   {
                                   		$sty1='style="display: none"';
                                   }
                                   ?>
                                    <div id="dvCustomize" <?php echo $sty1; ?>>
                                      <input class="form-control" type="text" id="txtQustion1" name="txtQustion1" onChange="hide_question1()"
                                       	placeholder="Security Question 1" value="<?php if(isset($_REQUEST['txtQustion1'])){echo $_REQUEST['txtQustion1'];}?>" />
                                    </div>
                                    <span class="error" id="Qn1error" name="Qn1error" ><p></p></span>
                                   
								</div>
                                <div class="form-group">
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Answer 1*</b></label>
                                    <input onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" 
                                    autocomplete="off" id="register-Answer1" type="text" placeholder="" name="c_answer1" 
                                    value="<?php if(isset($_REQUEST['c_answer1'])){echo $_REQUEST['c_answer1'];}?>">
                                    <span class="error" ><p></p></span>
								</div>
                                <div class="form-group">
		        				   <label for="register-Qn2"><i class="icon-lock"></i> <b>Security Question 2*</b></label>
                                   <select name="Question2" id="Question2" placeholder="Select Question" class="form-control" 
                                   onChange="ShowHideDiv2();hide_nxt(this);" >
                                   <option selected>Select question</option>
                                   <option value="custom2" <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=='custom2'){ echo 'selected';}} ?>>Create a custom security question</option>
                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=='What is the middle name of your oldest child?'){ echo 'selected';}} ?>>What is the middle name of your oldest child?</option>
                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=="What are the last five digits of your driver/'s licence number?"){ echo 'selected';} }?>>What are the last five digits of your driver's licence number?</option>
                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=="What is your grandmother/'s (on your mother/'s side) maiden name?"){ echo 'selected';} }?>>What is your grandmother's (on your mother's side) maiden name?</option>
                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=="What is your spouse or partner's mother/'s maiden name?"){ echo 'selected';} }?>>What is your spouse or partner's mother's maiden name?</option>
                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=='In what town or city did your mother and father meet?'){ echo 'selected';} }?>>In what town or city did your mother and father meet?</option>

                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=='What was the make and model of your first car?'){ echo 'selected';} }?>>What was the make and model of your first car?</option>
                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=='What was the name of the hospital where you were born?'){ echo 'selected';} }?>>What was the name of the hospital where you were born?</option>
                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=='Who is your childhood sports hero?'){ echo 'selected';} }?>>Who is your childhood sports hero?</option>
                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=='What was the name of the company where you had your first job?'){ echo 'selected';} }?>>What was the name of the company where you had your first job?</option>
                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=='When is your anniversary?'){ echo 'selected';} }?>>When is your anniversary?</option>
                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=='What is your favorite color?'){ echo 'selected';} }?>>What is your favorite color?</option>
                                   <option <?php if(isset($_REQUEST['Question2'])){if($_REQUEST['Question2']=="What is your oldest cousin/'s first and last name?"){ echo 'selected';} }?>>What is your oldest cousin's first and last name?</option>
                                   </select>

                                   <?php
                                   if(isset($_REQUEST['txtQustion2']) && $_REQUEST['Question2']=='custom2' && $_REQUEST['txtQustion2']!='')
                                   {
                                   		$sty2='style="display: block"';
                                   }
                                   else
                                   {
                                   		$sty2='style="display: none"';
                                   }
                                   ?>
                                    <div id="dvCustomize2" <?php echo $sty2; ?>>
                                     <input class="form-control" type="text" id="txtQustion2" name="txtQustion2" onChange="hide_question2()"
                                      placeholder="Security Question 2" value="<?php if(isset($_REQUEST['txtQustion2'])){echo $_REQUEST['txtQustion2'];}?>" />
                                    </div>
                                    <span class="error" id="Qn2error" name="Qn2error" ><p></p></span>
                                    
								</div>
                                <div class="form-group">
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Answer 2*</b></label>
                                    <input onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" 
                                    autocomplete="off" id="register-Answer2" type="text" placeholder="" name="c_answer2" 
                                    value="<?php if(isset($_REQUEST['c_answer2'])){echo $_REQUEST['c_answer2'];}?>">
                                    <span class="error" ><p></p></span>
								</div>
								<div class="form-group">                               
									<button type="submit" onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="btn pull-right" name="btn-signup" >Sign up</button>
									<div class="clearfix"></div>
								</div>
							</form>
							
							</div>
					</div>
					
				</div>
			</div>
		</div>


<script type="text/javascript">

	 $(document).ready(function(){
	 	$('#country_res').on('change', function() {
			$("#register-mobile").val('+'+this.value);
		});

		$('#register-password').blur(function() {
		  //if($(this).val() != ""){
		    //$(".show_tooltip").show();    
		 // }
		 // else{
		    $(".show_tooltip").hide(); 
		  //}
		});

		$('#register-password').focus(function() {
		  $(".show_tooltip").show();
		});   
	});
function mobileregister(){
    var mobileNumwithode = $("#register-mobile").val();
//		alert(mobileNumwithode);
	    $.ajax({
	        type: "POST",
	        url: "check.php",
	        data: { mobile_no_check_with_ip:mobileNumwithode,countrycode: $("#country_res option:selected").val(),countrycodetext: $("#country_res option:selected").text()},
	        success: function(result) {
//                    alert(result.trim());
				if( result.trim() == 'Available' )
				{
//					$("#mob_exist").val(1);
                                        document.getElementById('mob_exist').value='1'
//                                        alert(result.trim());
				}
				else
				{
                                    document.getElementById('mob_exist').value='0'
//					$("#mob_exist").val(0);
				}
	        }
	    });
}
function validate()
{
	var ee = true;

	var cntry_length = $("#country_res option:selected").val().length;
	var mod_legnth = $("#register-mobile").val().length-1;
	var org_mob_length=mod_legnth-cntry_length;
	$('#register-mobile').next('.error').hide();

	$(".form-group span.error").each(function (i) {
	  $(this).hide();	  
	});	

	if($("#register-username").val()=='')
	{
		$("#register-username").next('.error').children("p").html('Enter your first name');
		$("#register-username").next('.error').show();
		ee=false;
	}
   	if($("#register-lastname").val()=='')
	{
		$("#register-lastname").next('.error').children("p").html('Enter your last name');
		$("#register-lastname").next('.error').show();
		ee=false;
	}
	if($('#country_res option:selected').val() == 'Select Country')
	{		
		$("#Cntryreserror p").html("Please select Country of residence");
		$("#Cntryreserror").show();
		ee=false;
	}
	if($("#register-mobile").val()=='')
	{		
		$("#register-mobile").next('.error').children("p").html('Enter your mobile number in international format');
		$("#register-mobile").next('.error').show();
		ee=false;
	}
	else if(!validatePlus($("#register-mobile").val()))
	{
		$("#register-mobile").next('.error').children("p").html('Mobile number must start with a leading + sign');
		$("#register-mobile").next('.error').show();
		ee=false;
	}
	else if($("#register-mobile").val().match(/\+/gi).length>1)
	{
		$("#register-mobile").next('.error').children("p").html('No more non-numeric character is allowed in "Mobile number" field apart from the leading + sign');
		$("#register-mobile").next('.error').show();
		ee=false;
	}
	else if ($("#register-mobile").val().indexOf('+'+$("#country_res option:selected").val()) == -1)
	{
		$("#register-mobile").next('.error').children("p").html('Country code must match the country selected in "Country of residence" field');
		$("#register-mobile").next('.error').show();
		ee=false;
	}
	else if(!isValidChar($("#register-mobile").val()))
	{
		$("#register-mobile").next('.error').children("p").html('Invalid mobile number. Spaces, dashes, hyphens,symbols (except the leading + sign) aren\'t allowed');
		$("#register-mobile").next('.error').show();
		ee=false;
	}
	else if(org_mob_length < 4 || org_mob_length >15)
	{
		$("#register-mobile").next('.error').children("p").html('The local part of mobile number (excluding the country code) should contain a minimum of 4 digits and a maximum of 15 digits');
		$("#register-mobile").next('.error').show();
		ee=false;
	}
			
	if($("#register-password").val()=='')
	{	
		$("#register-password").next('.error').children("p").html('Enter your password');
		$("#register-password").next('.error').show();
		ee=false;
	}
	else 
	{
		if(!Validatepass($("#register-password").val()))
		{
			$("#register-password").next('.error').children("p").html('<small>Your password must contain minimum 8 characters and must contain at least two of the following: upper case letter(s), lower case letter(s), number(s)</small>');
			$("#register-password").next('.error').show();
			ee=false;
		}
	}
	if($("#register-password2").val()=='')
	{
		
		$("#register-password2").next('.error').children("p").html('Re-enter your password');
		$("#register-password2").next('.error').show();
		ee=false;
	}
	else
	{
		if($("#register-password").val()!=$("#register-password2").val())
		{
			ee=false;
			$("#register-password").val("");
			$("#register-password2").val("");
			$("#register-password2").next('.error').children("p").html("Your passwords don't match");
			$("#register-password2").next('.error').show();
		}
	}
	
	if($("#Question1").val()== 'Select question')
	{
		
		$("#Question1").parent().find('.error').children("p").html('Select security question 1');
		$("#Question1").parent().find('.error').show();
		ee=false;
	}
	if($("#Question1").val()== 'custom1')
	{
		if($("#txtQustion1").val()=='')
		{
			$("#Question1").parent().find('.error').children("p").html('Enter your custom security question 1');
			$("#Question1").parent().find('.error').show();
			ee=false;
		}
	}
	if($("#Question2").val() == 'Select question')
	{
		$("#Question2").parent().find('.error').children("p").html('Selct security question 2');
		$("#Question2").parent().find('.error').show();
		ee=false;
	}
	if($("#Question2").val()== 'custom2')
	{
		if($("#txtQustion2").val()=='')
		{
			$("#Question2").parent().find('.error').children("p").html('Enter your custom security question 2');
			$("#Question2").parent().find('.error').show();
			ee=false;
		}
	}
	if($("#register-Answer1").val()=='')
	{
		
		$("#register-Answer1").next('.error').children("p").html('Enter answer 1');
		$("#register-Answer1").next('.error').show();
		ee=false;
	}
	if($("#register-Answer2").val()=='')
	{
		
		$("#register-Answer2").next('.error').children("p").html('Enter answer 2');
		$("#register-Answer2").next('.error').show();
		ee=false;
	}
	
	if($("#Cntryerror").html()!='')
	{
		
		ee=false;
	}
	
	if(ee==true)
	{

		var mobileNumwithode = $("#register-mobile").val();
//		alert(mobileNumwithode);
	    $.ajax({
	        type: "POST",
	        url: "check.php",
	        data: { mobile_no_check_with_ip:mobileNumwithode,countrycode: $("#country_res option:selected").val(),countrycodetext: $("#country_res option:selected").text()},
	        success: function(result) {
//                    alert(result.trim());
				if( result.trim() != 'Available' )
				{
					$("#mob_exist").val(1);
//                                        alert(result.trim());
				}
				else
				{
					$("#mob_exist").val(0);
				}
	        }
	    });
		if($("#mob_exist").val()==1)
		{
			$("#register-mobile").next('.error').children("p").html('There is already an user registered with this mobile number');
			$("#register-mobile").next('.error').show();
			ee=false;
		}
		else
		{
			$(".form-group span.error").each(function (i) {			  
			  if($(this).is(":visible"))
			  {
			    ee=false;
			  }  
			  
			});
		}
	}
	
	if(ee==true)	
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
 
  /*/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;*/
}


function hide_nxt(c)
{
	$(c).next('.error').hide();
}
function check_pass(c)
{
	$("#register-password").next('.error').hide();
	if($("#register-password").val()=='')
	{
		$("#register-password").next('.error').children("p").html('Enter your password');
		$("#register-password").next('.error').show();
		
		ee=false;
	}
	else
	{	
		if(!Validatepass($("#register-password").val()))
		{
			$("#register-password").next('.error').children("p").html('<small>Your password must contain minimum 8 characters and must contain at least two of the following: upper case letter(s), lower case letter(s), number(s)</small>');
			$("#register-password").next('.error').show();
			ee=false;
		}
	}
}
function check_conf_pass(c)
{
	$("#register-password2").next('.error').hide();
	if($("#register-password2").val()=='')
	{
		$("#register-password2").next('.error').children("p").html('Re-enter your password');
		$("#register-password2").next('.error').show();
		
		ee=false;
	}
	else if($("#register-password").val()!=$("#register-password2").val())
	{	
		ee=false;
		$("#register-password2").next('.error').children("p").html("Your passwords don't match");
		$("#register-password2").next('.error').show();
	}
}
function showpass1()
{
	if($("#register-password").attr('type')=="text")
	{
		$("#register-password").attr('type', 'password');
                document.getElementById('showpwd').innerHTML='Show Password';
		//$("#register-password2").attr('type', 'password');
		
	}
	else
	{
		$("#register-password").attr('type', 'text');
                 document.getElementById('showpwd').innerHTML='Hide Password';
		//$("#register-password2").attr('type', 'text');
	}
}

function showpass2()
{
	if($("#register-password2").attr('type')=="text")
	{
		//$("#register-password").attr('type', 'password');
		$("#register-password2").attr('type', 'password');
                document.getElementById('showpwdr').innerHTML='Show Password';
	}
	else
	{
		//$("#register-password").attr('type', 'text');
		$("#register-password2").attr('type', 'text');
                document.getElementById('showpwdr').innerHTML='Hide Password';
	}
}

function CheckUserName(mobileNum) 
{
    $.ajax({
        type: "POST",
        url: "check.php",
        data: {mobile_no:mobileNum},
        success: function(result) {
			if(result.trim()=="Available")
			{
				$("#mob_errorsuccess").html(result);
				$("#mob_error").html('');
			}
			else
			{
            	$("#mob_error").html(result);
				$("#mob_errorsuccess").html('');
			}
		
		
        }
    });
};

 function ShowHideDiv() 
 {
    var question1 = document.getElementById("Question1").value;

    var dvCustomize = document.getElementById("dvCustomize");
    dvCustomize.style.display = (question1=='custom1')? "block" : "none";
	if(question1!='custom1')
	{
		var txt = document.getElementById("txtQustion1");
		txt.value="";
	}
	hide_question1();	
 }
 function ShowHideDiv2() 
 {
    var question2 = document.getElementById("Question2").value;

    var dvCustomize = document.getElementById("dvCustomize2");
    dvCustomize.style.display = (question2=='custom2')? "block" : "none";
	if(question2!='custom2')
	{
		var txt = document.getElementById("txtQustion2");
		txt.value="";
	}
	hide_question2();
 }
	
function hide_question1()
{
	var txt = document.getElementById("Qn1error");
	txt.style.display="none";
	
}
function hide_question2()
{
	var txt = document.getElementById("Qn2error");
	txt.style.display="none";
}
function CheckCountryCode()
{
	var cntry = document.getElementById("country_res");
	var txt = document.getElementById("register-mobile");
	var len=cntry.value.length;
	var str=txt.value;
	var error = document.getElementById("Cntryerror");
	
	if(str!="" && cntry.value!="Select Country")
	{
	 str=str.substring(1, len+1); 

	if(cntry.value==str)
	{
		error.style.display="none";
		error.innerHTML="";
	}
	else
	{
		
		error.innerHTML="<p>Country code doesn't match your country.</p>";
		error.style.color="red";
		error.style.display="block";
	}
	}
}
 
function validatePlus(mbno) 
{
	var regExp = /^\+/;
  	if(regExp.test(mbno))
	{
  		return true;
	}
	return false;
}
function isValidChar(str)
{
	//var str = $('#Search').val();
	if(/^[a-zA-Z0-9- +]*$/.test(str) == false) 
	{
		return false;
	}
	return true;
}
</script>

<?php require("footer.php");?>
