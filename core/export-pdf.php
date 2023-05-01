<?php 
    session_start();
    $pageTitle = "Téléchargement des logs";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

    
// exportation des données en PDF format A4 adapté à l'impression


// 1. Connexion à la base de données
$connection = connectDB();

// 2. Récupération des données
$results = $connection->query("SELECT * FROM ".DB_PREFIX."logs");
$results = $results->fetchAll();

// création d'un fichier pdf sans la librairie FPDF

$pdf = "id;user;ip;visit_date;visit_hour;page_visited\n";
foreach ($results as $logs) {
    $pdf .= $logs["id"].";";
    $pdf .= $logs["user"].";";
    $pdf .= $logs["ip"].";";
    $pdf .= $logs["visit_date"].";";
    $pdf .= $logs["visit_hour"].";";
    $pdf .= $logs["page_visited"]."\n";
}

// 4. Envoi du fichier PDF sans les headers

header("Content-type: application/pdf");
header("Content-disposition: attachment; filename=logs.pdf");
echo $pdf;




?>