<?php
session_start();
require "functions.php";


if (count($_POST) != 12 // Update the number of expected POST parameters
	|| empty($_POST['firstname'])
	|| empty($_POST['lastname'])
	|| empty($_POST['email'])
	|| empty($_POST['pwd'])
	|| empty($_POST['pwdConfirm'])
	|| empty($_POST['cgu']) //check if checkbox is checked
	|| empty($_POST['projetsInvestis']) 
	&& empty($_POST['projetFait'])
	|| empty($_POST['Phone_numberE']) 
	|| empty($_POST['Siret']) 
	|| empty($_POST['nameEntreprise']) 
	|| !isset($_POST['EntrepreneurCheck']) && !isset($_POST['InvestisseurCheck']) 
	){
	die ("Tentative de HACK");
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

$phone_numberE = $_POST['Phone_numberE'];
$siret = $_POST['Siret'];
$nameEntreprise = $_POST['nameEntreprise'];
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
		$listOfErrors[] = "L'email n'est pas valide";
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
if(!preg_match("#^[0-9]{14}$#", $siret)){
	$listOfErrors[] = "Le SIRET est incorrect";
}

if(!isset($_POST['captcha_solved']) || $_POST['captcha_solved'] != '1'){
    $listOfErrors[] = "Le captcha doit être résolu";
}

//Si OK

	if (empty($listOfErrors)) {
	
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
													"entrepreneurCheck" => $entrepreneurCheck, // add these
													"investisseurCheck" => $investisseurCheck, // add these
													"cgu" => $cgu // add this
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
	header('location: /registration/register.php');
	}
