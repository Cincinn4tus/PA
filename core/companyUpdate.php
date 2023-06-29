<?php

    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";

// récupérer les données du formulaire

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."company WHERE siren=:siren");
    $queryPrepared->execute(["siren"=>$_SESSION["siren"]]);
    $company = $queryPrepared->fetch();

    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $postal_code = $_POST["postal_code"];
    $city = $_POST["city"];
    $pwd = $_POST["pwd"];
    $pwdConfirm = $_POST["pwdConfirm"];
    $email = $company["email"];

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
            $error = "Les mots de passe ne correspondent pas";
        }
    }
    
    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("UPDATE ".DB_PREFIX."company SET phone_number=:phone_number, billing_address=:billing_address, billing_zipcode=:billing_zipcode, email=:email, pwd=:pwd WHERE siren=:siren");
    $queryPrepared->execute([
        "phone_number"=>$phone,
        "billing_address"=>$address,
        "billing_zipcode"=>$postal_code,
        "email"=>$email,
        "pwd"=>$pwd,
        "siren"=>$_SESSION["siren"]
    ]);

    header("Location: /index.php");