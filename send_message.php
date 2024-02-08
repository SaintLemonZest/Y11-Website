<?php
// Define variables and initialize with empty values
$name = $email = $message = "";
$name_err = $email_err = $message_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate message
    if (empty(trim($_POST["message"]))) {
        $message_err = "Please enter your message.";
    } else {
        $message = trim($_POST["message"]);
    }

    // If no errors, send email
    if (empty($name_err) && empty($email_err) && empty($message_err)) {
        // Set the recipient email address
        $to = "your_email@example.com";

        // Set the email subject
        $subject = "Contact Form Submission";

        // Build the email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Send the email
        mail($to, $subject, $email_content);

        // Redirect to thank you page
        header("location: thank_you.php");
        exit();
    }
}
?>