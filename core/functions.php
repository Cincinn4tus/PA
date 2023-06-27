<?php

ini_set('display_errors', 1);


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
		$ip = '77.159.252.140';

		$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
		if($query && $query['status'] == 'success'){
			$region = $query['region'];
		}

		$connection = connectDB();
		$queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."logs
												(visit_date, visit_hour, ip, region, page_visited, user)
												VALUES 
												(:visit_date, :visit_hour, :ip, :region, :page_visited, :user)");
		$queryPrepared->execute([
									"visit_date"=>date("d/m/Y"),
									"visit_hour"=>date("H:i"),
									"ip"=>$ip,
									"region"=>$region,
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

	function todayLogs(){
		$connection = connectDB();
		$results = $connection->query("SELECT * FROM ".DB_PREFIX."logs");
		$results = $results->fetchAll();
		if ($results !== null) {
			$todayLogs = 0;
			foreach ($results as $logs) {
				if ($logs['visit_date'] == date("d/m/Y")) {
					$todayLogs++;
				}
			}
			echo "Visites aujourd'hui : " . $todayLogs;
		} else {
			echo "Aucun résultat trouvé.";
		}
	}

	function countLogs(){
		$connection = connectDB();
		$results = $connection->query("SELECT * FROM ".DB_PREFIX."logs");
		$results = $results->fetchAll();
		if ($results !== null) {
			echo "Visites totales : " . count($results);
		} else {
			echo "Aucun résultat trouvé.";
		}
	}


	// calcul vitesse de chargement de la page

	function page_load_time(){
		global $pageTitle;

		$loadTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
		// deux chiffres après virgule pour $loadTime

		$loadTime = round($loadTime, 2);


		// Si la page existe dans la table pa_performance, on fait une moyenne des temps de chargement

		$connection = connectDB();
		$queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."performance WHERE page=:page");
		$queryPrepared->execute(["page" => $pageTitle]);
		$results = $queryPrepared->fetch();
		
		if ($results !== false) {
			// La page existe déjà, effectuer la mise à jour
			$sumTime = ($loadTime + $results['time']) / 2;
			$queryPrepared = $connection->prepare("UPDATE ".DB_PREFIX."performance SET time=:time WHERE page=:page");
			$queryPrepared->execute(["time" => $sumTime, "page" => $pageTitle]);
		} else {
			// La page n'existe pas, effectuer l'insertion
			$time = $loadTime;
			$queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."performance (page, time) VALUES (:page, :time)");
			$queryPrepared->execute([
				"page" => $pageTitle,
				"time" => $time
			]);
		}
	}		

	function average_load_time(){
		// Moyenne de tous les time de la table pa_preformance arrondi à 2 chiffres après la virgule

		$connection = connectDB();
		$queryPrepared = $connection->prepare("SELECT time FROM ".DB_PREFIX."performance");
		$queryPrepared->execute();
		$time = $queryPrepared->fetchAll();

		$results = 0;
		foreach($time as $time){
			$results = round(array_sum($time)/count($time), 2);
		}

		echo "Temps de chargement moyen : ". $results . " secondes";
	}
