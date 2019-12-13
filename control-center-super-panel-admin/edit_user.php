<?php
$active_tab = "user";
require_once('base.php');
require("header_admin.php");
include('../connect/db.php');  // Database connection and settings
require_once("../functions.php");

$BaseClassObject = new Base();
//$content = "home.php";
if(!isset($_GET['pid']) && !isset($_POST['update']))
	header('Location:'.$_SERVER['HTTP_REFERER']);
	if(isset($_POST['update']))
	{
		//update data
		if(empty($_POST["enable_paypal"])){
			$_POST["enable_paypal"] = 0;
		}
		if(empty($_POST["enable_advcash"])){
			$_POST["enable_advcash"] = 0;
		}
		
		
		unset($_POST['update']);
		$where = "user_id =".$_POST['user_id'];
		$res = $BaseClassObject->upDateTable('users',$where,$_POST);
		if($res)
		{
			$success = "Record updated successfully.";
		}
		else
		{
			$error = "Can not modify the record.";
		}
	}

$BaseClassObject->loadView($active_tab);
if(isset($_GET['pid']))	
	$where = 'user_id = '.$_GET['pid'];
else	
	$where = "user_id =".$_POST['id'];
$user = $BaseClassObject->getAllData('users',$where);

//echo "<pre>";print_r($user);die();
$country = $user[0]['Country'];
$country_code = $user[0]['country_res'];


//~ $users_paypal_status = $connection->query("select * from users_paypal_status where name='paypal_status'");
//~ $paypal_status = $users_paypal_status->fetch_assoc();
//~ echo $users_paypal_status['status'];exit;


?>

<div class="content-wrapper">        
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
			<div class="box-header"> 
				<span><h1 class="box-title"><b> User Details </b></h1></span>
				<span style="float: right;"><a href="user.php" class="btn btn-primary">Back</a></span>
			</div>
			<?php 
			  if(isset($error))
			  {
			    ?>
			    <div class="alert alert-danger">
			      <?=$error?>
			    </div>
			    <?php
			  }
			?>
			<?php 
			  if(isset($success))
			  {
			    ?>
			    <div class="alert alert-success">
			      <?=$success?>
			    </div>
			    <?php
			  }
			?>
			<div class="box-body ">
			<form class="form-horizontal" action="edit_user.php?pid=<?php echo $_GET['pid'];?>" method="post">
				    
				      <?php
				      	foreach ($user as $key => $value) 
				      	{
		      			?>
				      		
			      	<div class="form-group">
						<label for="name" class="col-xs-2 col-lg-2 col-sm-4">Name</label>
						<div class="col-xs-10 col-lg-10 col-sm-8">
							<input type="text" class="form-control" name="fname" value="<?=$value['fname']?>" required>
							<input type="hidden" class="form-control" name="user_id" value="<?=$value['user_id']?>" required>
						</div>
					</div>
					 <div class="form-group">
						<label for="price" class="col-xs-2 col-lg-2 col-sm-4">Middle name </label>
						<div class="col-xs-10 col-lg-10 col-sm-8">
							<input type="text" class="form-control" name="mname" value="<?php echo isset($value['mname'])?$value['mname']:""?>">
						</div>
					</div>
					 <div class="form-group">
						<label for="text" class="col-xs-2 col-lg-2 col-sm-4">Last Name </label>
						<div class="col-xs-10 col-lg-10 col-sm-8">
							<input type="text" class="form-control" name="lname" value="<?=$value['lname']?>" >
 						</div>
					</div>

					 <div class="form-group">
						<label for="text" class="col-xs-2 col-lg-2 col-sm-4">E-mail</label>
						<div class="col-xs-10 col-lg-10 col-sm-8">
							<input type="text" class="form-control" name="email" value="<?=$value['Email']?>" >
 						</div>
					</div>					
					<div class="form-group">
						<label for="register-password" class="col-xs-2 col-lg-2 col-sm-4">Country of residence</label>						
						<div class="col-xs-10 col-lg-10 col-sm-8">
						<select name="country_res" id="country_res" class="form-control">
						<!--<option value="Select Country">Select Country</option>-->
						<?php
							$location = $country;
							getCountryDropdownWithCodeAdmin($location);
						?>
						</select>
					<input type="hidden" name="country_res" id="cntry_hidden2" value="" />	
					   <input type="hidden" name="Country" id="cntry_hidden" value="<?php echo $country; ?>" />
					   <span class="error" id="Cntryreserror" name="Cntryreserror" ><p></p></span>
					   <span style="display:none;">Your country of residence must match your IP address.</span>
						</div>
					</div>
					 <div class="form-group">
						<label for="register-mobile" class="col-xs-2 col-lg-2 col-sm-4">Mobile </label>
						<div class="col-xs-10 col-lg-10 col-sm-8">
							<input name="mobile_no" class="form-control" onKeyUp="hide_nxt(this);" required onKeyDown="hide_nxt(this);" class="form-control" id="register-mobile" onkeypress="javascript:return isNumberKey(event);"  type="text" placeholder="Enter Mobile Number" value="<?php echo $value['mobile_no'] ?>">
							<span class="error"><p></p></span>
                            <span class="error" id="error1" name="error1"><p></p></span>
 						</div>
					</div>
					
					
					 <div class="form-group">
						<label for="enable_paypal" class="col-xs-2 col-lg-2 col-sm-4">Enable PayPal </label>
						<div class="col-xs-1 col-lg-1 col-sm-1">
							<input type="checkbox" name="enable_paypal" id="enable_paypal" value="1" <?php if(!empty($value['enable_paypal'])) { echo "checked='checked'" ;}?>>
						</div>
						<div class="col-xs-9 col-lg-9 col-sm-7"></div>
					</div>
					<div class="form-group">
						<label for="enable_advcash" class="col-xs-2 col-lg-2 col-sm-4">Enable advcash </label>
						<div class="col-xs-1 col-lg-1 col-sm-1">
							<input type="checkbox" name="enable_advcash" id="enable_advcash" value="1" <?php if(!empty($value['enable_advcash'])) { echo "checked='checked'" ;}?>>
						</div>
						<div class="col-xs-9 col-lg-9 col-sm-7"></div>
					</div>

                           <!--  <p><strong>Mobile number</strong>: <input name="mobile_no" class="form-control" onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" 
                                    id="register-mobile" onkeypress="javascript:return isNumberKey(event);" onChange="unameValidation();CheckCountryCode()" type="text" placeholder="Enter Your Mobile Number" value="<?php echo $mobno ?>" > 
                            <span class="error"><p></p></span>
                            <span class="error" id="error1" name="error1"><p></p></span>
                            <span class="error" id="error2" name="error2"><p></p></span>
                            <span class="error" id="error3" name="error3"><p></p></span>
                            <span class="error" id="error4" name="error4"><p></p></span> 
                            <span class="error" id="Cntryerror" name="Cntryerror" ></span>
                            <div id="mob_errorsuccess" class="errorsuccess" style="display: block;color:Green;"></div>
                            <div id="mob_error" class="error" style="display: block;color:red;"></div>
                            <div id="email_error" class="error" style="display: block;color:red;"></div>
                            </p>	 -->				

<!--                     <div class="form-group">
                     <label for="register-password" class="col-xs-2 col-lg-2 col-sm-4">
                     Password</label>
                       <div class="col-xs-10 col-lg-10 col-sm-8">
                        <a onClick="showpass1()">Show password</a>                         
	                        <input onKeyUp="hide_nxt(this);check_pass(this);" onKeyDown="hide_nxt(this);check_pass(this);" 
	                        class="form-control" id="register-password" type="password" placeholder=""
	                         name="password" autocomplete="off" onChange="dynamicPass();" value="<?php if(isset($_REQUEST['password'])){echo $_REQUEST['password'];}?>">
	                        <span class="error" ><p></p></span>
                        </div>
                    </div>


                    <div class="form-group">
                     <label for="register-password2" class="col-xs-2 col-lg-2 col-sm-4"> Re-enter password</label>
                        <div class="col-xs-10 col-lg-10 col-sm-8">
                            <a onClick="showpass2()">Show password</a>
                            <input onKeyUp="check_pass(this);" onKeyDown="check_pass(this);" class="form-control" 
                            autocomplete="off" id="register-password2" type="password" placeholder="" name="c_password" 
                            value="<?php if(isset($_REQUEST['c_password'])){echo $_REQUEST['c_password'];}?>">
                            <span class="error" name="pwderror" id="pwderror" ><p></p></span>
						</div>                            
                  </div> -->

					<div class="form-group " style="float:right">					
						<div class="col-xs-10 ">
							<span><input onClick="return unameValidation()" type="submit" name="update" class="btn btn-success" value="Save" ></span> 							
						</div>			
					</div>	
				      	<?php }
				      ?>
				</form>		
			</div>
        </div>
      </div>
    </div>
  </section>
</div>
<style type="text/css">
.error{ 
	color: red;
 }
</style>

<script type="text/javascript">
function validatePlus(mbno) {
	//var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  
	//return emailReg.test( email );  
	var res = mbno.substring(0, 1);   
	if(res == '+')  {	
		return true;  
	}  
	return false;
}
function unameValidation() {
	var ee=true;
	if($("#register-mobile").val()=='')
{

  $("#register-mobile").next('.error').children("p").html('Enter your mobile number');
  $("#register-mobile").next('.error').show();
 ee=false;
}
else
{
  $('#register-mobile').next('.error').hide();
  
}
if(!validatePlus($("#register-mobile").val()))
  {

  $("#error1").html('<p>Include country code(always begins with a + sign)</p>');
  $("#error1").show();  
  ee=false;
  }
  else
  {
	$('#error1').hide();
  } 
  
  if ($("#register-mobile").val().indexOf('+'+$("#country_res option:selected").val()) == -1)
{
	$("#register-mobile").next('.error').children("p").html('Country code must match the country selected in "Country of residence" field');
	$("#register-mobile").next('.error').show();
	ee=false;
}
  // if(!Validatephonenumber($("#register-mobile").val()))
  // {
  //   $("#error4").html('<p>Invalid mobile number</p>');
  //   $("#error4").show();
	
  // }
  // else
  // {
  //   $('#error4').hide();
  // }
  
  if(ee){
		r = $("#country_res option:selected").text();
		$('#cntry_hidden').val(r);
		$('#cntry_hidden2').val(r);
		return true;  
	}else{
		return false;
	}
	
}
function hide_nxt(c)
{
  $(c).next('.error').hide();
}   

</script>
<?php
$BaseClassObject->getFooterView();
?>
