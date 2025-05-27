<?php
include_once($root . '/config/email.php');
require $root . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function SendEmail(string $from_name, string $recipient, string $subject, string $body, string $from = 'no-reply@mood-social.ovh', string $recipient_name = '', bool $html = true, bool $expection = false) {

    $mail = new PHPMailer($expection);

    try {
        $mail->isSMTP();
        $mail->Host = EMAIL_HOST;
        $mail->SMTPAuth = EMAIL_SMTP_AUTH;
        $mail->Username = EMAIL_USERNAME;
        $mail->Password = EMAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = EMAIL_PORT;
        $mail->CharSet = 'UTF-8';

        $mail->setFrom($from, $from_name);
        $mail->addAddress($recipient, $recipient_name);

        $mail->isHTML($html);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
    } catch (Exception $e) {
        echo "Erreur : {$mail->ErrorInfo}";
    }
}

function SendEmails(string $from_name, $recipient, string $subject, string $body, string $from = 'no-reply@mood-social.ovh', string $recipient_name = '', bool $html = true, bool $expection = false) {

    foreach ($recipient as $user) {
        $mail = new PHPMailer($expection);
    
        try {
            $mail->isSMTP();
            $mail->Host = EMAIL_HOST;
            $mail->SMTPAuth = EMAIL_SMTP_AUTH;
            $mail->Username = EMAIL_USERNAME;
            $mail->Password = EMAIL_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = EMAIL_PORT;
            $mail->CharSet = 'UTF-8';
    
            $mail->setFrom($from, $from_name);
            $mail->addAddress($user->email, $recipient_name);
    
            $mail->isHTML($html);
            $mail->Subject = $subject;
            $mail->Body = $body;
    
            $mail->send();
        } catch (Exception $e) {
            echo "Erreur : {$mail->ErrorInfo}";
        }
    }
}