<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
// $mail_username="aadrikatechnology@gmail.com";
// $mail_pass="8987506082";

define('mail_username','aadrikatechnology@gmail.com');
define('mail_pass','8987506082');

function phpMailer($data){
    //print_r($data);
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);
    try {
		//Server settings
		//$mail->SMTPDebug = 3;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = mail_username;                     // SMTP username
		$mail->Password   = mail_pass;                               // SMTP password
		$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			//Recipients
		$mail->setFrom(mail_username, 'Aadrika');
		$mail->addAddress($data['from'], $data['name']);     // Add a recipient
		// $mail->addAddress('com.rhl@gmail.com');               // Name is optional
		/*$mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');
			// Attachments
		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		*/
		// Content
        //$mail->addAttachment('c:/xampp/htdocs/sri/public/uploads/candidate_offer_letter/".$fileName');
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $data['subject']; 
		$mail->Body    = $data['body'];
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		//echo 'Message has been sent';
		return true;
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		return false;
	}
}


function reSchedule($data){
    //print_r($data);
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);
    try {
		//Server settings
		//$mail->SMTPDebug = 3;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = mail_username;                     // SMTP username
		$mail->Password   = mail_pass;                               // SMTP password
		$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			//Recipients
		$mail->setFrom(mail_username, 'Aadrika');
		$mail->addAddress($data['from'], 'Manash Singh');     // Add a recipient
		//$mail->addAddress('com.rhl@gmail.com');               // Name is optional
		/*$mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');
			// Attachments
		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		*/
		// Content
        //$mail->addAttachment('c:/xampp/htdocs/sri/public/uploads/candidate_offer_letter/".$fileName');
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $data['subject']; 
		$mail->Body    = $data['body'];
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		//echo 'Message has been sent';
		return true;
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		return false;
	}
}


function secondRoundInterviewCall($data){
    //print_r($data);
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);
    try {
		//Server settings
		//$mail->SMTPDebug = 3;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = mail_username;                     // SMTP username
		$mail->Password   = mail_pass;                               // SMTP password
		$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			//Recipients
		$mail->setFrom(mail_username, 'Aadrika');
		$mail->addAddress($data['email'], 'Manash Singh');     // Add a recipient
		// $mail->addAddress('com.rhl@gmail.com');               // Name is optional
		/*$mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');
			// Attachments
		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		*/
		// Content
        //$mail->addAttachment('c:/xampp/htdocs/sri/public/uploads/candidate_offer_letter/".$fileName');
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $data['subject']; 
		$mail->Body    = $data['body'];
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		//echo 'Message has been sent';
		return true;
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		return false;
	}
}




function backupPhpMailer(){
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		//$mail->SMTPDebug = 3;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = mail_username;                     // SMTP username
		$mail->Password   = mail_pass;                               // SMTP password
		$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		//Recipients
		$mail->setFrom(mail_username, 'Aadrika');
		$mail->addAddress('ku.rahul0000@gmail.com', 'Rahul Kushwaha');     // Add a recipient
		// $mail->addAddress('com.rhl@gmail.com');               // Name is optional
		/*$mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');

		// Attachments
		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		*/
		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Here is the Test subject';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		echo 'Message has been sent';
		return true;
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		return false;
	}
}


function offerLetter($data){
  

	// print_r("username ".mail_username);
	// echo "<br/>";
	// print_r(mail_pass);
	// echo "C:/xampp/htdocs/swmerp/public/uploads/candidate_offer_letter/".$data['file_name'];exit;
	// return;
    //print_r($data);
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);
    try {
		//Server settings
		$mail->SMTPDebug = 1;                   // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = mail_username;                     // SMTP username
		$mail->Password   = mail_pass;                               // SMTP password
		$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			//Recipients
		$mail->setFrom(mail_username, 'Aadrika');
		$mail->addAddress($data['candidateDetails']['email_id'], 'Manash Singh');     // Add a recipient
		// $mail->addAddress('com.rhl@gmail.com');               // Name is optional
		/*$mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');
			// Attachments
		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		*/
		// Content
        // $mail->addAttachment($data['file_name']);
        // $mail->addAttachment($data['file_name']);
		

        
        
        $mail->addAttachment("//192.168.0.32/swmerp/public/uploads/".$data['file_name']);
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = "Joining Letter";
		$mail->Body    = $data['body'];
		$mail->AltBody = 'This is the body ';


		$mail->send();
		//echo 'Message has been sent';
		return true;
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		return false;
	}
}

function userPass($data){
    //print_r($data);
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);
    try {
		//Server settings
		//$mail->SMTPDebug = 3;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = mail_username;                     // SMTP username
		$mail->Password   = mail_pass;                               // SMTP password
		$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			//Recipients
		$mail->setFrom(mail_username, 'Aadrika');
		$mail->addAddress($data['candidateDetails']['email_id'], 'Manash Singh');     // Add a recipient
		// $mail->addAddress('com.rhl@gmail.com');               // Name is optional
		/*$mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');
			// Attachments
		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		*/
		// Content
        //$mail->addAttachment('c:/xampp/htdocs/sri/public/uploads/candidate_offer_letter/".$fileName');
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'User Id & Password Given By Organization'; 
		$mail->Body    = $data['body'];
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		//echo 'Message has been sent';
		return true;
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		return false;
	}
}

function fullNdFinalSettlment($data){

	$mail = new PHPMailer(true);
    try {
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = mail_username;
		$mail->Password   = mail_pass;
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;
		$mail->setFrom(mail_username, 'Aadrika');
		$mail->addAddress($data['email'], 'Manash Singh');
		// $mail->addAddress('com.rhl@gmail.com');
		$mail->isHTML(true);
		$mail->Subject = $data['subject'];
		$mail->Body    = $data['body'];
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->send();
		return true;
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		return false;
	}
}


function accountPayment($data){

	$mail = new PHPMailer(true);
    try {
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = mail_username;
		$mail->Password   = mail_pass;
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;
		$mail->setFrom('aadrikatechnology@gmail.com', 'Aadrika');
		$mail->addAddress($data['email'], 'Manash Singh');
		// $mail->addAddress('com.rhl@gmail.com');
		$mail->isHTML(true);
		$mail->Subject = $data['subject'];
		$mail->Body    = $data['body'];
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->send();
		return true;
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		return false;
	}
}