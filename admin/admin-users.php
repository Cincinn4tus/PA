<?php 
    session_start();
    $pageTitle = "Gestion des utilisateurs";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    if(!isConnected() || $user['scope'] != 0){
        header("Location: /errors/403.php");
        }
?>






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



<div class="fixed-bottom">
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
    ?>
</div>

