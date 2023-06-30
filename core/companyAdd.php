<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
/*
company_name VARCHAR(45) NOT NULL,
phone_number INT(10),
billing_address VARCHAR(120),
billing_zipcode INT(5),
city VARCHAR(30),

*/


if (
    empty($_POST['company_name']) ||
    empty($_POST['siren']) ||
    empty($_POST['postal_code']) ||
    empty($_POST['city']) ||
    empty($_POST['address']) ||
    empty($_POST['phone'])
) {
    header('location: /registration/complete-profile-company.php');
    exit;
}

//Nettoyage des données

$firstname = cleanFirstname($_POST['firstname']);
$lastname = cleanLastname($_POST['name']);
$phone_number = $_POST['phone_number'];
$email = cleanEmail($_POST['email']);


$listOfErrors = [];

	$connection = connectDB();
	$queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
	$queryPrepared->execute([ "email" => $email ]);

	$results = $queryPrepared->fetch();
	
	if(!empty($results)){
		$listOfErrors[] = "L'email n'est pas valide";
	}


if(!preg_match("#^[0-9]{14}$#", $siret)){
	$listOfErrors[] = "Le SIRET est incorrect";
}

//Si OK


	if (empty($listOfErrors)) {
	
		$queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."company
												(siren, company_name, phone_number, billing_address, billing_zipcode, city)
												VALUES
                                                (:siren, :company_name, :phone_number, :billing_address, :billing_zipcode, :city)
                                                ");

        $queryPrepared->execute([
            "siren" => $siren,
            "company_name" => $nameEntreprise,
            "phone_number" => $phone_numberE,
            "billing_address" => $address,
            "billing_zipcode" => $postal_code,
            "city" => $city,
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
	header('location: /registration/register.php');
	}
