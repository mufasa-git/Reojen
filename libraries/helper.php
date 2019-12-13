<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once("query.php");
global $query;
$query	=	new QueryFire;
global $connection;
if(!function_exists("wallet"))
{
	function wallet($user_id = null)
	{
		global $connection;
		if(empty($user_id))
		{
			$balanceAmount	=	$connection->query('SELECT SUM(amount) AS amount FROM app_payment_transactions WHERE user_id='.$_SESSION["user_id"]." AND status='approved'")->fetch_assoc();
		}else{
			$balanceAmount	=	$connection->query('SELECT SUM(amount) AS amount FROM app_payment_transactions WHERE user_id='.$user_id." AND status='approved'")->fetch_assoc();
		}
		if($balanceAmount){	
			$balanceAmount	=	$balanceAmount["amount"];
		}else{	
			$balanceAmount = 0;
		}
		return number_format($balanceAmount,2,".",",");
	}
	
	function config($setting = null)
	{		
		global $connection;
		if(!empty($setting))
		{
			$config	=	$connection->query('SELECT setting_value FROM app_settings WHERE setting_name="'.$setting.'"')->fetch_assoc();
			if($config)
			{
				return $config["setting_value"];
			}else{
				return NULL;
			}
		}else{
			global $query;
			$config	=	$query->getAllData("app_settings","");
			if($config)
			{
				foreach($config as $key=>$val)
				{
					$config[$val["setting_name"]] = $val["setting_value"];
					unset($config[$key]);
				}
				return $config;
			}else{
				return [];
			}
		}
	}
}