<?php

    ini_set("sendmail_from", "ne-pas-repondre@crowdhub.fr");
    // envoi du mail
    $to = "a.goumane@yahoo.com";
    $subject = "Test mail";
    $message = "Bonjour ! Ceci est un test de mail.";
    mail($to, $subject, $message);

    header('Location: /index.php');
?>