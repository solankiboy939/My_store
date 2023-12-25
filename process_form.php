<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $to = "solankimanohar2176@gmail.com"; // Replace with your Gmail address
    $subject = "New Contact Form Submission";
    $headers = "From: $email";

    $mailBody = "Name: $name\n";
    $mailBody .= "Email: $email\n";
    $mailBody .= "Phone: $phone\n\n";
    $mailBody .= "Message:\n$message";

    // Send email
    mail($to, $subject, $mailBody, $headers);

    // Redirect to a thank you page
    header("Location: thank_you.html");
    exit();
}
?>
