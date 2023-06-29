<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Connexion";
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

$connection = connectDB();

if (!isset($_SESSION['id'])) {
    header('Location: /user/membres.php');
    exit;
}

$req = $connection->prepare("SELECT u.*
        FROM " . DB_PREFIX . "user u
        LEFT JOIN relation r ON (r.id_demandeur = u.id OR r.id_receveur = u.id) AND r.statut = 2 AND (r.id_demandeur = :id OR r.id_receveur = :id)
        WHERE (r.id_demandeur IS NOT NULL OR r.id_receveur IS NOT NULL) AND u.id <> :id");

$req->execute(array('id' => $_SESSION['id']));

$amis = $req->fetchAll();
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Amis</h2>
            <ol>
                <li><a href="/">Accueil</a></li>
                <li>Amis</li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container-fluid">
        <table id="amis-array" class="table col-lg-12">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                </tr>
            </thead>

            <tbody id="results">
                <?php
                foreach ($amis as $ami) {
                    echo "<tr>";
                    echo "<td>" . $ami["lastname"] . "</td>";
                    echo "<td>" . $ami["firstname"] . "</td>";
                    echo "<td><a href='voirprofile.php?id=" . $ami["id"] . "' class='btn btn-secondary'>Voir Profil</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>
