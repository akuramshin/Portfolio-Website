<?php
/*
This first bit sets the email address that you want the form to be submitted to.
You will need to change this value to a valid email address that you can access.
*/
$webmaster_email = "artur.kurams@gmail.com";

/*
This next bit loads the form field data into variables.
*/
$email_address = $_POST['email'] ;
$comments = $_POST['message'] ;
$name = $_POST['name'] ;
$msg =
  "First Name: " . $name . "\r\n" .
  "Email: " . $email_address . "\r\n" .
  "Comments: " . $comments ;

mail( "$webmaster_email", "Contact Form Results", $msg );
echo "success";
?>
