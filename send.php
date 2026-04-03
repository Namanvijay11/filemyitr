<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // SMTP config
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'yourgmail@gmail.com'; // your gmail
    $mail->Password = 'your-app-password';   // app password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender
    $mail->setFrom('yourgmail@gmail.com', 'FileMyITR');

    // TWO emails
    $mail->addAddress('rvijayvargia@rediffmail.com');
    $mail->addAddress('rvijayvargia2@rediffmail.com');

    // Data from form
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    // Email content
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body = "
    Name: $name
    Phone: $phone
    Email: $email
    Service: $service
    Message: $message
    ";

    $mail->send();
    echo "Message sent successfully";

} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
?>