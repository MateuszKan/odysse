<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// Dane pobrane z formularza
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$license = $_POST['license'];
$experience = $_POST['experience'];
$address = $_POST['address'];
$referral = isset($_POST['referral']) ? $_POST['referral'] : '';

try {
    // Konfiguracja serwera SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'phpemail3@gmail.com';
    $mail->Password = 'xtml oxbo ppup npsm';
    $mail->Port = 587; // Może być inny, zależnie od konfiguracji serwera SMTP
    $mail->SMTPSecure = 'tsl'; // Szyfrowanie, np. ssl lub tls

    // Ustawienia wiadomości
    $mail->setFrom($email, $name);
    $mail->addAddress('mateuszkantarewicz@gmail.com'); // Adres, na który zostanie wysłana wiadomość
    $mail->isHTML(false);
    $mail->Subject = 'PCO Driver Application';
    $mail->Body    = "Name: $name\nEmail: $email\nPhone: $phone\nDriver's License Number: $license\nDriving Experience: $experience years\nResidential Address: $address\nReferral: $referral";

    // Wysłanie wiadomości
    $mail->send();
    echo 'Application submitted successfully';
} catch (Exception $e) {
    echo 'An error occurred while submitting the application: ', $mail->ErrorInfo;
}
?>

