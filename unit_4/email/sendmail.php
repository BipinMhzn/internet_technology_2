<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Recipient email (teacher/admin)
    $to = "teacher@example.com";

    // Email subject
    $subject = "New Message from Contact Form";

    // Email body
    $body = "You have received a new message:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<h3>Thank you, $name. Your message has been sent successfully!</h3>";
    } else {
        echo "<h3>Sorry, your message could not be sent.</h3>";
    }
}
?>
