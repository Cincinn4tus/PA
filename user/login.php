<?php 
session_start();
$pageTitle = "Connexion";
require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
saveLogs();
?>

<!-- Login form -->

<div class="container mt-5">
    <div class="row col-lg-4 m-auto text-center">
        <h4>Je me connecte</h4>
        <form action="" method="POST" class="mt-4">
            <input class="form-control" type="email" name="email" placeholder="Votre email" required="required">
            <input class="form-control mt-2" type="password" name="password" placeholder="Votre mot de passe" required="required">
        </form>
    </div>
    <div class="row mt-5 col-lg-4 m-auto text-center">
        <h4>Pas encore inscrit ?</h4>
        <form action="" method="POST" class="mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <input type="radio" class="form-check-input" value="0"  <?= ( !empty($_SESSION["data"]) && $_SESSION["data"]["gender"]==0)?"checked":""; ?> name="gender" id="genderM">
                    <label for="genderM" class="form-label"> M.</label> 
                    
                    <input type="radio" class="form-check-input" value="1"
                    <?= ( !empty($_SESSION["data"]) && $_SESSION["data"]["gender"]==1)?"checked":""; ?> name="gender" id="genderMme">
                    <label for="genderMme" class="form-label"> Mme. </label>

                    <input type="radio" class="form-check-input" value="2"
                    <?= ( !empty($_SESSION["data"]) && $_SESSION["data"]["gender"]==2)?"checked":""; ?> name="gender" id="genderO">
                    <label for="genderO" class="form-label"> Autre</label>
                </div>
            </div>
            <div class="row mt-2">

                <div class="mt-2">
                    <!-- list of countries -->
                    <select name="country" class="form-control">
                        <option value="">Type de compte</option>
                        <option value="enterprise">Entreprise</option>
                        <option value="individual">Investisseur</option>
                    </select>
                </div>

                <div class="mt-2">
                    <input type="text" class="form-control" name="firstname" placeholder="Votre prénom" required="required" 
                    value="<?= ( !empty($_SESSION["data"]))?$_SESSION["data"]["firstname"]:""; ?>">
                </div>

                <div class="mt-2">
                    <input type="text" class="form-control" name="lastname" placeholder="Votre nom" required="required"
                    value="<?= ( !empty($_SESSION["data"]))?$_SESSION["data"]["lastname"]:""; ?>">
                </div>
                <div class="mt-2">
                    <input type="email" class="form-control" name="email" placeholder="Votre email" required="required"
                    value="<?= ( !empty($_SESSION["data"]))?$_SESSION["data"]["email"]:""; ?>">
                </div>
                <div class="mt-2">
                    <input type="submit" class="btn btn-primary" name="submit" value="Je m'inscris">
                </div>
            </div>
        </form>
    </div>
</div>




<div class="fixed-bottom">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>
</div>
