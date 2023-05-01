<?php 
    session_start();
    $pageTitle = "Gestion des utilisateurs";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

<h1 class="text-center mt-5" id="main-title">
    Gestion des utilisateurs
</h1>

<!-- 

Boutons d'action:
- Ajouter un utilisateur
- Supprimer un utilisateur
- Modifier un utilisateur
-->

<div class="container-fluid text-center">
    <div class="mt-3">
        <a href="admin-add-user.php" class="btn btn-primary">Ajouter un utilisateur</a>
        <a href="admin-delete-user.php" class="btn btn-primary">Supprimer un utilisateur</a>
        <a href="admin-modify-user.php" class="btn btn-primary">Modifier un utilisateur</a>
    </div>
</div>

<div class="container-fluid">
    <?php
        $connection = connectDB();
        $results = $connection->query("SELECT * FROM ".DB_PREFIX."users");
        $results = $results->fetchAll()
    ?>

    






</div>