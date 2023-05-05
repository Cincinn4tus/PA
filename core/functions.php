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

	function getUserInfos(){
		if(!isConnected()){
			return false;
		} else {
			$pdo = connectDB();
			$queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
			$queryPrepared->execute(["email"=>$_SESSION['email']]);
			$user = $queryPrepared->fetch();

			$_SESSION['firstname'] = $user['firstname'];
			$_SESSION['lastname'] = $user['lastname'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['phone_number'] = $user['phone_number'];
			$_SESSION['id'] = $user['id'];
			$_SESSION['scope'] = $user['scope'];
		}
	}



