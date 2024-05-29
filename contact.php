<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
// Send email using PHPMailer
//$mail = new PHPMailer(true);
//$mail->SMTPDebug = 2;// Enable verbose debug output
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Collect form data
$name = $_POST['name'];

$email = $_POST['email'];

$message = $_POST['message'];
  // Instantiate PHPMailer
  $mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'blossom.cbe2020@gmail.com'; // SMTP username
    $mail->Password   = 'sopu uzfu fekh rfem';   // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587; // Port for STARTTLS
 
    // Recipients
    $mail->setFrom('blossom.cbe2020@gmail.com');
    $mail->addAddress('admin@blossomacademy.co.in'); // Add a recipient
 
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Enquiry from Contact form';
    $mail->Body    = "<p><strong>Name:</strong> $name</p>
                   <p><strong>Email:</strong> $email</p>
                   <p><strong>Message:</strong> $message</p>";
 
    $mail->send();
    echo 'Message has been sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>