<?php 
    session_start();
    $pageTitle = "Téléchargement des logs";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";


    // 1. Connexion à la base de données
$connection = connectDB();

// 2. Récupération des données
$results = $connection->query("SELECT * FROM ".DB_PREFIX."logs");
$results = $results->fetchAll();

// création d'un fichier csv
$csv = "id;user;ip;visit_date;visit_hour;page_visited\n";
foreach ($results as $logs) {
    $csv .= $logs["id"].";";
    $csv .= $logs["user"].";";
    $csv .= $logs["ip"].";";
    $csv .= $logs["visit_date"].";";
    $csv .= $logs["visit_hour"].";";
    $csv .= $logs["page_visited"]."\n";
}

// 4. Envoi du fichier CSV sans les headers

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=logs.csv');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . strlen($csv));
echo $csv;


?>