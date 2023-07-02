<?php
    session_start();
    require "/conf.inc.php";
    require "/core/functions.php";

    if (isset($_POST['file-name'])) {
        $file = $_POST['file-name'];
        unlink($_SERVER['DOCUMENT_ROOT'] . "/assets/img/captcha/" . $file);
    }
?>