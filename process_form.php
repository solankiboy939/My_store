<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Compose email message
    $subject = "Contact Form Submission from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Set recipient email address
    $to = "solankimanohar2176@gmail.com";

    // Set additional headers
    $headers = "From: $email";

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Set SMTP settings
        $mail->isSMTP();
        $mail->Host = 'your-smtp-server.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-smtp-username';
        $mail->Password = 'your-smtp-password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set email content
        $mail->setFrom($email);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Send email
        $mail->send();

        echo "Thank you for contacting us! We will get back to you soon.";
    } catch (Exception $e) {
        // Log the error
        error_log("Email error: {$mail->ErrorInfo}");

        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // Method Not Allowed
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
