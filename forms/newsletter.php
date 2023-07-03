<?php

$title = $_POST['title'];
$content = $_POST['content'];
$type = $_POST['type'];
$date = $_POST['date'];

if (empty($title) || empty($content) || empty($type) || empty($date)) {
    $_SESSION['error'] = "Veuillez remplir tous les champs";
    header("Location: /admin/admin-news.php");
    exit();
} else {

    // Connexion à la base de données
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    $pdo = connectDB();

    // Création de la newsletter
    $sql = "INSERT INTO newsletter (title, content, users_type, send_date) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $content, $type, $date]);

    // Redirection vers la page d'administration
    header("Location: /admin/admin-news.php");
    exit();
}

$connection = connectDB();
$queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."newsletter
                                        (title, content, type, date)
                                        VALUES 
                                        (:title, :content, :type, :date)");
$queryPrepared->execute([
                            ":title" => $title,
                            ":content" => $content,
                            ":type" => $type,
                            ":date" => $date
                        ]);

$connection = connectDB();
if ($type == 0) {
    $connection = connectDB();
    $results = $connection->query("SELECT * FROM ".DB_PREFIX."user");
    $results = $results->fetchAll();
} elseif ($type == 1) {
    $connection = connectDB();
    $results = $connection->query("SELECT * FROM ".DB_PREFIX."user WHERE scope = 1");
    $results = $results->fetchAll();
} elseif ($type == 2) {
    $connection = connectDB();
    $results = $connection->query("SELECT * FROM ".DB_PREFIX."user WHERE scope = 2");
    $results = $results->fetchAll();
} elseif ($type == 3) {
    $connection = connectDB();
    $results = $connection->query("SELECT * FROM ".DB_PREFIX."user WHERE scope = 0");
    $results = $results->fetchAll();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if ($date == date('Y-m-d')) {
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

    // Envoyer le message
    if($mail->send()) {
        echo 'Message envoyé avec succès !';
    }
}

