<?php
  session_start();
  $pageTitle = "Suppression d'un utilisateur" . $_GET['id'];
  require $_SERVER['document_root'] . "/conf.inc.php";
  require $_SERVER['document_root'] . "/core/functions.php";
  redirectIfNotConnected(); 
  saveLogs();

  $connection = connectDB();
  $queryPrepared = $connection->prepare("DELETE FROM ".DB_PREFIX."user WHERE id=:id");
  $queryPrepared->execute(["id"=>$_GET['id']]);


  header("Location: /indexsssssss.php");

?>