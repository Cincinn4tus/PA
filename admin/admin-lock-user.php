<?php

    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";


// récupérer l'id

$id = $_GET["id"];


// mettre à jour la colonne scope de la table user avec la valeur 4

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("UPDATE ".DB_PREFIX."user SET scope=4 WHERE id=:id");
    $queryPrepared->execute([
        "id"=>$id
    ]);

?>