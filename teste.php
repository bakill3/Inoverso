<?php
include_once 'phpmailer/PHPMailerAutoload.php'; //LIVRARIA PHPMAILER
$mail->Subject = 'I9 - Parabens!';

$mail = new PHPMailer;
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gabrieldesign.pt';              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'no-reply@gabrieldesign.pt'; // your email id
$mail->Password = 'oo00OO=='; // your password
$mail->SMTPSecure = 'tls';                  
$mail->Port = 25;     //587 is used for Outgoing Mail (SMTP) Server.
$mail->setFrom('no-reply@gabrieldesign.pt', 'I9');
$mail->addAddress("deostulti2@gmail.com");   // Add a recipient
$mail->isHTML(true);  // Set email format to HTML
$mail->Subject = 'I9 - Parabens!';
		$mail->Body = "Ya";
		if(!$mail->send()) {

		} else {
			
		}
?>