<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Inscription";
  saveLogs();
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

  $validation = "Si votre adresse mail est valide, vous allez recevoir un lien pour réinitialiser votre mot de passe";


  if(empty($_POST['email']) || count ($_POST) != 1){
    header('Location: /user/login.php');
    exit;
  }

    $email = cleanEmail($_POST['email']);

    $connection = connectDB();
    $queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
    $queryPrepared->execute([ "email" => $email ]);

    $results = $queryPrepared->fetch();

    if(empty($results)){
        header('Location: /user/login.php?validation='.$validation);
        exit;
    }

    $token = uniqid();
    $queryPrepared = $connection->prepare("UPDATE ".DB_PREFIX."user SET token=:token WHERE email=:email");
    $queryPrepared->execute([
        "token" => $token,
        "email" => $email
    ]);

    $message = "Pour réinitialiser votre mot de passe, cliquez sur le lien suivant : <a href='https://crowdhub.fr/user/resetPwd.php?token=".$token."'>Réinitialiser mon mot de passe</a>";

    mail($email, "Réinitialisation de votre mot de passe", $message);
    

    header('Location: /user/login.php?validation='.$validation);