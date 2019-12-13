<?php

require("../connect/db.php");

global $connection;

require_once('base.php');

require("../libraries/helper_admin.php");

$BaseClassObject = new Base();

if(isset($_POST["save_settings"]))
{
	$config		=	(isset($_POST["config"]))?$_POST["config"]:[];
	if(count($config) > 0)
	{
		$data	=	[];
		$settings		=	config();
		foreach($config as $key=>$val)
		{
			if(array_key_exists($key,$settings))
			{
				$data	=	[
					"setting_name"	=>	$key,
					"setting_value"	=>	$val
				];
				$BaseClassObject->upDateTable("app_settings","setting_name='".$key."'",$data);	
			}else{
				$data	=	[
					"setting_name"	=>	$key,
					"setting_value"	=>	$val
				];
				$BaseClassObject->insertData("app_settings", $data,"setting_name,setting_value");
			}
		}
		$_SESSION["notification.settings"]	=	"Settings have been saved successfully";
		header("Location:".$_SERVER["HTTP_ORIGIN"].$_SERVER["PHP_SELF"]);exit(0);
	}
}
$active_tab = "settings";


$BaseClassObject->loadView($active_tab);


?>
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<?php if(isset($_SESSION["notification.settings"]) && !empty($_SESSION["notification.settings"])):?>
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $_SESSION["notification.settings"];$_SESSION["notification.settings"]="";?>
				</div>
				<?php endif;?>
				<div class="box">
					<form name="settings" method="post" action="">
						<div class="box-header">
							<span><h1 class="box-title"><b> Settings </b></h1></span>
							<span class="pull-right">
								<button type="submit" name="save_settings" class="btn btn-primary btn-sm">
									<i class="fa fa-save"></i>	Save Settings
								</button>
							</span>
						</div>
						<div class="box-body">
							<ul class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#emails">
										Email Settings
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#payments">
										Payment Gateways
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#support">
										Support Message
									</a>
								</li>
							</ul>
							<div class="clearfix"></div></br>
							<div class="tab-content">
								<div id="emails" class="tab-pane fade in active">
									<div class="col-md-4">
										<div class="form-group">
											<label for="mail_from">Mail From</label>
											<input type="email"name="config[mail_from]" class="form-control" id="mail_from" value="<?php echo config("mail_from");?>">
										</div>
										<div class="form-group">
											<label for="mail_from_name">From Name</label>
											<input type="text" name="config[mail_from_name]" class="form-control" id="mail_from_name" value="<?php echo config("mail_from_name");?>">
										</div>
										<div class="form-group">
											<label for="smtp_host">SMTP Host</label>
											<input type="text" name="config[smtp_host]" class="form-control" id="smtp_host" value="<?php echo config("smtp_host");?>">
										</div>
										<div class="form-group">
											<label for="smtp_port">SMTP Port</label>
											<input type="text" name="config[smtp_port]" class="form-control" id="smtp_port" value="<?php echo config("smtp_port");?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="smtp_user">SMTP User</label>
											<input type="text" name="config[smtp_user]" class="form-control" id="smtp_user" value="<?php echo config("smtp_user");?>">
										</div>
										<div class="form-group">
											<label for="smtp_password">SMTP Password</label>
											<input type="password" name="config[smtp_password]" class="form-control" id="smtp_password" value="<?php echo config("smtp_password");?>">
										</div>
										<div class="form-group">
											<label for="smtp_security">SMTP Security</label>
											<select name="config[smtp_security]" id="smtp_security" class="form-control">
												<option value="">NONE</option>
												<option value="tls" <?php echo (config("smtp_security") == "tls")?"selected='selected'":"";?>>tls</option>
												<option value="ssl" <?php echo (config("smtp_security") == "ssl")?"selected='selected'":"";?>>ssl</option>
											</select>
										</div>
									</div>
								</div>
								<div id="payments" class="tab-pane fade in">
									<div class="col-md-12">
										<div class="form-group">
											<label for="paypal_client_id">Paypal Client ID</label>
											<input type="text"name="config[paypal_client_id]" class="form-control" id="paypal_client_id" value="<?php echo config("paypal_client_id");?>">
										</div>
										<div class="form-group">
											<label for="paypal_secret_key">Paypal Secret Key</label>
											<input type="text" name="config[paypal_secret_key]" class="form-control" id="paypal_secret_key" value="<?php echo config("paypal_secret_key");?>">
										</div>
										<div class="form-group">
											<label for="advcash_api_name">AdvCash Api Name</label>
											<input type="text"name="config[advcash_api_name]" class="form-control" id="advcash_api_name" value="<?php echo config("advcash_api_name");?>">
										</div>
										<div class="form-group">
											<label for="advcash_account_email">AdvCash Account Email</label>
											<input type="text" name="config[advcash_account_email]" class="form-control" id="advcash_account_email" value="<?php echo config("advcash_account_email");?>">
										</div>
										<div class="form-group">
											<label for="advcash_api_password">AdvCash Api Password</label>
											<input type="text"name="config[advcash_api_password]" class="form-control" id="advcash_api_password" value="<?php echo config("advcash_api_password");?>">
										</div>
										
										
										<div class="form-group">
											<label for="pay_to_email">Skrill Payment Accept Email ID</label>
											<input type="text" name="config[pay_to_email]" class="form-control" id="pay_to_email" value="<?php echo config("pay_to_email");?>">
										</div>
										<div class="form-group">
											<label for="skrill_secret_word">Skrill Secret word</label>
											<input type="text" name="config[skrill_secret_word]" class="form-control" id="skrill_secret_word" value="<?php echo config("skrill_secret_word");?>">
										</div>
										<div class="form-group">
											<label for="skrill_merchant_id">Skrill Merchant ID</label>
											<input type="text" name="config[skrill_merchant_id]" class="form-control" id="skrill_merchant_id" value="<?php echo config("skrill_merchant_id");?>">
										</div>
										
										<div class="form-group">
											<label for="skrill_mqi_password">Skrill API/MQI password</label>
											<input type="text" name="config[skrill_mqi_password]" class="form-control" id="skrill_mqi_password" value="<?php echo config("skrill_mqi_password");?>">
										</div>
										
										<div class="form-group">
											<label for="skrill_notify_email">Deposit funds with Skrill payment Email(AdvCash)</label>
											<input type="text" name="config[skrill_notify_email]" class="form-control" id="skrill_notify_email" value="<?php echo config("skrill_notify_email");?>">
										</div>
										
									</div>
									
								</div>
								<div id="support" class="tab-pane fade in">
									<div class="col-md-12">
										<div class="form-group">
											<label for="support_message_status">Support message status</label>
											<select name="config[support_message_status]" id="support_message_status" class="form-control">
												<option value="1" <?php echo (config("support_message_status") == "1")?"selected='selected'":"";?>>Enable</option>
												<option value="0" <?php echo (config("support_message_status") == "0")?"selected='selected'":"";?>>Disable</option>
											</select>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

    <!-- Modal -->
<?php

$BaseClassObject->getFooterView();

?>
