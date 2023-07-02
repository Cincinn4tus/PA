<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";

    if (isset($_POST['file-name'])) {
        try {
            $file = $_POST['file-name'];
            $path = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/captcha/" . $file;
            if(file_exists($path)) {
                unlink($path);
            } else {
                echo "Le fichier $file n'existe pas dans le répertoire /assets/img/captcha/.";
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
?>