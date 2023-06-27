<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Inscription";
  
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

// récupérer les données du formulaire

$gender = $_POST["gender"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$birthdate = $_POST["birthdate"];
$message = "Merci de  valider votre adresse mail en cliquant sur le lien suivant : <a href='https://crowdhub.fr/user/completeProfile.php?email=".$email."'>Confirmer mon adresse mail</a>";


if(
    empty($_POST['gender']) ||
    empty($_POST['firstname']) ||
    empty($_POST['lastname']) ||
    empty($_POST['email']) ||
    empty($_POST['birthdate']) ||
    empty($_POST['cgu']) ||
    count($_POST) != 6
) {
    $error = "Merci de remplir tous les champs";
    header('Location: /user/sendRegistration.php');
    exit;
}

$firstname = cleanFirstname($_POST['firstname']);
$lastname = cleanLastname($_POST['lastname']);
$email = cleanEmail($_POST['email']);

$connection = connectDB();
$queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
$queryPrepared->execute([ "email" => $email ]);

$results = $queryPrepared->fetch();

if(!empty($results)){
    $listOfErrors[] = "L'email n'est pas valide";
}
if(!empty($listOfErrors)){
    $_SESSION['listOfErrors'] = $listOfErrors;
    $_SESSION['data'] = $_POST;
    header('Location: /user/sendRegistration.php');
    exit();
} else{
    $queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."user
    (firstname, lastname, email, gender, birthdate, scope, created_at, updated_at)
    VALUES 
    (:firstname, :lastname, :email, :gender, :birthdate, :scope, :created_at, :updated_at)");
    $queryPrepared->execute([
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "gender" => $gender,
        "birthdate" => $birthdate,
        "scope" => 1,
        "created_at" => date('Y-m-d H:i:s'),
        "updated_at" => date('Y-m-d H:i:s')
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
    $mail->addAddress($email, $firstname . ' ' . $lastname);

    // Ajouter le sujet et le corps du message
    $mail->Subject = 'Confirmez votre adresse mail';
    $mail->msgHTML($message);

    if($mail->send()) {
        $validation = "Votre compte a bien été créé, vous allez recevoir un mail de confirmation";
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



