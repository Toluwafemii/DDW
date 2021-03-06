<?php

use DDWeekend\Utilities\EmailTemplater;
use DDWeekend\Models\User;
use DDWeekend\Mail\Mail;

// autoload classes
require 'vendor/autoload.php';

// Check for empty fields
if(
       empty($_POST['first-name'])
    || empty($_POST['email'])
    || empty($_POST['last-name'])
    || empty($_POST['phone'])
    || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)
)
{
 header("Location: _index.php?error=All the form fields are required. Please fill properly and try again.");
 exit;
}

$firstname = $_POST['first-name'];
$lastname = $_POST['last-name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Create User instance from submitted data
$user = new User($firstname, $lastname, $email, $phone);

$template = file_get_contents('emails/registered.php');
$parsed_template = EmailTemplater::parse($template, $user->firstname, $user->lastname, $user->email, $user->phone);
$mail = new Mail($user, $parsed_template);
$mail->buildData();

if ($mail->send()) {
    header("Location: _index.php?message=Your Registeration was Successful");
    exit;
} else {
    header("Location: index.html");
    exit;
}

// Create the email and send the message
//$to = 'yourname@yourdomain'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
//$email_subject = $subject;
//$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nLast Name: $lastname\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
//$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$headers .= "Reply-To: $email_address";
//mail($to,$email_subject,$email_body,$headers);
//echo json_encode(array('success'=>'true'));
//return true;
?>
