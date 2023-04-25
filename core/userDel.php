<?php
  session_start();
  require $_SERVER['document_root'] . "/conf.inc.php";
  require $_SERVER['document_root'] . "/core/functions.php";
  redirectIfNotConnected(); 

  $connection = connectDB();
  $queryPrepared = $connection->prepare("DELETE FROM ".DB_PREFIX."user WHERE id=:id");
  $queryPrepared->execute(["id"=>$_GET['id']]);


  header("Location: ../users.php");

?>