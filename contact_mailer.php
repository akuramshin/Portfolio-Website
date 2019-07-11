<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Hide the password for your email from the client
$myfile = fopen("../pass.txt", "r") or die("Unable to open file!");
$pass = fgets($myfile);
fclose($myfile);

// Setup out mailing with the google SMTP service
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->isHTML();
// Here you input the email that will be sending the contact messages
$mail->Username = 'youremailhere';
$mail->Password = 'youremailpasswordhere';
$mail->SetFrom('sentfromemailhere');

$email_address = $_POST['email'] ;
$comments = $_POST['message'] ;
$name = $_POST['name'] ;
$msg =
  "First Name: " . $name . "\r\n" .
  "Email: " . $email_address . "\r\n" .
  "Comments: " . $comments ;

// Setup the mail template
$mail->Subject = 'Website Message';
$mail->Body = $msg;
$mail->AddAddress('emailtosendtohere');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
?>
