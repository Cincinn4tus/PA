<?php 
    session_start();
    $pageTitle = "Captchas";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    if(!isConnected() || $user['scope'] != 0){
        header("Location: /errors/403.php");
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


            // Vérifie si le fichier existe
            if(file_exists($target_file)) {
                // Supprime le fichier
                if(unlink($target_file)) {
                    echo "Le fichier " . $file_name . " a été supprimé.";
                } else {
                    echo "Désolé, une erreur s'est produite lors de la suppression du fichier.";
                }
            } else {
                echo "Désolé, le fichier n'existe pas.";
            }
        
?>