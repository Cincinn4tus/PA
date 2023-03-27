<?php
$pageTitle = "CrowdHub";
include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>




<div class="container hero my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1 logo">Crowd<span class="primary-color">H</span>ub</h1>
        <p class="lead">
            <strong>Financer l'innovation ensemble</strong><br>
            Découvrez CrowdHub, la plateforme de financement participatif qui permet aux innovateurs, aux créateurs et aux rêveurs de réaliser leurs projets les plus ambitieux. <br>
            Que vous soyez un entrepreneur débutant ou un artiste établi, notre communauté dynamique et engagée est prête à vous aider à faire avancer votre vision. 
            Rejoignez-nous dès maintenant et découvrez comment ensemble, nous pouvons faire la différence.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">S'inscrire</button>
          <button type="button" class="btn btn-secondary btn-lg px-4">Découvrir</button>
        </div>
      </div>
      <div class="hero-img col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" src="/assets/img/analyse.jpg" alt="" width="720">
      </div>
    </div>
</div>

  <div class="container-fluid px-4 py-5" id="hanging-icons">
  <h2 class="pb-2 border-bottom">Nos avantages</h2>
  <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
    <div class="col d-flex align-items-start">
      <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
        <i class="bi bi-emoji-smile"></i>
      </div>
      <div>
        <h3 class="fs-2">Satisfaction garantie</h3>
        <p>Nous sommes fiers de notre excellent service client et nous nous assurons que nos clients soient satisfaits de notre travail.</p>
        <a href="#" class="btn btn-primary">
          En savoir plus
        </a>
      </div>
    </div>
    <div class="col d-flex align-items-start">
      <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
        <i class="bi bi-check2-square"></i> 
      </div>
      <div>
        <h3 class="fs-2">Rapidité d'exécution</h3>
        <p>Nous comprenons que le temps est précieux. <br> Nous nous efforçons donc de fournir un travail de qualité dans les délais impartis.</p>
        <a href="#" class="btn btn-primary">
          En savoir plus
        </a>
      </div>
    </div>
    <div class="col d-flex align-items-start">
      <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
        <i class="bi bi-arrow-up"></i>
      </div>
      <div>
        <h3 class="fs-2">Croissance garantie</h3>
        <p>Nous travaillons avec nos clients pour comprendre leurs besoins et développer des solutions innovantes qui leur permettent de croître et de prospérer.</p>
        <a href="#" class="btn btn-primary">
          En savoir plus
        </a>
      </div>
    </div>
  </div>
</div>

<div class="container newsletter-subscribe mt-4">
  <div class="row m-auto">
    <h2 class="text-center">Joindre la newsletter</h2>
    <p>
      Recevez les dernières nouvelles et les mises à jour sur nos produits et services en vous inscrivant à notre newsletter. Inscrivez-vous dès maintenant pour ne rien manquer !
    </p>
  </div>

  <div class="row text-center">
    <form class="col-lg-4 m-auto">
        <input type="email" class="form-control" id="email" placeholder="Entrez votre adresse e-mail"><br>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
  </div>
</div>


<div class="container">
  <!-- Formulaire de contact -->

  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <h2 class="text-center">Contactez-nous</h2>
      <p>
        Vous avez des questions ? Nous avons des réponses. Envoyez-nous un message et nous vous
        répondrons dès que possible.
      </p>

      <form action="" method="POST" class="text-center" id="contact-form">
        <input type="text" class="form-control" id="name" placeholder="Nom"><br>
        <input type="email" class="form-control" id="email" placeholder="Adresse e-mail"><br>
        <textarea class="form-control" id="message" placeholder="Message" rows="5"></textarea><br>
        <input type="submit" class="btn btn-primary" placeholder="Envoyer">
      </form>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>