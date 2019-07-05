<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Setup out mailing with the google SMTP service
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
// Here you input the email that will be sending the contact messages
$mail->Username = 'billyballstick@gmail.com';
$mail->Password = 'kuramshin12';
$mail->SetFrom('billyballstick@gmail.com');

// Get the contact information and message
$email_address = $_POST['email'] ;
$comments = $_POST['message'] ;
$name = $_POST['name'] ;
$msg =
  "First Name: " . $name . "\r\n" .
  "Email: " . $email_address . "\r\n" .
  "Comments: " . $comments ;

// Setup the mail template
$mail->Subject = 'New Message';
$mail->Body = $msg;
$mail->AddAddress('artur.kurams@gmail.com');

$mail->Send();
echo $msg;
?>
