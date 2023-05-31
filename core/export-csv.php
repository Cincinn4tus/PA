<?php 
    session_start();
    $pageTitle = "Téléchargement des logs";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";


    $connection = connectDB();
    $results = $connection->query("SELECT * FROM ".DB_PREFIX."logs");
    $results = $results->fetchAll();
    
    // création d'un fichier csv
    $csv = "id;Utilisateur;Adresse IP;Date de visite;Heure de visite;Page visitée\n";
    foreach ($results as $logs) {
        $csv .= $logs["id"].";";
        $csv .= $logs["user"].";";
        $csv .= $logs["ip"].";";
        $csv .= $logs["visit_date"].";";
        $csv .= $logs["visit_hour"].";";
        $csv .= $logs["page_visited"]."\n";
    }
    
    // 3. Envoi du fichier CSV sans les headers
    $fileSize = strlen($csv);
    $fileName = 'logs.csv';
    
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $fileName);
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . $fileSize);
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    
    ob_clean();
    flush();
    echo $csv;
    exit;

    


?>