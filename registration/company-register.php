<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Inscription";
  
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

  // afficher toutes les erreurs et les avertissements

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);



// récupérer les données du formulaire

$name = $_POST["company_name"];
$siren = $_POST["siren"];
$email = $_POST["email"];
$message = "Merci de  valider votre adresse mail en cliquant sur le lien suivant : <a href='https://crowdhub.fr/user/completeProfile.php?siren=".$siren."'>Confirmer mon adresse mail</a>";


if(
    empty($_POST['company_name']) ||
    empty($_POST['siren']) ||
    empty($_POST['email']) ||
    !isset($_POST['cgu']) ||
    count($_POST) != 4
) {
    header('Location: /registration/sendRegistration.php');
    exit();
}

$name = cleanLastname($_POST['company_name']);
$email = cleanEmail($_POST['email']);

$connection = connectDB();
$queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."company WHERE siren=:siren");
$queryPrepared->execute([ "siren" => $siren ]);

$results = $queryPrepared->fetch();

if(!empty($results)){
    $listOfErrors[] = "L'email n'est pas valide";
}
if(!empty($listOfErrors)){
    $_SESSION['listOfErrors'] = $listOfErrors;
    $_SESSION['data'] = $_POST;
    header('Location: /registration/sendRegistration.php');
    exit();
} else{
    $queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."company
    (siren, company_name, email, created_at, updated_at)
    VALUES 
    (:siren, :company_name, :email, :created_at, :updated_at)");
    $queryPrepared->execute([
        "siren" => $siren,
        "company_name" => $name,
        "email" => $email,
        "created_at" => date("Y-m-d H:i:s"),
        "updated_at" => date("Y-m-d H:i:s")
    ]);
}

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
    $mail->addAddress($email, $name);

    // Ajouter le sujet et le corps du message
    $mail->Subject = 'Confirmez votre adresse mail';
    $mail->msgHTML($message);

    if($mail->send()) {
        $validation = "Votre entreprise a bien été enregistrée, vous allez recevoir un mail de confirmation";
        header('Location: /user/login.php?validation='.$validation);
        exit;
    } else {
        $validation = "Une erreur est survenue lors de l'envoi du mail de confirmation. Veuillez réessayer plus tard";
        header('Location: /user/login.php?validation='.$validation);
    }
?>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";
?>



