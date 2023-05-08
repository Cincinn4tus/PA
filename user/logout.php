<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
	unset($_SESSION['email']);
	unset($_SESSION['login']);
	header("Location: /index.php");