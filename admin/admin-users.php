<?php 
    session_start();
    $pageTitle = "Gestion des utilisateurs";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2>Utilisateurs</h2>
        <ol>
        <li><a href="/">Accueil</a></li>
        <li>Utilisateurs</li>
        </ol>
    </div>
    </div><!-- End Breadcrumbs -->


<div class="container-fluid">
    <?php
        $connection = connectDB();

        // Recherche par mot-clé
        $searchKeyword = isset($_GET['q']) ? $_GET['q'] : '';

        $query = "SELECT * FROM " . DB_PREFIX . "user";
        if (!empty($searchKeyword)) {
            $query .= " WHERE firstname LIKE '%$searchKeyword%' OR lastname LIKE '%$searchKeyword%'";
        }

        $results = $connection->query($query);
        $results = $results->fetchAll();
    ?>

    <!-- Barre de recherche -->
    <form action="" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Rechercher par nom ou prénom" value="<?php echo $searchKeyword; ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Rechercher</button>
            </div>
        </div>
    </form>




<div class="container-fluid">
    <?php
        $connection = connectDB();
        $results = $connection->query("SELECT * FROM ".DB_PREFIX."user");
        $results = $results->fetchAll();
    ?>

    <table id="user-array" class="table col-lg-12">
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

        <tbody id="results">
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
                        echo "<td>
                            <a href='admin-modify-user.php?id=".$user["id"]."' class='btn btn-primary'>Modifier</a>
                            <a href='admin-delete-user.php?id=".$user["id"]."' class='btn btn-danger'>Supprimer</a>
                            <a href='admin-details-user.php?id=".$user["id"]."' class='btn btn-secondary'>Détails</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>