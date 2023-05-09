<?php

    require $_SERVER['DOCUMENT_ROOT'] . "/phpmailer/PHPMailer.php";


// Créer une nouvelle instance de PHPMailer
$mail = new PHPMailer();

// Configurer le serveur SMTP
$mail->isSMTP();
$mail->Host = 'ssl0.ovh.net';
$mail->SMTPAuth = true;
$mail->Username = 'ne-pas-repondre@crowdhub.fr';
$mail->Password = 'Zeas-56vgfA';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

// Configurer l'expéditeur et le destinataire
$mail->setFrom('ne-pas-repondre@crowdhub.fr', 'Crowdhub');
$mail->addAddress('aligoumane@protonmail.com', 'Aligoumane');

// Ajouter le sujet et le corps du message
$mail->Subject = 'Sujet du message';
$mail->Body    = 'Corps du message';

// Envoyer le message
if(!$mail->send()) {
    echo 'Erreur : ' . $mail->ErrorInfo;
} else {
    echo 'Message envoyé avec succès !';
}

?>