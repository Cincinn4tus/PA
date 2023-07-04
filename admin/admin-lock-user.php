<?php

    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";


// récupérer l'id

$id = $_GET["id"];

$message = "Nous vous avons banni de la plateforme";



// mettre à jour la colonne scope de la table user avec la valeur 4

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("UPDATE ".DB_PREFIX."user SET scope=4 WHERE id=:id");
    $queryPrepared->execute([
        "id"=>$id
    ]);

// récupérer l'email de l'utilisateur

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT email FROM ".DB_PREFIX."user WHERE id=:id");
    $queryPrepared->execute(["id"=>$id]);
    $result = $queryPrepared->fetch();




    require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/Exception.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/PHPMailer.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/SMTP.php';

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
    foreach ($results as $result) {
        $mail->addAddress($result['email'], $result['firstname'] . ' ' . $result['lastname']);
    }

    // Ajouter le sujet et le corps du message
    $mail->Subject = $title;
    $mail->msgHTML($content);
