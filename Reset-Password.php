<?php 
session_start();
require("header.php");

include('connect/db.php');  // Database connection and settings

error_reporting(E_ALL);
ini_set('display_errors', 1);


if(isset($_POST['btn-reset'])){
$uid=base64_decode(base64_decode($_GET['id']));

$password = trim(mysqli_escape_string($connection,$_POST['password']));
$c_password = trim(mysqli_escape_string($connection,$_POST['c_password']));
$password = md5($password);
$c_password = md5($c_password);


// Generate a unique code:
$hash = md5(uniqid(rand(), true));
$query_create_user = "UPDATE users SET password='".$password."', c_password='".$c_password."' where user_id=".$uid ;


$created_user = mysqli_query($connection,$query_create_user) or die("Error: ".mysqli_error($connection));

if (mysqli_affected_rows($connection) == 1) { //If the Insert Query was successfull.



echo '<div class="alert alert-success">Updated Successful </div>';
} else { // If it did not run OK.
echo '<div class="alert alert-info">You could not be update due to a system
error. We apologize for any
inconvenience.</div>';
die(mysqli_error($connection));
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
						<h1>Reset Password</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="basic-login">					

							<form role="form" action="Reset-Password.php?id=<?php echo $_GET['id']; ?>" onSubmit="return validate();" method="post">
							
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Password</b></label>
									<input onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" id="register-password" type="password" placeholder="Password" name="password">
                                    <span class="error" ><p></p></span>
								</div>
								<div class="form-group">
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Re-enter Password</b></label>
									<input onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="form-control" id="register-password2" type="password" placeholder="Re-Enter Password" name="c_password">
                                    <span class="error" ><p></p></span>
								</div>
								<div class="form-group">
                               
									<button type="submit" onKeyUp="hide_nxt(this);" onKeyDown="hide_nxt(this);" class="btn pull-right" name="btn-reset">Reset</button>
									<div class="clearfix"></div>
								</div>
							</form>
							
							</div>
					</div>
					
				</div>
			</div>
		</div>


<script type="text/javascript">
function validate()
{

	var ee=true;
	
	if($("#register-password").val()=='')
	{
		$("#register-password").next('.error').children("p").html('Password required');
		$("#register-password").next('.error').show();
		ee=false;
	}
	if($("#register-password2").val()=='')
	{
		$("#register-password2").next('.error').children("p").html('Confirm password required');
		$("#register-password2").next('.error').show();
		ee=false;
	}

if(ee==true)	
return true;
else
return false;	
}

function hide_nxt(c)
{
	$(c).next('.error').hide();
}
</script>

<?php require("footer.php");?>