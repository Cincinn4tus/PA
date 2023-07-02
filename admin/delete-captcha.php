<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT']. "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT']. "/core/functions.php";
    
    if (isset($_POST['file-name'])) {
        $file = $_POST['file-name'];
        $file_path = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/captcha/" . $file;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
?>
