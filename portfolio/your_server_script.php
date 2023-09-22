<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate the data (you can add more validation as needed)
    if (empty($fullname) || empty($email) || empty($phone) || empty($subject) || empty($message)) {
        echo "Error: All fields are required.";
        exit;
    }

    // Use PHP mail() function to send the email
    $to = "humna.zaidi17@gmail.com"; // Replace with your email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    $mailBody = "Name: $fullname\n";
    $mailBody .= "Email: $email\n";
    $mailBody .= "Phone: $phone\n";
    $mailBody .= "Subject: $subject\n";
    $mailBody .= "Message: $message\n";

    // Send the email
    if (mail($to, $subject, $mailBody, $headers)) {
        echo "Success: Your message has been sent.";
    } else {
        echo "Error: Unable to send the message.";
    }
} else {
    echo "Error: Invalid request method.";
}
?>
