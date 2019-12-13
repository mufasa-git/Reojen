<?php
$active_tab = "user";
require_once('base.php');
require("header_admin.php");
include('../connect/db.php');  // Database connection and settings
require_once("../functions.php");

$BaseClassObject = new Base();
//$content = "home.php";
//if(!isset($_GET['pid']) && !isset($_POST['update']))
//	header('Location:'.$_SERVER['HTTP_REFERER']);
	if(isset($_POST['update']))
	{
	  $pid = $_POST['pid'];
          $amount = $_POST['amount'];
          $status = $_POST['status'];
	$query_create_site_setting = 'UPDATE app_payment_transactions SET amount="'.$amount.'", status="'.$status.'" WHERE id="'.$pid.'"';
        $querys= mysqli_query($connection,$query_create_site_setting);
		if($querys)
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
	$where = 'id = '.$_GET['pid'];
else	
	$where = "id =".$_POST['id'];
$user = $BaseClassObject->getAllData('app_payment_transactions',$where);

//echo "<pre>";print_r($user);die();
$id = $user[0]['id'];
$amount = $user[0]['amount'];
$status = $user[0]['status'];
?>

<div class="content-wrapper">        
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
			<div class="box-header"> 
				<span><h1 class="box-title"><b> User Payment Details</b></h1></span>
                                <span style="float: right;"><a href="user_payment.php" class="btn btn-primary">Back</a></span>
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
			<form class="form-horizontal" action="user_payment_edit.php?pid=<?php echo $id;?>" method="post">
			<input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>">	    
				      				      		
			      	<div class="form-group">
						<label for="name" class="col-xs-2 col-lg-2 col-sm-4">Amount</label>
						<div class="col-xs-10 col-lg-10 col-sm-8">
							<input type="text" class="form-control" name="amount" value="<?php echo $amount;?>" required="">
							
						</div>
					</div>
					 <div class="form-group">
						<label for="price" class="col-xs-2 col-lg-2 col-sm-4">Status </label>
						<div class="col-xs-10 col-lg-10 col-sm-8">
							<select name="status" id="status" class="form-control">
                                                                <option value="approved"<?php if($status=='approved'){echo 'selected';}?>>Approved</option>
								<option value="created" <?php if($status=='created'){echo 'selected';}?>>Created</option>
							</select>
						</div>
					</div>
					
					<div class="form-group " style="float:right">					
						<div class="col-xs-10 ">
							<span><input onclick="return unameValidation()" type="submit" name="update" class="btn btn-success" value="Save"></span> 							
						</div>			
					</div>	
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