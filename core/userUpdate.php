<?php
// récupérer les données du formulaire
    $userId = $_GET["id"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $postal_code = $_POST["postal_code"];
    $email = $_POST["email"];
    $scope = $_POST["scope"];
    $pwd = $_POST["pwd"];
    $pwdConfirm = $_POST["pwdConfirm"];


    // nettoyage
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
    $queryPrepared = $pdo->prepare("UPDATE ".DB_PREFIX."user SET phone_number=:phone, address=:address, postal_code=:postal_code, email=:email, scope=:scope, pwd=:pwd WHERE id=:id");
    $queryPrepared->execute([
        "phone"=>$phone,
        "address"=>$address,
        "postal_code"=>$postal_code,
        "email"=>$email,
        "scope"=>$scope,
        "pwd"=>$pwd,
        "id"=>$id
    ]);
    header("Location: admin-users.php");
?>