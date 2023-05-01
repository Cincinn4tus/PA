<?php




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

/*

CREATE TABLE crowdhub.pa_logs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date DATETIME NOT NULL,
    heure DATETIME NOT NULL,
    ip VARCHAR(255) NOT NULL,
    page_visited VARCHAR(255) NOT NULL,
    user VARCHAR(255) NULL
);

fonction qui enregistre les logs dans la table pa_logs
page_visited = $pageTitle (figure tout en haut de chaque page)
*/

function saveLogs(){
	global $pageTitle;

	if(isConnected()){
		$user = $_SESSION['email'];
	} else {
		$user = "Non connecté";
	}

	$connection = connectDB();
	$queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."logs
											(visit_date, visit_hour, ip, page_visited, user)
											VALUES 
											(:visit_date, :visit_hour, :ip, :page_visited, :user)");

	$queryPrepared->execute([
								"visit_date"=>date("d/m/Y"),
								"visit_hour"=>date("H:i"),
								"ip"=>$_SERVER['REMOTE_ADDR'],
								"page_visited"=>$pageTitle,
								"user"=>$user
							]);
}
