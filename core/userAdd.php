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

// Determine the role of the user and update the list of required fields accordingly
if (isset($_POST['EntrepreneurCheck'])) {
    $roleFields = $entrepreneurFields;
} elseif (isset($_POST['InvestisseurCheck'])) {
    $roleFields = $investorFields;
} else {
    die("Tentative de HACK");
}

// Check if all required fields are present
foreach (array_merge($requiredFields, $roleFields) as $field) {
    if (empty($_POST[$field])) {
        die("Tentative de HACK");
    }
}

//Nettoyage des données

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

$entrepreneurCheck = $_POST['EntrepreneurCheck'];
$investisseurCheck = $_POST['InvestisseurCheck'];



$cgu = $_POST['cgu']; 
$entrepreneurCheck = $_POST['EntrepreneurCheck'];
$investisseurCheck = $_POST['InvestisseurCheck'];


if ($entrepreneurCheck != '1' && $investisseurCheck != '1'){
	$listOfErrors[] = "Vous devez être soit un entrepreneur soit un investisseur";
}



$listOfErrors = [];

// --> Est-ce que le genre est cohérent

// --> Nom plus de 2 caractères
if(strlen($lastname) < 2){
	$listOfErrors[] = "Le nom doit faire plus de 2 caractères";
}

// --> Prénom plus de 2 caractères
// --> Nom plus de 2 caractères
if(strlen($firstname) < 2){
	$listOfErrors[] = "Le prénom doit faire plus de 2 caractères";
}
// --> Format de l'email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$listOfErrors[] = "L'email est incorrect";
}else{
	// --> Unicité de l'email (plus tard)
	$connection = connectDB();
	$queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
	$queryPrepared->execute([ "email" => $email ]);

	$results = $queryPrepared->fetch();
	
	if(!empty($results)){
		$listOfErrors[] = "L'email est déjà utilisé";
	}

}


// --> Complexité du pwd
if(strlen($pwd) < 8
 || !preg_match("#[a-z]#", $pwd)
 || !preg_match("#[A-Z]#", $pwd)
 || !preg_match("#[0-9]#", $pwd)){
	$listOfErrors[] = "Le mot de passe doit faire au min 8 caractères avec des minuscules, des majuscules et des chiffres";
}


// --> Meme mot de passe de confirmation
if( $pwd != $pwdConfirm){
	$listOfErrors[] = "La confirmation du mot de passe ne correspond pas";
}


if(!isset($_POST['captcha_solved']) || $_POST['captcha_solved'] != '1'){
    $listOfErrors[] = "Le captcha doit être résolu";
}

//Si OK

if (empty($listOfErrors)) {
    // Determine if the user is an entrepreneur or an investor and save data accordingly
    if (isset($_POST['EntrepreneurCheck'])) {
        $phone_numberE = $Phone_numberEE;
        $siret = $SiretEE;
        $nameEntreprise = $nameEntrepriseEE;
    } elseif (isset($_POST['InvestisseurCheck'])) {
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
        "projetsInvestis" => $projetsInvestis ?? null, // if not set, set to null
        "projetFait" => $projetFait ?? null, // if not set, set to null
        "phone_numberE" => $phone_numberE,
        "siret" => $siret,
        "nameEntreprise" => $nameEntreprise,
        "entrepreneurCheck" => $entrepreneurCheck,
        "investisseurCheck" => $investisseurCheck,
    ]);

		//Redirection sur la page de connexion
		header('location: ../user/login.php');

	}else{
	//Si NOK
	//On stock les erreurs et la data
	$_SESSION['listOfErrors'] = $listOfErrors;
	unset($_POST["pwd"]);
	unset($_POST["pwdConfirm"]);
	$_SESSION['data'] = $_POST;
	//Redirection sur la page d'inscription
	header('location: ../user/register.php');
	}
