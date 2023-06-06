<?php
session_start();
require "functions.php";

$listOfErrors = [];

// Fields common to both Entrepreneur and Investor
$requiredFields = ['firstname', 'lastname', 'email', 'pwd', 'pwdConfirm', 'phone_number', 'cgu'];

// Fields specific to Entrepreneur
$entrepreneurFields = ['Phone_numberEE', 'SiretEE', 'nameEntrepriseEE'];

// Fields specific to Investor
$investorFields = ['Phone_numberEI', 'SiretEI', 'nameEntrepriseEI'];

$roleFields = [];

// Check if a role is selected and get role specific fields
$entrepreneurCheck = isset($_POST['EntrepreneurCheck']) ? '1' : '0';
$investisseurCheck = isset($_POST['InvestisseurCheck']) ? '1' : '0';

// Check if both are selected or none are selected
if (($entrepreneurCheck == '1' && $investisseurCheck == '1') || ($entrepreneurCheck != '1' && $investisseurCheck != '1')) {
    $listOfErrors[] = "Vous devez sélectionner soit entrepreneur soit investisseur, mais pas les deux";
}

if ($entrepreneurCheck == '1') {
    $roleFields = $entrepreneurFields;
} elseif ($investisseurCheck == '1') {
    $roleFields = $investorFields;
}

// Check if all required fields are present
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        $listOfErrors[] = "Le champ " . $field . " est obligatoire";
    }
}

if ($entrepreneurCheck = '1' xor $investisseurCheck = '1') {
    $listOfErrors[] = "Vous devez être soit un entrepreneur soit un investisseur";
}







// Nettoyage des données
$firstname = cleanFirstname($_POST['firstname']);
$lastname = cleanLastname($_POST['lastname']);
$email = cleanEmail($_POST['email']);
$pwd = $_POST['pwd'];
$pwdConfirm = $_POST['pwdConfirm'];
$phone_number = $_POST['phone_number'];
$projetFait = $_POST['projetFait'];
$projetsInvestis = $_POST['projetsInvestis'];
$Phone_numberEE = $_POST['Phone_numberEE'];
$SiretEE = $_POST['SiretEE'];
$nameEntrepriseEE = $_POST['nameEntrepriseEE'];
$Phone_numberEI = $_POST['Phone_numberEI'];
$SiretEI = $_POST['SiretEI'];
$nameEntrepriseEI = $_POST['nameEntrepriseEI'];
$entrepreneurCheck = isset($_POST['EntrepreneurCheck']) ? $_POST['EntrepreneurCheck'] : '0';
$investisseurCheck = isset($_POST['InvestisseurCheck']) ? $_POST['InvestisseurCheck'] : '0';
$cgu = isset($_POST['cgu']) ? $_POST['cgu'] : '0';

$phone_numberE = null;
$siret = null;
$nameEntreprise = null;


// Vérification du captcha
if ($_POST['captcha_solved'] != '1') {
    $listOfErrors[] = "Le captcha doit être résolu";
}

// Vérification de la complexité du mot de passe
if (strlen($pwd) < 8 || !preg_match("#[a-z]#", $pwd) || !preg_match("#[A-Z]#", $pwd) || !preg_match("#[0-9]#", $pwd)) {
    $listOfErrors[] = "Le mot de passe doit faire au moins 8 caractères avec des minuscules, des majuscules et des chiffres";
}

// Vérification de la correspondance entre le mot de passe et sa confirmation
if ($pwd != $pwdConfirm) {
    $listOfErrors[] = "La confirmation du mot de passe ne correspond pas";
}


// Vérification de l'unicité de l'email
$connection = connectDB();
$queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
$queryPrepared->execute(["email" => $email]);
$results = $queryPrepared->fetch();

if (!empty($results)) {
    $listOfErrors[] = "L'email est déjà utilisé";
}

// Si aucune erreur, enregistrement de l'utilisateur
if (empty($listOfErrors)) {
    // Determine if the user is an entrepreneur or an investor and save data accordingly
    if ($entrepreneurCheck == '1') {
        $phone_numberE = $Phone_numberEE;
        $siret = $SiretEE;
        $nameEntreprise = $nameEntrepriseEE;
    } elseif ($investisseurCheck == '1') {
        $phone_numberE = $Phone_numberEI;
        $siret = $SiretEI;
        $nameEntreprise = $nameEntrepriseEI;
    }

    $queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."user
        (firstname, lastname, email, pwd, phone_number, projetsInvestis, projetFait, phone_numberE, siret, nameEntreprise, entrepreneurCheck, investisseurCheck)
        VALUES 
        (:firstname, :lastname, :email, :pwd, :phone_number, :projetsInvestis, :projetFait, :phone_numberE, :siret, :nameEntreprise, :entrepreneurCheck, :investisseurCheck)");
    $queryPrepared->execute([
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "pwd" => password_hash($pwd, PASSWORD_DEFAULT),
        "phone_number" => $phone_number,
        "projetsInvestis" => $projetsInvestis,
        "projetFait" => $projetFait,
        "phone_numberE" => $phone_numberE,
        "siret" => $siret,
        "nameEntreprise" => $nameEntreprise,
        "entrepreneurCheck" => $entrepreneurCheck,
        "investisseurCheck" => $investisseurCheck,
    ]);

    // Redirection sur la page de connexion
    header('location: ../user/login.php');
} else {
    // Si des erreurs sont présentes, stockage des erreurs et des données
    $_SESSION['listOfErrors'] = $listOfErrors;
    unset($_POST["pwd"]);
    unset($_POST["pwdConfirm"]);
    $_SESSION['data'] = $_POST;
    // Redirection sur la page d'inscription
    header('location: ../user/register.php');
}
