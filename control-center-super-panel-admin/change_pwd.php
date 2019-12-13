<?php
$active_tab = "change_pwd";
require_once('base.php');
$BaseClassObject = new Base();
//$content = "home.php";
// if( !isset($_POST['update']))
// 	header('Location:'.$_SERVER['HTTP_REFERER']);

	if(isset($_POST['update']))
	{
		//update data
		$where = "user_id =".$_SESSION['user_id'];

	    $query = 'UPDATE users SET password="'.md5(trim($_POST['password'])).'" , c_password= "'.md5(trim($_POST['password'])).'"
	     where '.$where;
	    $res = mysqli_query($connection,$query) or die("Error: ".mysqli_error($connection));
		if($res)
		{
			$success = "Record updated successfully.";
		}
		else
		{
			$error = "Can not modify the record.";
		}	 
		unset($_POST['update']);
	}

$BaseClassObject->loadView($active_tab);
$where = "user_id = 12" ;
$user = $BaseClassObject->getAllData('users',$where);
?>

<div class="content-wrapper">        
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
			<div class="box-header"> 
				<span><h1 class="box-title"><b> Change Password </b></h1></span>
				<span style="float: right;"><a href="change_pwd.php" class="btn btn-primary">Back</a></span>
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
			<form class="form-horizontal" action="change_pwd.php" method="post">
				    
				      <?php
				      	foreach ($user as $key => $value) 
				      	{
		      			?>
				      		 

                    <div class="form-group">
                     <label for="register-password" class="col-xs-2 col-lg-2 col-sm-4">
                     Password</label>
                       <div class="col-xs-10 col-lg-10 col-sm-8">
                        <a onClick="showpass1()">Show password</a>                         
	                        <input onKeyUp="hide_nxt(this);check_pass(this);" onKeyDown="hide_nxt(this);check_pass(this);" 
	                        class="form-control" id="register-password" type="password" placeholder="Enter password" required=""
	                         name="password" autocomplete="off" onChange="dynamicPass();" value="">
	                        <span class="error" ><p></p></span>
                        </div>
                    </div>


                    <div class="form-group">
                     <label for="register-password2" class="col-xs-2 col-lg-2 col-sm-4"> Re-enter password</label>
                        <div class="col-xs-10 col-lg-10 col-sm-8">
                            <a onClick="showpass2()">Show password</a>
                            <input onKeyUp="check_pass(this);" onKeyDown="check_pass(this);" required="" class="form-control" 
                            autocomplete="off" id="register-password2" type="password" placeholder="Confirm password" name="c_password" 
                            value="">
                            <span class="error" name="pwderror" id="pwderror" ><p></p></span>
						</div>
                  </div>

					<div class="form-group " style="float:right">					
						<div class="col-xs-10 ">
							<span><input type="submit" name="update" class="btn btn-success" value="Save" ></span> 	
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
function hide_nxt(c)
{
  $(c).next('.error').hide();
}

function check_pass(c)
{
  $(c).next('.error').hide();
  $("#register-password2").next('.error').hide();
  if($("#register-password").val()!="" && $("#register-password2").val()!="")
  { 
  if($("#register-password").val()!=$("#register-password2").val())
  {
  
    ee=false;
  
    //$("#register-password").val("");
    //$("#register-password2").val("");
    $("#register-password2").next('.error').children("p").html("Your passwords don't match");
    $("#register-password2").next('.error').show();
  }
  }
  
}
function showpass1()
{
  if($("#register-password").attr('type')=="text")
  {
    $("#register-password").attr('type', 'password');
    $("#register-password2").attr('type', 'password');
    
  }
  else
  {
    $("#register-password").attr('type', 'text');
    $("#register-password2").attr('type', 'text');
  }
}

function showpass2()
{
  if($("#register-password2").attr('type')=="text")
  {
    $("#register-password").attr('type', 'password');
    $("#register-password2").attr('type', 'password');
  }
  else
  {
    $("#register-password").attr('type', 'text');
    $("#register-password2").attr('type', 'text');
  }
}

function Validatepass(pass) {
   /*var passReg1 = /^(?=.*\d)(?=.*[a-z])[a-z0-9]{8,}$/;
   var passReg2 = /^(?=.*\d)(?=.*[A-Z])[A-Z0-9]{8,}$/;
   var passReg3 = /^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{8,}$/;
   var passReg4 =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
   */
   var passReg1 = /^(?=.*\w)(?=.*[a-z])[a-z0-9]{8,}$/;
   var passReg2 = /^(?=.*\d)(?=.*[A-Z])[A-Z0-9]{8,}$/;
   var passReg3 = /^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{8,}$/;
   var passReg4 =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
   
   if(!(passReg1.test( pass )) && !(passReg2.test( pass )) && !(passReg3.test( pass )) && !(passReg4.test( pass )))   
   return false;
   else return true;
  /*/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;*/
}


function dynamicPass()
{
  if(!Validatepass($("#register-password").val()))
    {

      $("#register-password").next('.error').children("p").html('<small>Your password must contains a minimum of 8 characters and must contain at least two of the following: upper case letter(s), lower case letter(s), number(s)</small>');
      $("#register-password").next('.error').show();
      ee=false;

      }
}


</script>
<?php
	$BaseClassObject->getFooterView();
?>