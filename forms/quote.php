<?php
    $pageTitle = "Analytics";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = "Nous avons bien reçu votre message, nous vous recontacterons dans les plus brefs délais. <br> <br> Merci de votre confiance !";


    echo '<h1 class="text-center">Merci pour votre message !</h1>';



    /*
        CREATE TABLE crowdhub.pa_message (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        lastname VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        created_at DATETIME NOT NULL,
        status INT NOT NULL DEFAULT 0
    );
    */

    $created_at = date('Y-m-d H:i:s');
    $status = 0;
    


$connection = connectDB();
$queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."message
                                        (lastname, email, phone, message, created_at, status)
                                        VALUES 
                                        (:lastname, :email, :phone, :message, :created_at, :status)");

$queryPrepared->execute([
                            ":lastname" => $lastname,
                            ":email" => $email,
                            ":phone" => $phone,
                            ":message" => $message,
                            ":created_at" => $created_at,
                            ":status" => $status
                        ]);

                                        

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

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
    $mail->addAddress($email, $lastname);

    // Ajouter le sujet et le corps du message en utf-8
    $mail->Subject = 'Message reçu !';
    $mail->msgHTML($message);

    // Envoyer le message
    if($mail->send()) {
        echo 'Message envoyé avec succès !';
    }

?>

