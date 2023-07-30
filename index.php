<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$tosend=$_POST['tosendemail'];

require('PHPMailer.php');
require('SMTP.php');
require('Exception.php');
$message=$_POST['txt'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
  //  $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ujjuguptu@gmail.com';                     //SMTP username
    $mail->Password   = 'upjrhdnmwcrxtrmr';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       =587 ;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ujjuguptu@gmail.com', 'ujjwal');
    $mail->addAddress($tosend,'UJJWAL');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('i1.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Testing mail';
    $mail->Body    = $message;
  //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}