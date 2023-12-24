<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Reached before checking the request method<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $phone = $_POST["phone"]; 
    $message = $_POST["message"];

    // Set the recipient email address
    $to = "solankimanohar2176@gmail.com";

    // Set the email subject
    $subject = "New Contact Form Submission " . htmlspecialchars($name);


    // Set additional headers
    $headers = "From: $name <$to>\r\n";
    $headers .= "Reply-To: $to\r\n"; // Use the same email as "To" for simplicity
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    // Construct the email body
    $mailBody = "Name: $name\n";
    $mailBody .= "Phone Number: $phone\n";
    $mailBody .= "Message:\n$message";

    echo "Reached before checking the request method<br>";

    // Send the email
    $mailSuccess = mail($to, $subject, $mailBody, $headers);

    // Check if the email was sent successfully
    if ($mailSuccess) {
        echo "Thank you for your message. We will get back to you soon!";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    // Redirect users who access this script directly
    header("Location: /index.html");

    exit; // Removed the parentheses from exit
}
if (empty($name) || empty($phone) || empty($message)) {
    echo "Please fill in all required fields.";
    // Optionally, redirect the user back to the form
    exit;
}

?>
