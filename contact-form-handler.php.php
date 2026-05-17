<?php
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$visitor_email = $_POST['email'];
$visitor_phone = $_POST['phone'];
$message = $_POST['message'];


$email_from = 'kayunusual@gmail.com';

$email_subject = "New Form Submission";

$email_body = "User Firstname: $firstname.\n".
"User Lastname: $lastname.\n".
"User Email: $visitor_email.\n".
"User Phone: $visitor_phone.\n".
"User Message: $message.\n";


$to = "Your E-Mail";

$headers = "From: $email_from \r\n";

$headers .= "Reply To: $visitor_email \r\n";

mail($to,email_subject,$email_body,$headers);

header("Location: contact.html");



?>