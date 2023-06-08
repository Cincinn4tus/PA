<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/conf.inc.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/core/functions.php';

    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'] . '<br><br> <hr>' . $lastname . '<br>' . $email . '<br>' . $phone;

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
    $mail->addAddress('aligoumane@protonmail.com', 'Aligoumane');

    // Ajouter le sujet et le corps du message
    $mail->Subject = 'Crowdhub - Un nouveau message de ' . $lastname . ' !';
    $mail->msgHTML($message);

    // Envoyer le message
    if($mail->send()) {
        echo 'Message envoyé avec succès !';
    }
?>

