<?php 
    session_start();
    $pageTitle = "Nouvel utilisateur" . $_POST['email'];
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();




	if( count($_POST)!=7
	|| empty($_POST['firstname'])
	|| empty($_POST['lastname'])
	|| empty($_POST['email'])
	|| empty($_POST['pwd'])
	|| empty($_POST['pwdConfirm'])
	|| empty($_POST['phone_number'])
	|| empty($_POST['cgu']) 
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





//Si OK
if(empty($listOfErrors)){
	/* Insertion en BDD
	

les champs non rensignés sont enregistrées en base de données comme unset



	*/


	$connection = connectDB();






	$queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."user
											(firstname, lastname, email, pwd, phone_number, address, postal_code, scope, created_at, updated_at)
											VALUES 
											(:firstname, :lastname, :email, :pwd, :phone_number, :address, :postal_code, :scope, :created_at, :updated_at)");

	$queryPrepared->execute([
								"firstname"=>$firstname,
								"lastname"=>$lastname,
								"email"=>$email,
								"pwd" => password_hash($pwd, PASSWORD_DEFAULT),
                                "phone_number" =>$phone_number,
								"address" => 'unset',
								"postal_code" => '00000',
								"scope" => 1,
								"created_at" => date('Y-m-d H:i:s'),
								"updated_at" => date('Y-m-d H:i:s')
							]);




	//Redirection sur la page de connexion
	header('location: /user/login.php');

}else{

	//Si NOK
	//On stock les erreurs et la data
	$_SESSION['listOfErrors'] = $listOfErrors;
	unset($_POST["pwd"]);
	unset($_POST["pwdConfirm"]);
	$_SESSION['data'] = $_POST;
	//Redirection sur la page d'inscription
	header('location: /user/register.php');
}