<?php
require("connect/db.php");
require("libraries/helper.php");

require("PHPMailer/class.phpmailer.php");
function generateRandomString($length = 16) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function confirmSupport_mail($emailid, $subj, $ticket_no, $contact_name, $contact_message) {
    $sql="SELECT * FROM site_settings ORDER BY id DESC LIMIT 1";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $logo = $row['logo'];
    $subjct = 'Your support request has been received - [' . $ticket_no . ']:' . $subj;
    $email_tmp = '<html lang="en"><body><table style="width:600px; margin:0 auto; text-align:left; border:1px solid #4f8db3;font-size: 15px;font-family: arial, sans-serif;"><thead style="background:#00a1ff; color:#fff;"><tr><th style="padding: 12px; font-size: 30px;line-height: 21px;"><img src="https://www.reojen.com/img/1811440956_reojen1.png" alt="logo 1"><br></tr></thead><tbody><tr>
      <td style="padding:20px;">
      	<table>
              <tr>
                <td style="padding-bottom: 15px;">Hello ' . $contact_name . ', </td>
              </tr>
              <tr>
                <td style="font-style:italic;padding-bottom: 15px;"> Your ticket has been sent successfully.</strong></td>
              </tr>
              <tr>
                <td style="padding-top: 50px;">
                    <table style="width: 100%;padding-left: 10px;padding-right: 10px;">
                        <tr>
                          <td style="padding-bottom: 15px;padding-top: 15px;font-size: 17px;"><strong><span style="text-transform:uppercase;">Ticket</span></strong></td>
                        </tr>
						<tr>
                          <td style="padding-bottom: 15px;"><strong>Ticket Number: </strong> ' . $ticket_no . '</td>
                        </tr>
						<tr>
                          <td style="padding-bottom: 15px;"><strong>Subject: </strong> ' . $subj . '</td>
                        </tr>
			<tr>
                          <td style="padding-bottom: 15px;"> ' . $contact_message . '</td>
                        </tr>
                  </table>
                </td>
              </tr>
        </table>
      </td>
    </tr><tr><td style="background:#ffa124; color:#fff; padding:10px;" align="center">Copyright &copy; ' . date('Y') . ' Reojen Co. All rights reserved.</td></tr></tbody></table></body></html>';

    $to = $emailid;
    $mail = new PHPMailer; // Enable verbose debug output
    $mail->isSMTP();     // Set mailer to use SMTP
    $mail->SMTPDebug = 0;
    //$mail->CharSet="iso-8859-1";
    $mail->SMTPAuth = true;  // enable SMTP authentication
    if(config("smtp_security")){
		$mail->SMTPSecure 	= config("smtp_security"); 
	}
	
    $mail->Host = config("smtp_host"); // change host detail as per requirement
    $mail->Port = config("smtp_port");                 // set the SMTP port for the GMAIL server
    $mail->Username = config("smtp_user");               //   set username(Email)   
    $mail->Password = config("smtp_password");           //   set password
    $mail->setFrom(config("mail_from"), config("mail_from_name"));
    $mail->addAddress($to, $contact_name);
    $mail->Subject = $subjct;
    $mail->msgHTML($email_tmp);
    if (!$mail->send()) {
        echo 'Message was not sent.';
        echo 'Mailer error: ' . $mail->ErrorInfo;
        exit;
    } else {
        echo 'Message has been sent.';
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $connection;
    $contact_name = trim($_POST['log_name']);
    $contact_email = trim($_POST['log_email']); 
    $contact_country = trim($_POST['log_country']);
    $contact_mobile = trim($_POST['log_mobile']);
    $contact_subject = trim($_POST['log_subject']);
    $contact_message = trim($_POST['log_message']);

$sql="SELECT * FROM site_settings ORDER BY id DESC LIMIT 1";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $logo = $row['logo'];
 
    if (strpos($_SERVER['HTTP_REFERER'], "insupport.php") === false) {
		$country = $connection->query("select name from countrycode where code='" . $contact_country . "'");
		$country_name = $country->fetch_assoc();
		if(!empty($country_name)){
			$contact_country = $country_name['name'];
		}else {
			$country = $connection->query("select name from countrycode where name='" . $contact_country . "'");
			$country_name = $country->fetch_assoc();
			$contact_country = $country_name['name'];
		}
     }


    $mail = new PHPMailer();
    $mail->IsSMTP(); 
    $mail->SMTPDebug = 0; 
    $mail->SMTPAuth = true;  
    $mail->Host = config("smtp_host"); // change host detail as per requirement
    $mail->Port = config("smtp_port");                 // set the SMTP port for the GMAIL server
    $mail->Username = config("smtp_user");               //   set username(Email)   
    $mail->Password = config("smtp_password");             //   set password
   // $mail->setFrom($contact_email, $contact_name); 
	$mail->setFrom(config("mail_from"), config("mail_from_name"));
    $random_no = generateRandomString(16);

    $support_email = "support@reojen.com";  
	$mail->addAddress($support_email);
	//$mail->addAddress('vinaychauhan191@yopmail.com');
    $email_subject = '[' . $random_no . '] : ' . $contact_subject;
    $mail->Subject = $email_subject;
    $email_template = '<html lang="en"><body><table style="width:600px; margin:0 auto; text-align:left; border:1px solid #4f8db3;font-size: 15px;font-family: arial, sans-serif;"><thead style="background:#00a1ff; color:#fff;"><tr><th style="padding: 12px; font-size: 30px;line-height: 21px;"><img src="https://www.reojen.com/img/1811440956_reojen1.png" alt="logo"><br></tr></thead><tbody><tr>
      <td style="padding:20px;">
      	<table>
              <tr>
                <td style="padding-bottom: 15px;">Hi Admin, </td>
              </tr>
              <tr>
                <td style="font-style:italic;padding-bottom: 15px;"> A new ticket has been received.</strong></td>
              </tr>
              
              <tr>
                <td style="padding-top: 50px;">
                    <table style="width: 100%;padding-left: 10px;padding-right: 10px;">
                        <tr>
                          <td style="padding-bottom: 15px;padding-top: 15px;font-size: 17px;"><strong><span style="text-transform:uppercase;">Ticket</span> #' . $random_no . '</strong></td>
                        </tr>
						<tr>
                          <td style="padding-bottom: 15px;"><strong>Name: </strong> ' . $contact_name . '</td>
                        </tr>
						<tr>
                          <td style="padding-bottom: 15px;"><strong>Country: </strong> ' . $contact_country . '</td>
                        </tr>
						<tr>
                          <td style="padding-bottom: 15px;"><strong>Mobile number: </strong> ' . $contact_mobile . '</td>
                        </tr>
						<tr>
                          <td style="padding-bottom: 15px;"><strong>Email: </strong> ' . $contact_email . '</td>
                        </tr>
                        <tr>
                          <td style="padding-bottom: 15px;"><strong>Subject: </strong> ' . $contact_subject . '</td>
                        </tr>
                        <tr>
                          <td style="padding-bottom: 15px;"><strong>Message:</strong></td>
                        </tr>
                        <tr>
                          <td style="padding-bottom: 15px;">' . $contact_message . '</td>
                        </tr>
                  </table>
                </td>
              </tr>
        </table>
      </td>
    </tr><tr><td style="background:#ffa124; color:#fff; padding:10px;" align="center">Copyright &copy; ' . date('Y') . ' Reojen Co. All rights reserved.</td></tr></tbody></table></body></html>';
    $mail->msgHTML($email_template);
    

    if (file_exists($_FILES['file']['tmp_name'][0]) || is_uploaded_file($_FILES['file']['tmp_name'][0])) {
        $target_path = "uploads/";
        $success = true;
        $allowedTypes = array('jpg', 'jpeg', 'pdf', 'png', 'gif', 'bmp','JPG','JPEG','PDF','PNG','GIF','BMP');
        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $error = $_FILES['file']['error'][$i];
            $ext = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
            if ($error != '4') {
                if (!in_array($ext, $allowedTypes)) {
                    $success = true;
                }
                //10485760 for 10MB
                if ($_FILES['file']['size'][$i] > 5000000) {
                    $success = true;
                }

                if ($success) {
                    $target_path = $target_path . md5(uniqid()) . "." . $ext;
                    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
                        $mail->AddAttachment($target_path);
                    }
                }
            }
        }
    }
	// echo '<pre>';
	// print_r($mail);
	// echo '-----------------------------------------------------';
	// print_r($mail->Send());
	// die;
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Successfully";
        confirmSupport_mail($contact_email, $contact_subject, $random_no, $contact_name, $contact_message);
    }
}
?>
