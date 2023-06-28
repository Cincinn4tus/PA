<?php

    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";

// récupérer les données du formulaire

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
    $queryPrepared->execute(["email"=>$_SESSION["email"]]);
    $user = $queryPrepared->fetch();

    $userId = $user["id"];
    $phone = $_POST["phone_number"];
    $address = $_POST["postal_address"];
    $postal_code = $_POST["postal_code"];
    $email = $user["email"];
    $scope = $_POST["scope"];
    $pwd = $user["pwd"];
    $pwdConfirm = $_POST["pwdConfirm"];

    // nettoyage
    $id = trim(strip_tags($userId));
    $phone = trim(strip_tags($phone));
    $address = trim(strip_tags($address));
    $postal_code = trim(strip_tags($postal_code));
    $email = trim(strip_tags($email));
    $scope = trim(strip_tags($scope));
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

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("UPDATE ".DB_PREFIX."user SET phone_number=:phone, postal_address=:postal_address, postal_code=:postal_code, email=:email, scope=:scope, pwd=:pwd WHERE id=:id");
    $queryPrepared->execute([
        "phone"=>$phone,
        "postal_address"=>$address,
        "postal_code"=>$postal_code,
        "email"=>$email,
        "scope"=>$scope,
        "pwd"=>$pwd,
        "id"=>$id
    ]);
    header("Location: /index.php");
?>