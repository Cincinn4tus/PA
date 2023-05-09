<?php
    session_start();
    $pageTitle = "Modifier l'utilisateur";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";


    // récupérer l'id de l'utilisateur à modifier depuis l'url
    $id = $_GET["id"];

    // récupérer les données de l'utilisateur à modifier
    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."user WHERE id=:id");
    $queryPrepared->execute(["id"=>$id]);
    $user = $queryPrepared->fetch();

    // affichage des données de l'utilisateur à modifier
?>




<div class="container mt-5">
    <div class="mx-auto col-lg-6">
        <h2 class="text-center">Modifications</h2>
    </div>
</div>

<!--
    Affichage des informations de l'utilisateur dans un formulaire :
        CREATE TABLE crowdhub.pa_user (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    phone_number char(10) NOT NULL,
    address VARCHAR(255) NOT NULL,
    postal_code VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    scope VARCHAR(255) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    siret VARCHAR(255) NULL
);

tous les champs sont disabled sauf email numéro et mot de passe
-->

