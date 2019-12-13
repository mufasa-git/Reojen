<?php
require("libraries/helper.php");

require("PHPMailer/class.phpmailer.php");
$sql="SELECT * FROM site_settings ORDER BY id DESC LIMIT 1";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $name = $row['name'];
 $logo = $row['logo'];
 $favicon = $row['favicon'];
 
	if(isset($_POST['mobile_no']))
	{
		$mbno=$_POST['mobile_no'];
		include("connect/db.php"); //Establishing connection with our database
		$query_verify_email = "SELECT * FROM users WHERE mobile_no ='$mbno'";
		$verified_email = mysqli_query($connection,$query_verify_email) or die("Error: ".mysqli_error($connection));
		if(mysqli_num_rows($verified_email) >0) 
		{
			$row=mysqli_fetch_array($verified_email,MYSQLI_ASSOC);
			echo $row['SecurituyQuestion1'].','. $row['Answer1'] .','. $row['SecurityQuestion2'] .','. $row['Answer2'].','.$row['Email'];
                if($row['Email']){
					$reset_password_key = md5($row['user_id']."!@#$%^".time());
					$resetSql="UPDATE users SET pass_resetkey='".$reset_password_key."' where mobile_no='".$row['mobile_no']."'";
					$resetResult=mysqli_query($connection,$resetSql);
					confirmSupport_mail($row['Email'],$row['fname'],$logo,$reset_password_key);
                }
                        
		}
		else
		{
			echo 'Invalid';
		}
	}
	else
	{
		echo 'Invalid mobile number';
	}
        
    function confirmSupport_mail($emailid,$fname,$logo,$reset_password_key) {
//        $emailid, $subj, $ticket_no, $contact_name, $contact_message
    $subjct = 'Reset your Reojen password';
    $email_tmp = '<html lang="en"><body><table style="width:600px; margin:0 auto; text-align:left; border:1px solid #4f8db3;font-size: 15px;font-family: arial, sans-serif;"><thead style="background:#00a1ff; color:#fff;"><tr><th style="padding: 12px; font-size: 30px;line-height: 21px;"><img src="https://www.reojen.com/uploads/'.$logo.'" alt="logo 1"><br></tr></thead><tbody><tr>
      <td style="padding:20px;">
      	<table>
              <tr>
                <td style="padding-bottom: 15px;">Hello ' . $fname . ', </td>
              </tr>
             
              <tr>
                <td style="padding-top: 50px;">
                    <table style="padding-left: 10px;padding-right: 10px;">
                        
						<tr>
                          <td style="padding-bottom: 15px;"><strong>Please click on below link for reset your Reojen account password: </strong> </td>
                        </tr>
			<tr>
                          <td style="padding-bottom: 15px;">  <a href="https://www.reojen.com/forgotpasswords.php?key='.$reset_password_key.'">Click Here</a></td>
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
    $mail->SMTPDebug = 2;
    //$mail->CharSet="iso-8859-1";
    $mail->SMTPAuth = true;  // enable SMTP authentication
    if(config("smtp_security"))
	{
		$mail->SMTPSecure 	= config("smtp_security"); 
	}
	
    $mail->Host = config("smtp_host"); // change host detail as per requirement
    $mail->Port = config("smtp_port");                 // set the SMTP port for the GMAIL server
    $mail->Username = config("smtp_user");               //   set username(Email)   
    $mail->Password = config("smtp_password");           //   set password
    $mail->setFrom(config("mail_from"), config("mail_from_name")); //change example@example.com as per your requirement
    $mail->addAddress($to, $fname);
    $mail->Subject = $subjct;
    $mail->msgHTML($email_tmp);
    //$mail->Body     = $message;
    if (!$mail->send()) {
        echo 'Message was not sent.';
        echo 'Mailer error: ' . $mail->ErrorInfo;
        exit;
    } else {
        echo 'Message has been sent.';
        exit;
    }
}
?>
