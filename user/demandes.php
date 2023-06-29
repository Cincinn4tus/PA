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

$req = $connection->prepare("SELECT u.*, r.id_demandeur
        FROM " . DB_PREFIX . "user u
        INNER JOIN relation r ON r.id_receveur = :id AND r.statut = 1 AND r.id_demandeur = u.id");

$req->execute(array('id' => $_SESSION['id']));

$demandes = $req->fetchAll();
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <ol>
                <li><a href="/">Accueil</a></li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

<main id="main">
    <div class="container mt-5" id="demandes-list">
        <h2>Demandes d'amis</h2>
        <?php if (!empty($demandes)) : ?>
            <ul>
                <?php foreach ($demandes as $demande) : ?>
                    <li>
                        <?php echo $demande['firstname'] . ' ' . $demande['lastname']; ?>
                        <form method="post" action="traitement_demande.php">
                            <input type="hidden" name="demandeur_id" value="<?php echo $demande['id_demandeur']; ?>">
                            <input type="hidden" name="action" value="accepter">
                            <button type="submit">Accepter</button>
                        </form>
                        <form method="post" action="traitement_demande.php">
                            <input type="hidden" name="demandeur_id" value="<?php echo $demande['id_demandeur']; ?>">
                            <input type="hidden" name="action" value="refuser">
                            <button type="submit">Refuser</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>Aucune demande d'amis pour le moment.</p>
        <?php endif; ?>
    </div>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>
