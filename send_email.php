<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected recipient from the form
    $recipient = $_POST["recipient"];

    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Set up SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kavindarathnayake390@gmail.com'; // Your Gmail email address
        $mail->Password = 'acbkpceupfposock'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set email details
        $mail->setFrom('kavindarathnayake390@gmail.com', 'Kavinda');
        $mail->addAddress($recipient);
        $mail->Subject = 'New Job';
        $mail->Body = 'You have a new job.';

        // Send the email
        $mail->send();

        echo "Email sent successfully to $recipient!";
    } catch (Exception $e) {
        echo "Email sending failed: " . $mail->ErrorInfo;
    }
}
?> 
