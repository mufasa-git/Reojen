<?php
require_once('connect/db.php');
require_once 'query.php';
require_once 'amal-functions.php';

function getCountryDropdownWithoutCode()
{
    global $connection;
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        $location= json_decode(file_get_contents('http://ip-api.com/json/'.$_SERVER['HTTP_X_FORWARDED_FOR']));
    else
        $location= json_decode( file_get_contents('http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR']) );


    $sql="SELECT Code,Country FROM countrycode";
    $result=mysqli_query($connection,$sql);

    while ($row = mysqli_fetch_assoc($result))
    {
    if(isset($_REQUEST['country']))
        $ss=($row['Code']==$_REQUEST['country'])?'selected':'';
    else
        $ss='';
    if($ss=="")
    {
        $ss=($row['Country']==$location->country)? 'selected':'';
    }
            echo "<option value='".$row['Code']."' $ss >" . $row['Country']  ."</option>";
    }
}

function getCountryDropdownWithCode()
{
    global $connection;
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        $location= json_decode(file_get_contents('http://ip-api.com/json/'.$_SERVER['HTTP_X_FORWARDED_FOR']));
    else
        $location= json_decode( file_get_contents('http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR']) );


    $sql="SELECT Code,Country FROM countrycode";
    $result=mysqli_query($connection,$sql);

    while ($row = mysqli_fetch_assoc($result))
    {
    if(isset($_REQUEST['country']))
        $ss=($row['Code']==$_REQUEST['country'])?'selected':'';
    else
        $ss='';
    if($ss=="")
    {
        $ss=($row['Country']==$location->country)? 'selected':'';
    }
            echo "<option value='".$row['Country']."' $ss >" . $row['Country']  ."</option>";
    }
}

function getCountryDropdown($location=null)
{
    include('connect/db.php');
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        $location = json_decode(file_get_contents('http://ip-api.com/json/' . $_SERVER['HTTP_X_FORWARDED_FOR']));
    else
        $location = json_decode(file_get_contents('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR']));

    global $connection;
    $sql = "SELECT Code,Country FROM countrycode";
    $result = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if (isset($_REQUEST['country']))
            $ss = ($row['Code'] == $_REQUEST['country']) ? 'selected' : '';
        else
            $ss = '';
        if ($ss == "") {
            $ss = ($row['Country'] == $location->country) ? 'selected' : '';
        }
        echo "<option value='" . $row['Code'] . "' $ss >" . $row['Country'] . " (+" . $row['Code'] . ") </option>";
    }
}

function uploadFile()
{
    if(isset($_POST['submit']))
    {
        $allowedExts = array("gif", "jpeg", "jpg", "png","gif","pdf","bmp");
        $temp = explode(".", $_FILES["wureceipt"]["name"]);
        $extension = end($temp);
        $rand=strtotime(date("Y-m-d H:i:s")).rand(1,10000);
        if (((

                $_FILES["wureceipt"]["type"] == "image/gif")
                || ($_FILES["wureceipt"]["type"] == "image/jpeg")
                || ($_FILES["wureceipt"]["type"] == "image/jpg")
                || ($_FILES["wureceipt"]["type"] == "image/pjpeg")
                || ($_FILES["wureceipt"]["type"] == "image/x-png")
                || ($_FILES["wureceipt"]["type"] == "image/png"))
                || ($_FILES["wureceipt"]["type"] == "application/pdf")
                || ($_FILES["wureceipt"]["type"] == "image/bmp")
                && ($_FILES["wureceipt"]["size"] < (5*1024*1024))
            && in_array($extension, $allowedExts))
        {
            if ($_FILES["wureceipt"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["wureceipt"]["error"] . "<br>";
            }
            else
            {

                if (file_exists("wureceipt/" .$rand. $_FILES["wureceipt"]["name"]))
                {
                    echo $_FILES["wureceipt"]["name"] . " already exists. rename the file please";
                }
                else
                {
                    move_uploaded_file($_FILES["wureceipt"]["tmp_name"],
                        "wureceipt/" .$rand. $_FILES["wureceipt"]["name"]);
                    return $rand. $_FILES["wureceipt"]["name"];

                }
            }
        }
        else
        {
            return false;
        }
    }
}

function successMsgWUAddMoney()
{
    ?>
    <div class="alert alert-success">Thank you, we have received your deposit order. Balance will be credited to your account as soon as we verify your payment. You can see your deposit order status in <a href="deposits.php" >Deposits </a> page. You will also get a confirmation email after payment verification.
    </div>
    <?php
}
function msg($msg)
{
    ?>
    <div class="alert alert-success">
        <?php echo $msg; ?>
    </div>
    <?php
}


function sendMailWUAddMoney($to,$file,$random)
{

    $from_name="Admin";
    $from_mail="no-reply@reojen.com";

    $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    //$to = "nilesh.l@infiny.in"; // this is your Email address

    $first_name= $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $sender_email = $_POST['sender_email'];
    $originating_country = $_POST['originating_country'];
    $amount = $_POST['amount'];
    $mtcn = $_POST['mtcn'];

     $subject = "$random - Western Union - "."$"."$amount  - $first_name $middle_name $last_name - ".getCountryNameById($originating_country);

    $message =  "First Name:".$first_name."\r\n".
                "Middle Name:".$middle_name."\r\n".
                "Last Name:".$last_name."\r\n".
                "Sender Email:".$sender_email."\r\n".
                "Origination Country:".$originating_country."\r\n".
                "Amount:".$amount."\r\n".
                "MTCN".$mtcn."\r\n";



    $content = file_get_contents( $file);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $filename = basename($file);

// header
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

// message & attachment
    $nmessage = "--".$uid."\r\n";
    $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $nmessage .= $message."\r\n\r\n";
    $nmessage .= "--".$uid."\r\n";
    $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $nmessage .= $content."\r\n\r\n";
    $nmessage .= "--".$uid."--";

    if (mail($to, $subject, $nmessage, $header)) {
        return true; // Or do something here
    } else {
        return false;
    }
}

function generateRandomString($length =4 ) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getRandom($id)
{
    $id_len=strlen($id.'');
    $ran=generateRandomString(12-$id_len);
    $random=$ran.$id;
    $random_arr=str_split($random,4);
    $result=implode(" ",$random_arr);
    return $result;
}

function getCountryNameById($country_id)
{
    global $connection;
    $q=mysqli_query($connection,"select name from countrycode where id=".$country_id);
    $result=mysqli_fetch_array($q);
    return isset($result['name'])?$result['name']:'';
}

function isWesternUnionEnabled()
{
    getTransferType();
    $transfer_type_status=$_SESSION['transfer_type_status'];
    foreach($transfer_type_status as $result_row)
    {
        if(isset($result_row['transfer_type_name']) && $result_row['transfer_type_name']=="Western Union Transfer" && $result_row['status']==1)
        {
            return true;
        }
    }
    return false;
}

function getTransferType()
{
    $transfer_type_status = array();
    $sql = "SELECT transfer_type_name, status FROM transfer_types INNER JOIN western_union_status ON transfer_types.id = western_union_status.transfer_type_id";
    $p = mysqli_query($GLOBALS['connection'], $sql);
    while ($data = mysqli_fetch_array($p, MYSQLI_ASSOC)) {
        $transfer_type_status[] = $data;
    }
    $_SESSION['transfer_type_status'] = $transfer_type_status;
}

function isLoggedIn()
{
    return isset($_SESSION['mob_id']) || isset($_SESSION['user_name']);
}

function sendMailWireTransfer($to,$random)
{
    $from_name="Admin";
    $from_mail="no-reply@reojen.com";

    $first_name= @$_SESSION['first_form']['first_name'];
    $last_name = @$_SESSION['last_name'];
    $sender_email = @$_SESSION['email'];
    $originating_country = @$_SESSION['country_id'];
    $amount = @$_SESSION['amount'];

    $subject = "$random - Wire Transfer - "."$"."$amount  - $first_name $last_name - ".getCountryNameById($originating_country);

    $message =  "First Name:".$first_name."\r\n".
        "Last Name:".$last_name."\r\n".
        "Sender Email:".$sender_email."\r\n".
        "Originating country of the transfer:".getCountryNameById($originating_country)."\r\n".
        "Amount:".$amount."\r\n";

    if (mail($to, $subject, $message)) {
        return true; // Or do something here
    } else {
        return false;
    }
}

function select($page_name,$real_name)
{
    if($page_name==$real_name)
    {
        echo " class='active' ";
    }
}

function signup_mail($userid,$userpass){
	
	//require_once "PHPMailer/PHPMailerAutoload.php";
	
	require("PHPMailer/class.phpmailer.php");
	
	global $connection,$data,$mail;
	
	if($connection){
	$userdata = $connection->query("select * from users where user_id='".$userid."'");	
	
		if($userdata->num_rows > 0){	
			while($row = $userdata->fetch_assoc()){
				$data = $row;
				
			}
			
			$from_name = "Admin";
			$from_mail = "support@reojen.com"; //add from email address 
			
			$first_name = $data['fname'];
			$middle_name = $data['mname'];
			$last_name = $data['lname'];
			$mob_numb = $data['mobile_no'];
			//$email = $data['mobile_no'];
			
			$subject = "confirmation mail from REOJEN";
			
			$message = "First Name:".$first_name."\r\n".
					"Middle Name:".$middle_name."\r\n".
					"Last Name:".$last_name."\r\n".
					"Mobile Number:".$mob_numb."\r\n".
					"Password:".$userpass."\r\n".
					"Your account has been created successfully";
			
			$to = "xxxxxxxxxx";
			
			
			$mail = new PHPMailer;
			
			
			                              // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->SMTPDebug = 2; 
			//$mail->CharSet="iso-8859-1";
			$mail->Host = 'smtp.1and1.com';                      // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'xxxxxxxxxxxxxxxxxx';                    // SMTP username(email)
			$mail->Password = 'xxxxxx';                           // SMTP password
			//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587; 
					
					
			$mail->setFrom('xxxxxxxxxxxxxxx', $from_name);
			$mail->addAddress($from_mail, $first_name.''.$last_name);
			$mail->Subject  = $subject;
			$mail->Body     = $message;
			if(!$mail->send()) {
				echo 'Message was not sent.';
				echo 'Mailer error: ' . $mail->ErrorInfo;
				exit;
			} else {
				/*echo 'Message has been sent.';
				exit;*/
			}
		}
	}else{
		print "not connected"; exit;
	}
}
function getCountryDropdownWithCodeAdmin($country){    global $connection;    if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']))        $location= json_decode(file_get_contents('http://ip-api.com/json/'.$_SERVER['HTTP_X_FORWARDED_FOR']));    else        $location= json_decode( file_get_contents('http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR']) );    $sql="SELECT Code,Country FROM countrycode";    $result=mysqli_query($connection,$sql);    while ($row = mysqli_fetch_assoc($result))    {    $ss='';    if($country==$row['Country']){        $ss='selected';    }            echo "<option value='".$row['Code']."' $ss >" . $row['Country']  ."</option>";    }}






