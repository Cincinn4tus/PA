<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Inscription";
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

  $validation = "Si votre adresse mail est valide, vous allez recevoir un lien pour réinitialiser votre mot de passe";

  if(empty($_POST['email']) || count ($_POST) != 1){
    header('Location: /user/login.php');
    exit;
  }

  
    $email = cleanEmail($_POST['email']);

    $connection = connectDB();
    $queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
    $queryPrepared->execute([ "email" => $email ]);

    $results = $queryPrepared->fetch();
    $name = $results['firstname'];

    if(!empty($results)){
        header('Location: /user/login.php?validation='.$validation);
        exit;
    }

    $message = "Voici le lien pour réinitialiser votre mot de passe : <a href='https://crowdhub.fr/user/resetPwd.php?email=".$email."'>https://crowdhub.fr/user/resetPwd.php?email=".$email."</a>";
    $firstname = $results['firstname'];
    $lastname = $results['lastname'];

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
    $mail->addAddress($email, $firstname . ' ' . $lastname);

    // Ajouter le sujet et le corps du message
    $mail->Subject = 'Confirmez votre adresse mail';
    $mail->msgHTML($message);

    if($mail->send()) {
        $validation = "Si l'adresse mail est valide, vous allez recevoir un lien de réinitialisation de mot de passe";
        header('Location: /user/login.php?validation='.$validation);
        exit;
    } else {
        $validation = "Une erreur est survenue lors de l'envoi du mail de confirmation. Veuillez réessayer plus tard";
        header('Location: /user/login.php?validation='.$validation);
    }


    ?>