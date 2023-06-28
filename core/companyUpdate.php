<?php

    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";

// récupérer les données du formulaire

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."company WHERE siren=:siren");
    $queryPrepared->execute(["siren"=>$_SESSION["siren"]]);
    $user = $queryPrepared->fetch();

    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $postal_code = $_POST["postal_code"];
    $city = $_POST["city"];
    $pwd = $_POST["pwd"];

    // nettoyage
    $phone = trim(strip_tags($phone));
    $address = trim(strip_tags($address));
    $postal_code = trim(strip_tags($postal_code));
    $pwd = trim(strip_tags($pwd));
    $pwdConfirm = trim(strip_tags($pwdConfirm));
    if(!empty($pwd) && !empty($pwdConfirm)){
        if($pwd == $pwdConfirm){
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        } else {
            echo "Les mots de passe ne correspondent pas";
        }
    } else {
        $pwd = $user["pwd"];
    }