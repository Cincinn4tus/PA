<?php
    session_start();
    $pageTitle = "Gestion des utilisateurs";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

$title = $_POST['title'];
$content = $_POST['content'];
$recipient = $_POST['recipient'];
$date = $_POST['date'];

// convertir la date en format SQL
$date = date('Y-m-d', strtotime($date));

$connection = connectDB();
$queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."newsletter
                                        (title, content, recipient, send_date)
                                        VALUES 
                                        (:title, :content, :recipient, :send_date)");
$queryPrepared->execute([
                            ":title" => $title,
                            ":content" => $content,
                            ":recipient" => $recipient,
                            ":send_date" => $date
                        ]);

if ($recipient == 1) {
    $results = $connection->query("SELECT * FROM ".DB_PREFIX."user WHERE scope = 1");
} elseif ($recipient == 2) {
    $results = $connection->query("SELECT * FROM ".DB_PREFIX."user WHERE scope = 2");
} elseif ($recipient == 3) {
    $results = $connection->query("SELECT * FROM ".DB_PREFIX."user WHERE scope = 0");
} else{
    $results = $connection->query("SELECT * FROM ".DB_PREFIX."user");
}
$results = $results->fetchAll();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/SMTP.php';

foreach($results as $result) {

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
    $mail->addAddress($result['email'], $result['firstname'] . ' ' . $result['lastname']);

    // Ajouter le sujet et le corps du message
    $mail->Subject = $title;
    $mail->msgHTML($content);

    // Envoyer le message
    if($mail->send()) {
        echo 'Message envoyé avec succès !';
    }


}

?>