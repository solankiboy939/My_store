<?php
// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST")
  // Sanitize user input
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  // Validate form fields
  if (empty($name) || empty($email) || empty($message)) {
    echo 'Please fill in all required fields.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Please enter a valid email address.';
  } else {
    // Prepare email content
    $to = 'solankimanohar2176@gmail.com';  // Replace with your email address
    $subject = 'Contact Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = 'From: from_email@example.com' . "\r\n";  // Replace with sender email

    // Send email using PHP's mail() function
    if (mail($to, $subject, $body, $headers)) {
      echo 'Message sent successfully!';
        // header('Location: thankyou.html');
    } else {
      echo 'Message could not be sent.';
    }
  }
}
?>
