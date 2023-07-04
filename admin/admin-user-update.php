<?php

    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";

// récupérer les données du formulaire

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
    $queryPrepared->execute(["email"=>$_SESSION["email"]]);
    $user = $queryPrepared->fetch();

    $id = $_POST["id"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $postal_code = $_POST["postal_code"];
    $email = $_POST["email"];
    $scope = $_POST["scope"];
    $city = $_POST["city"];

    
    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("UPDATE ".DB_PREFIX."user SET phone_number=:phone_number, postal_address=:postal_address, postal_code=:postal_code, email=:email, scope=:scope, city=:city WHERE id=:id");
    $queryPrepared->execute([
        "id"=>$id,
        "phone_number"=>$phone,
        "postal_address"=>$address,
        "postal_code"=>$postal_code,
        "email"=>$email,
        "scope"=>$scope,
        "city"=>$city
    ]);


    if($scope == 2 && !isset($user["siren"])){
        header ("Location: /registration/completeCompany.php");
    } else {
        header ("Location: /admin/admin-users.php");
    }
