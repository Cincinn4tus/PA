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

function checkRole(){
	if(isConnected()){
		if($_SESSION['role'] == 2){
			$link = "projects.php";
			$linkName = "Projets";
		} elseif($_SESSION['role'] == 1){
			$link = "creator.php";
			$linkName = "Créer un projet";
		} elseif($_SESSION['role'] == 0){
			$link = "admin/admin-dashboard.php";
			$linkName = "Administration";
		}
		return "<li class='nav-item'><a class='nav-link' href='".$link."'>".$linkName."</a></li>";
	} else {
		return "<li class='nav-item'><a class='nav-link' href='projects.php'>Découvrez nos projets</a></li>";
	}
}

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

// regroupe les fonctions savLogs et checkRole dans une seule fonction car elles sont appelées dans tous les fichiers
function headerFunctions(){
	saveLogs();
	checkRole();
}

