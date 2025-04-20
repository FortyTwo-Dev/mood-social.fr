<?php
include_once($root . '/config/email.php');
require $root . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function SendEmail(string $from, string $from_name, string $recipient, string $subject, string $body, string $recipient_name = '', bool $html = true, bool $expection = false) {

    $mail = new PHPMailer($expection);

    try {
        $mail->isSMTP();
        $mail->Host = EMAIL_HOST;
        $mail->Port = EMAIL_PORT;
        $mail->Username = EMAIL_USERNAME;
        $mail->SMTPAuth = EMAIL_SMTP_AUTH;

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