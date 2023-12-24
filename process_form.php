<?php

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

    // Send email
    $success = mail($to, $subject, $body, $headers);

    if ($success) {
        echo "Thank you for contacting us! We will get back to you soon.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // Method Not Allowed
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
