<?php

function helloWorld(){
	echo "Hello World";
}


function cleanFirstname($firstName){
	return ucwords(strtolower(trim($firstName)));
}

function cleanLastname($lastName){
	return strtoupper(trim($lastName));
}

function cleanEmail($email){
	return strtolower(trim($email));
}


function connectDB(){

	try{
		$connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE.";port=".DB_PORT,DB_USER, DB_PWD);
	}catch(Exception $e){
		die("Erreur SQL ".$e->getMessage());
	}
	return $connection;
}



function isConnected(){
	if(!empty($_SESSION['email']) && !empty($_SESSION['login'])){
		return true;
	}
	return false;
}

// fonction isDeleted : vérifie si l'utilisateur supprimé est actuellement connecté et le déconnecte

function isDeleted($email){
	if(isConnected() && $_SESSION['email'] == $email){
		session_destroy();
	}
}


function redirectIfNotConnected(){
	if(!isConnected()){
		header("Location: login.php");
	}
}