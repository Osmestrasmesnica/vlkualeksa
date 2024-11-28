<?php
// Replace with your real receiving email address
$receiving_email_address = 'wlqinnovations@gmail.com';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input fields
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email address!');
    }

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email body
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Here are the details:\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message\n";

    // Send email
    $mail_sent = mail($receiving_email_address, $subject, $email_body, $headers);

    if ($mail_sent) {
        echo 'Your message has been sent successfully!';
    } else {
        echo 'Sorry, your message could not be sent. Please try again later.';
    }
} else {
    die('Invalid request method.');
}
?>
