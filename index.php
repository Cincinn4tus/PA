<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "CrowdHub";
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

<div class="container-fluid" id="hero">
  <div id="hero-cover">
    <div class="row text-center mt-5 col-lg-8" id="hero-content">
      <h1>Financer l'innovation ensemble</h1>

      <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta harum accusamus ratione id similique. Quia, assumenda ipsum et commodi alias vero maxime accusantium, optio consequuntur at beatae quas sunt nisi.
      </p>
      <a href="" class="btn btn-get-started">Par ici</a>
    </div>
  </div>
</div>


<section id="signup">
    <div class="wrapper">
        <article id="enterprise">
            <div class="overlay">
                <h4>Entreprise</h4>
                <p><small>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                </small></p>
                <a href="#" class="btn button-2">S'enregistrer</a>
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
</section>



<section id="clients">
  <div class="container-fluid">
    <div class="section-title">
      <h2>Ils nous font confiance</h2>
    <div class="row mt-5">
      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
      </div>

      <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
        <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section><!-- End Clients Section -->

<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>