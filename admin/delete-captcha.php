<?php
    session_start();
    require "/conf.inc.php";
    require "/core/functions.php";
    
    if (isset($_POST['file-name'])) {
        $file = $_POST['file-name'];
        $path = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/captcha/" . $file;
        if(file_exists($path)) {
            unlink($path);
        } else {
            echo "Le fichier $file n'existe pas dans le répertoire /assets/img/captcha/.";
        }
    }
?>
