<?php
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    if(isConnected() && $_SESSION['email'] == $email){
		session_destroy();
	}
    header("Location: /index.php");
    ?>