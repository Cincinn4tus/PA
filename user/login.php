<?php 
session_start();
$pageTitle = "CrowdHub - Connexion";
require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>


<div class="container mt-5" id="register">
  <div class="row">
    <div id="sign-in" class="col-lg-6">
      <h4>Déjà inscrit ?</h4>
      <form action="" method="POST" class="text-center col-lg-8 mt-5">
        <!-- login form -->
          <input type="email" name="email" id="email" class="form-control" placeholder="Votre email" required="required"><br>
          <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" required="required"><br>
          <input type="submit" value="Se connecter" class="btn btn-primary btn-block btn-lg">
      </form>
    </div>

    <div id="signup" class="col-lg-6 sign-up">
    <h4>Pas encore enregistré</h4>
        <div class="wrapper" id="signup-page">
            <article id="enterprise">
                <div class="overlay">
                    <h4>Entrepreneur</h4>
                    <p><small>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                    </small></p>
                    <a href="register.php" class="btn button-2">S'enregistrer</a>
                </div>
            </article>
            <article id="investor">
                <div class="overlay">
                    <h4>Investisseur</h4>
                    <p><small>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                    </small></p>
                    <a href="#" class="btn button-2">S'inscrire</a>
                </div>
            </article>

            <div class="clear"></div>
        </div>
    </div>
  </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>