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
$mail->charSet = "utf8";
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
	$mail->SMTPDebug = 0;                                 // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'email-ssl.com.br';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'fernando@fernandobatista.com.br';                 // SMTP username
	$mail->Password = 'fer7660nando';                           // SMTP password
	$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to


	//Recipients
	$mail->setFrom('fernando@fernandobatista.com.br', 'Fernando');
	$mail->addAddress('nando.online@live.com', 'Nando');     // Add a recipient

	//Content
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Eu quero é mais!';
	$mail->Body    = 'Teste doido!</b>';
	$mail->AltBody = 'Vamos ver se da certo!';

	if ($mail->send()) {
		echo 'Sucesso!';
	}else{
		echo 'Erro!';
	}


} catch (Exception $e) {
	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}