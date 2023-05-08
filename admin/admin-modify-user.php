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
