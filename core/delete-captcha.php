<?php
    session_start();
    require "../conf.inc.php";
    require "../core/functions.php";

    if (isset($_POST['file-name'])) {
        $file = $_POST['file-name'];
        unlink("../assets/img/captcha/" . $file);
    }
?>