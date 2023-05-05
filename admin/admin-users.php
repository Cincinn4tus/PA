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
        $results = $connection->query("SELECT * FROM ".DB_PREFIX."user");
        $results = $results->fetchAll();
    ?>

    <table class="table col-lg-12">
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Rôle</th>
                <th>Date de création</th>
                <th>Date de modification</th>
                <th>Actions</th>

            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($results as $user) {
                    echo "<tr>";
                        echo "<td>".$user["id"]."</td>";
                        echo "<td>".$user["lastname"]."</td>";
                        echo "<td>".$user["firstname"]."</td>";
                        echo "<td>".$user["email"]."</td>";
                        echo "<td>".$user["address"]."</td>";
                        echo "<td>".$user["postal_code"]."</td>";
                        echo "<td>".$user["scope"]."</td>";
                        echo "<td>".$user["created_at"]."</td>";
                        echo "<td>".$user["updated_at"]."</td>";
                        // ajouter trois boutons pour modifier, supprimer et voir les détails de l'utilisateur
                        echo "<td>
                            <a href='admin-modify-user.php?id=".$user["id"]."' class='btn btn-primary'>Modifier</a>
                            <a href='admin-delete-user.php?id=".$user["id"]."' class='btn btn-danger'>Supprimer</a>
                            <a href='admin-details-user.php?id=".$user["id"]."' class='btn btn-secondary'>Détails</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    






</div>