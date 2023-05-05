<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Charge PHPMailer

$mail = new PHPMailer(true);

try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host       = 'ssl0.ovh.net';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ne-pas-repondre@crowdhub.fr';
    $mail->Password   = 'Fivfeljerifta-92';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    // Destinataire, sujet et corps du message
    $mail->setFrom('ne-pas-repondre@crowdhub.fr', 'CrowdHub.fr');
    $mail->addAddress('a.goumane@yahoo.com', 'Ali Goumane');
    $mail->Subject = 'Sujet du message';
    $mail->Body    = 'Message de test de la part de crowdhub.fr';

    $mail->send();
    echo 'Le message a été envoyé';
} catch (Exception $e) {
    echo "Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
}
?>