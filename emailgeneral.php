<?php
//Import PHPMailer classes into the global namespace
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
    $mail->Username = 'botodysee@gmail.com';
    $mail->Password = 'naku quiz njqe onvl
    ';
    $mail->Port = 587; // Może być inny, zależnie od konfiguracji serwera SMTP
    $mail->SMTPSecure = 'tls'; // Szyfrowanie, np. ssl lub tls

    // Odbiorca
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('info@odysse.co.uk'); // Adres odbiorcy

    // Content
    $mail->isHTML(false);
    $mail->Subject = 'New Inquiry from Website';
    $mail->Body    = 'Name: ' . $_POST['name'] . "\n" .
        'Email: ' . $_POST['email'] . "\n" .
        'Phone: ' . $_POST['phone'] . "\n" .
        'Message: ' . $_POST['message'];

    $mail->send();
    header('Location: success-general.html');
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
