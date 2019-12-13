<?php 
require("PHPMailer/class.phpmailer.php");
$from_name = "Admin";
			$from_mail = "no-reply@reojen.com"; //add from email address 
			
			$first_name = 'sbs';
			$middle_name = 'group';
			$last_name = 'indore';
			$mob_numb ='+917869118811';
			$userpass = 'jtr956KGvRkOtjrgK';
			
			$subject = "confirmation mail from REOJEN";
			
			$message = "First Name:".$first_name."\r\n".
					"Middle Name:".$middle_name."\r\n".
					"Last Name:".$last_name."\r\n".
					"Mobile Number:".$mob_numb."\r\n".
					"Password:".$userpass."\r\n".
					"Your account has been created successfully";
			
			$to = "pradeepsahu.sbs@gmail.com";
			
			
			$mail = new PHPMailer;
			
			
			                              // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->SMTPDebug = 2; 
			//$mail->CharSet="iso-8859-1";
			$mail->Host = 'smtp.1and1.com';                      // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'support@reojen.com';                    // SMTP username(email)
			$mail->Password = 'jtr956KGvRkOtjrgK';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 25; 
					
					
			$mail->setFrom($from_mail, $from_name);
			$mail->addAddress($from_mail, $first_name.''.$last_name);
			$mail->Subject  = $subject;
			$mail->Body     = $message;
			if(!$mail->send()) {
				echo 'Message was not sent.';
				echo 'Mailer error: ' . $mail->ErrorInfo;
				exit;
			} else {
				echo 'Message has been sent.';
				exit;
			}
?>