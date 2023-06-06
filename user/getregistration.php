<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Accueil";
  saveLogs();
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>
  <main id="main">
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

    <h2>Inscription</h2>
    <ol>
      <li><a href="/">Accueil</a></li>
      <li>Inscription</li>
    </ol>

  </div>
</div><!-- End Breadcrumbs -->



<div class="container mt-5">
    <div class="row">
        <h3 class="mt-5">Inscription</h3>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Investisseur</h4>
                </div>
                <div class="card-body">
                    <p>
                        Inscription d'un investisseur
                    </p>
                    <a href="#sendRegistrationForm" class="btn btn-danger">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Entreprise</h4>
                </div>
                <div class="card-body">
                    <p>
                        Enregistrement d'une entreprise
                    </p>
                    <a href="#sendRegistrationForm" class="btn btn-danger">Voir</a>
                </div>
            </div>
        </div>
        <div class="mt-5"></div>
    </div>
</div>


<div class="fixed-bottom">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>
</div>
