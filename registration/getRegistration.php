<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Inscription";
  
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>
<?php
if(isset($_SESSION['listOfErrors'])){
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        <?php echo implode('<br>', $_SESSION['listOfErrors']);
                        // détruire la variable de session
                        unset($_SESSION['listOfErrors']);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<div class="container mt-5">
    <div class="row justify-content-center"> <!-- Ajout de la classe justify-content-center -->
        <h3 class="mt-5 text-center">Inscription</h3>
        <div class="col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Investisseur</h4>
                </div>
                <div class="card-body">
                    <p>
                        Inscription d'un investisseur
                    </p>
                    <a href="verify.php?scope=1" class="btn btn-danger">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Entreprise</h4>
                </div>
                <div class="card-body">
                    <p>
                        Enregistrement d'une entreprise
                    </p>
                    <a href="verify.php?scope=2" class="btn btn-danger">Voir</a>
                </div>
            </div>
        </div>
        <div class="mt-5"></div>
    </div>
</div>



<div class="fixed-bottom">
      <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
    ?>
</div>
