<?php

	session_start();
	require_once("libraries/helper.php");
	if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name'])) {
		header('location:login.php');
	}
	include('connect/db.php');  // Database connection and settings
	$skrillemail = $connection->query("SELECT * FROM app_settings WHERE id ='40' LIMIT 1")->fetch_assoc();
	$skrillpaytoemail = (string)trim($skrillemail['setting_value']); // get admin email for get payments
	if(empty($skrillpaytoemail)){
		die('Sorry, Some technical issue to process your payment !');
	}	
	class SkrillGateway {
		private $url;
		private $parameters = array('prepare_only'=>1);

		public function __construct($url) {
				$this->url = $url;
		}
		public function setPay_to_email($pay_to_email) {
			$this->parameters['pay_to_email']  = $pay_to_email;
		}
		public function setAmount($amount) {
			$this->parameters['amount']  = $amount;
		}
		public function setCurrency($currency) {
			$this->parameters['currency']  = $currency;
		}
		public function setTransaction_id($transaction_id) {
			$this->parameters['transaction_id']  = $transaction_id;
		}
		public function setRecipient_description($recipient_description) {
			$this->parameters['recipient_description']  = $recipient_description;
		}
		public function setLogo_url($logo_url) {
			$this->parameters['logo_url']  = $logo_url;
		}
		public function setStatus_url($status_url) {
			$this->parameters['status_url']  = $status_url;
		}
		public function setStatus_url2($status_url2) {
			$this->parameters['status_url2']  = $status_url2;
		}
		public function setCancel_url($cancel_url) {
			$this->parameters['cancel_url']  = $cancel_url;
		}
		public function setDetail1_description($detail1_description) {
			$this->parameters['detail1_description']  = $detail1_description;
		}
		public function setDetail1_text($detail1_text) {
			$this->parameters['detail1_text']  = $detail1_text;
		}
		public function setDetail2_description($detail2_description) {
			$this->parameters['detail2_description']  = $detail2_description;
		}
		public function setDetail2_text($detail2_text) {
			$this->parameters['detail2_text']  = $detail2_text;
		}
		public function setMerchant_fields(Array $merchant_fields) {
			$fields = "";
			foreach ($merchant_fields as $key => $value) {
				$fields .= $key . ",";
				$this->parameters[$key] = $value;
			}
			$this->parameters['merchant_fields'] = $fields;

		}
		public function setPayment_Methods($methods)
		{
			$this->parameters['payment_methods']  = $methods;
		}

		//Customer Details
		
		
		public function setPay_from_email($pay_from_email) {
			$this->parameters['pay_from_email'] = $pay_from_email;
		}
		public function setFirstName($firstname) {
			$this->parameters['firstname'] = $firstname;
		}
		public function setLastName($lastname) {
			$this->parameters['lastname'] = $lastname;
		}
		public function setLanguage($language) {
			$this->parameters['language'] = $language;
		}
		public function setCountry($country) {
			$this->parameters['country'] = $country;
		}

		 public function setReturnUrl($return_url)
		{
			$this->parameters['return_url'] = $return_url;

			return $this;
		}

		public function getRedirectUrl()
		{
			$response = $this->post($this->parameters);
			
			$matches = array();

			$redirect_sid = preg_match( '/([0-9a-f]{32})/im', $response, $matches);
				
			if (sizeof($matches) == 0) {
				//throw new Exception("Sid not generated, response:". $response);
				die("Sid not generated, response:". $response);
			} 
		
			$redirect_url = $this->url."?sid=".$matches[1];
			
			return $redirect_url;
		}

		public function post($body) {
			$body_query = http_build_query($body);
			$cpt = curl_init();
			curl_setopt($cpt, CURLOPT_URL, $this->url);
			curl_setopt($cpt, CURLOPT_POST, true);
			curl_setopt($cpt, CURLOPT_POSTFIELDS, $body_query);
			curl_setopt($cpt, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($cpt, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($cpt, CURLOPT_SSL_VERIFYHOST, 0);

			$result = curl_exec($cpt);
		
			curl_close($cpt);
			return $result;
		}
	}


	//=== CONFIGURATION GOES HERE
	$SkrillGateway = new SkrillGateway('https://pay.skrill.com');
	$SkrillGateway->setPay_to_email($skrillpaytoemail);
	$payable_ammount = $_POST['amount'];
	$SkrillGateway->setAmount($payable_ammount);
	
	
	$SkrillGateway->setMerchant_fields(
										[
											'web_user_id'=> $_SESSION["user_id"]
										]
									);
	
	$SkrillGateway->setCurrency($_SESSION['set_vk_currency']);
	//$SkrillGateway->setRecipient_description("Skrill");
	//$SkrillGateway->setTransaction_id('unique_trn_id');
	$SkrillGateway->setCancel_url("https://www.reojen.com/skrill-payment-cancel.php");
	$SkrillGateway->setStatus_url("https://www.reojen.com/status_urle096add3993b3973ea245fa23d110701.php");
	
	
	// $skrillnotifyemail = $connection->query("SELECT * FROM app_settings WHERE id ='43' LIMIT 1")->fetch_assoc();
	// $notifyemail = (string)trim($skrillnotifyemail['setting_value']); // get admin email for get payments
	
	
	// if(isset($notifyemail) && !empty($notifyemail)){
		// $SkrillGateway->setStatus_url2($notifyemail);
	// }	
	
	
	$SkrillGateway->setReturnUrl('https://www.reojen.com/skrill-payment-success.php');
	$SkrillGateway->setLogo_url("https://www.reojen.com/uploads/5ddf2cb4182ba20aa268d41b29f44e7e.png");
	//$SkrillGateway->setPayment_Methods('WLT,PSC');
	$SkrillGateway->setLanguage('EN');	
	$SkrillGateway->setCountry($_SESSION['set_vk_country']);
	$url = $SkrillGateway->getRedirectUrl();
	//echo '<pre>';print_r($_SESSION['email']);die;
	
	
	echo '<script>window.location.href = "' . $url . '";</script>';
	//echo '<div style="width:500px;padding:0;margin:auto;"><iframe src="'. $url. '" style="width:500;height:700;border: none;"></iframe></div>'; 