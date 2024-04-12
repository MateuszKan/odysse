<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Ustawienia poczty
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'phpemail3@gmail.com';
    $mail->Password = 'xtml oxbo ppup npsm';
    $mail->Port = 587; // Może być inny, zależnie od konfiguracji serwera SMTP
    $mail->SMTPSecure = 'tsl'; // Szyfrowanie, np. ssl lub tls


    // Odbiorca
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('mateuszkantarewicz@gmail.com'); // Adres odbiorcy

    // Content
    $mail->isHTML(false);
    $mail->Subject = 'New Inquiry from Website';
    $mail->Body    = 'Name: ' . $_POST['name'] . '\n' .
        'Email: ' . $_POST['email'] . '\n' .
        'Phone: ' . $_POST['phone'] . '\n' .
        'Message: ' . $_POST['message'];

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
