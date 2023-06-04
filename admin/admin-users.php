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



    <div class="row mt-4">
        <div class="col-lg-3 mx-auto">
            <input class="form-control" type="text" id="email" name="email" placeholder="Saisir l'email" onkeyup="getdata();">
    </div>

    <div id="all-users" class="mt-2 text-center">
            <a href="/admin/admin-users.php">
                <button class="btn btn-info">
                    Tout afficher
                </button>
            </a>
        </div>
    </div>





<div id="results" class="mt-5">
    <?php 
        if(!isset($_GET["email"])); {
            include($_SERVER['DOCUMENT_ROOT'] ."/admin/userArray.php");
        }
    ?>
</div>



<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>


