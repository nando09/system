<?php
// https://mailtrap.io/signin
// https://www.youtube.com/watch?v=qXk81keM080			phpmailer
// https://www.youtube.com/watch?v=PznuwBxjKOo			Swift Mailer
// 

require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer();                              // Passing `true` enables exceptions
try {
	// /**********		MAILTRAP	**********/
	// //Server settings
	// $mail->SMTPDebug = 2;                                 // Enable verbose debug output
	// $mail->isSMTP();                                      // Set mailer to use SMTP
	// $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
	// $mail->SMTPAuth = true;                               // Enable SMTP authentication
	// $mail->Username = 'e2c8f030e5fde2';                 // SMTP username
	// $mail->Password = '6fecd40cfb8f73';                           // SMTP password
	// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	// $mail->Port = 2525;                                    // TCP port to connect to


	/**********		OUTLOOK	**********/
	//Server settings
	$mail->SMTPDebug = 2;                                 // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'nando.online@live.com';                 // SMTP username
	$mail->Password = 'FErnando.NET';                           // SMTP password
	$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to


	//Recipients
	$mail->setFrom('nando.online.fb@gmail.com', 'Fernando');
	$mail->addAddress('testedoidaododida@live.com.br', 'Nando');     // Add a recipient

	//Content
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Eu quero é mais!';
	$mail->Body    = 'Teste doido!</b>';
	$mail->AltBody = 'Vamos ver se da certo!';

	$mail->send();
	echo 'Message has been sent';
} catch (Exception $e) {
	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}