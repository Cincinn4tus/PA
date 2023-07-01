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

$name = cleanFirstname($_POST['company_name']);
$siren = $_POST['siren'];
$postal_code = $_POST['postal_code'];
$city = $_POST['city'];
$address = $_POST['address'];
$phone_number = $_POST['phone'];
$sirenRegex = '/^[0-9]{9}$/';
$email = $_SESSION['email'];



$listOfErrors = [];

//Validation des données

	
	if (!preg_match($sirenRegex, $siren)) {
		$listOfErrors[] = "Le numéro de SIREN n'est pas valide";	
	}
	

//Si OK


	if (empty($listOfErrors)) {
	
		$connection = connectDB();
		$queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."company
												(siren, company_name, phone_number, billing_address, billing_zipcode, city, created_at, updated_at)
												VALUES
                                                (:siren, :company_name, :phone_number, :billing_address, :billing_zipcode, :city, NOW(), NOW())
                                                ");

        $queryPrepared->execute([
            "siren" => $siren,
            "company_name" => $name,
            "phone_number" => $phone_number,
            "billing_address" => $address,
            "billing_zipcode" => $postal_code,
            "city" => $city,
        ]);

		$connection = connectDB();
		$queryPrepared = $connection->prepare("UPDATE ".DB_PREFIX."user SET siren=:siren WHERE email=:email");
		$queryPrepared->execute([
			"siren" => $siren,
			"email" => $email
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
	header('location: /registration/completeCompany.php');
	}
