<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Accueil";
  saveLogs();
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="info d-flex align-items-center">

        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down">Bienvenue sur <span>CrowdHub</span></h2>
            <p data-aos="fade-up">Transformez vos idées en réalité grâce à la plateforme de financement participatif de CrowdHub. Nous vous offrons une opportunité unique de présenter vos projets d'entreprise et de les rendre accessibles à des investisseurs enthousiastes. Notre plateforme connecte les entrepreneurs ambitieux avec les investisseurs prêts à soutenir des initiatives innovantes.</p>
            <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Commencer</a>
          </div>
        </div>

    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/hero-carousel-1.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-2.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-3.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-4.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-5.jpg)"></div>
      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">
    <!-- ======= Get Started Section ======= -->
    <section id="get-started" class="get-started section-bg">
      <div class="container">
        <div class="row justify-content-between gy-4">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
            <div class="content">
              <h3>Lancez votre projet dès maintenant</h3>
              <p>Vous avez une idée innovante qui nécessite un financement ? Ne cherchez plus ! CrowdHub est là pour vous aider. Nous vous offrons une plateforme de financement participatif où vous pouvez présenter votre projet aux investisseurs et obtenir les fonds dont vous avez besoin.</p>
              <p>Nos services sont conçus pour vous aider à réaliser vos rêves. Nous vous accompagnons tout au long du processus de collecte de fonds, en mettant en avant votre projet auprès d'une communauté d'investisseurs engagés.</p>
            </div>
          </div>
          <div class="col-lg-5" data-aos="fade">
            <form action="/forms/quote.php" method="post" class="php-email-form">
              <h3>Obtenez un conseil</h3>
              <p>Vous êtes prêt à franchir le pas ? Contactez-nous dès maintenant pour obtenir un conseil personnalisé.</p>
              <div class="row gy-3">
                <div class="col-md-12">
                  <input type="text" name="lastname" class="form-control" placeholder="Nom" required>
                </div>
                <div class="col-md-12 ">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="phone" placeholder="Téléphone" required>
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>
                <div class="col-md-12 text-center">
                  <div class="loading">Chargement</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Votre demande a été envoyée avec succès. Merci !</div>
                  <button type="submit">Envoyer</button>
                </div>
              </div>
            </form>
          </div><!-- End Quote Form -->
        </div>        
      </div>
    </section><!-- End Get Started Section -->
    <!-- ======= Constructions Section ======= -->
    <section id="constructions" class="constructions">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Nos projets</h2>
          <p>Découvrez nos projets de construction innovants et de haute qualité. Nous sommes engagés à offrir des solutions durables et à créer des espaces exceptionnels pour nos clients</p>
        </div>
        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg" style="background-image: url(assets/img/constructions-1.jpg);"></div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">Développement d'une application de réalité augmentée</h4>
                    <p>Nous lançons un projet innovant de développement d'une application de réalité augmentée révolutionnaire. Cette application offrira des expériences immersives et interactives, permettant aux utilisateurs d'explorer de nouveaux mondes virtuels. Rejoignez-nous dans cette aventure technologique passionnante !</p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- Fin de l'élément de carte -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg" style="background-image: url(assets/img/constructions-2.jpg);"></div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">Construction d'un complexe résidentiel</h4>
                    <p>Nous lançons un projet ambitieux de construction d'un complexe résidentiel moderne. Ce complexe offrira des logements de qualité supérieure avec des installations et des équipements de pointe. Soyez parmi les premiers à investir dans ce projet prometteur !</p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- Fin de l'élément de carte -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg" style="background-image: url(assets/img/constructions-3.jpg);"></div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">Construction d'un centre commercial</h4>
                    <p>Vous êtes invités à participer à notre projet de construction d'un centre commercial moderne. Ce centre commercial offrira une expérience de shopping unique avec une grande variété de magasins, de restaurants et de divertissements. Ne manquez pas cette opportunité de faire partie de cette entreprise prospère !</p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- Fin de l'élément de carte -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg" style="background-image: url(assets/img/constructions-4.jpg);"></div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">Rénovation d'une maison historique</h4>
                    <p>Notre entreprise propose de rénover une maison historique située au cœur de la ville. Avec une équipe d'architectes et d'experts en rénovation, nous restaurerons ce bâtiment emblématique en préservant son charme d'origine. Rejoignez-nous dans cette aventure passionnante !</p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Card Item -->
        </div>
      </div>
    </section><!-- End Constructions Section -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Nos Services</h2>
          <p>Découvrez nos services spécialisés pour le financement participatif de projets.</p>
        </div>
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-mountain-city"></i>
              </div>
              <h3>Projets Innovants</h3>
              <p>Investissez dans des projets innovants portés par des entreprises visionnaires. Nous sélectionnons les idées les plus prometteuses pour vous offrir des opportunités d'investissement uniques.</p>
              <a href="service-details.html" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-arrow-up-from-ground-water"></i>
              </div>
              <h3>Rendement Élevé</h3>
              <p>Obtenez un rendement élevé sur vos investissements. Notre plateforme vous permet d'accéder à des opportunités de croissance et de maximiser vos gains.</p>
              <a href="service-details.html" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-drafting"></i>
              </div>
              <h3>Expertise et Accompagnement</h3>
              <p>Nous vous offrons notre expertise et notre accompagnement tout au long du processus d'investissement. Notre équipe de professionnels est là pour répondre à vos questions et vous guider.</p>
              <a href="service-details.html" class="readmore stretched-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->
        </div>
      </div>
    </section><!-- End Services Section -->
    <!-- ======= Section des services alternatifs ======= -->
    <section id="alt-services" class="alt-services">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-around gy-4">
          <div class="col-lg-6 img-bg" style="background-image: url(assets/img/alt-services.jpg);" data-aos="zoom-in" data-aos-delay="100"></div>

          <div class="col-lg-5 d-flex flex-column justify-content-center">
            <h3>Plateforme de financement participatif</h3>
            <p>Facilitez le financement de vos projets grâce à Crowdhub. Notre plateforme vous permet de présenter vos projets d'entreprise et de connecter avec des investisseurs prêts à soutenir votre vision.</p>

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
              <i class="bi bi-cash-stack flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Projets attractifs</a></h4>
                <p>Accédez à une variété de projets passionnants et contribuez à leur succès. Investissez dans des idées innovantes et faites partie de l'avenir.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-people flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Investisseurs engagés</a></h4>
                <p>Découvrez les projets les plus prometteurs et soutenez les entreprises en les aidant à réaliser leurs objectifs. Soyez un catalyseur de succès.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-globe flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Impact positif</a></h4>
                <p>Investissez dans des projets qui ont un impact positif sur la société et l'environnement. Contribuez à un avenir durable et éthique.</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-handshake flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Communauté collaborative</a></h4>
                <p>Rejoignez une communauté d'investisseurs passionnés et échangez des idées avec des professionnels de divers domaines. Ensemble, nous pouvons réaliser de grandes choses.</p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>

      </div>
    </section><!-- Fin de la section des services alternatifs -->


    <!-- ======= Features Section ======= -->
    <section id="features" class="features section-bg">
      <div class="container" data-aos="fade-up">
        <ul class="nav nav-tabs row g-2 d-flex">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
              <h4>Projets Innovants</h4>
            </a>
          </li><!-- End tab nav item -->
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
              <h4>Financement Participatif</h4>
            </a><!-- End tab nav item -->
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
              <h4>Transparence Totale</h4>
            </a>
          </li><!-- End tab nav item -->
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
              <h4>Sécurité et Confidentialité</h4>
            </a>
          </li><!-- End tab nav item -->
    
        </ul>
        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <h3>Investissez dans des projets innovants</h3>
                <p class="fst-italic">
                  Découvrez et soutenez les projets d'entreprises innovantes dans divers domaines tels que la technologie, l'environnement, l'énergie, l'agriculture et plus encore.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> Contribuez au développement de projets prometteurs.</li>
                  <li><i class="bi bi-check2-all"></i> Faites partie de la transition vers un avenir durable.</li>
                  <li><i class="bi bi-check2-all"></i> Diversifiez votre portefeuille d'investissement avec des opportunités uniques.</li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="assets/img/features-1.jpg" alt="Projets innovants" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->
          <div class="tab-pane" id="tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Investissez en toute confiance</h3>
                <p class="fst-italic">
                  Nous vous offrons une plateforme sécurisée et transparente pour investir dans les projets qui vous tiennent à cœur.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> Des projets sélectionnés avec soin pour vous offrir des opportunités fiables.</li>
                  <li><i class="bi bi-check2-all"></i> Des informations complètes sur chaque projet pour une prise de décision éclairée.</li>
                  <li><i class="bi bi-check2-all"></i> Suivez l'évolution de vos investissements et recevez des rapports réguliers.</li>
                  <li><i class="bi bi-check2-all"></i> Notre équipe est là pour vous accompagner à chaque étape.</li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-2.jpg" alt="Investissez en toute confiance" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->
          
          <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Soutenez des projets porteurs de sens</h3>
                <ul>
                  <li><i class="bi bi-check2-all"></i> Contribuez à des initiatives qui ont un impact positif sur la société.</li>
                  <li><i class="bi bi-check2-all"></i> Soutenez des entreprises engagées dans le développement durable.</li>
                  <li><i class="bi bi-check2-all"></i> Participez à la réalisation de projets innovants et créateurs d'emplois.</li>
                </ul>
                <p class="fst-italic">
                  Nous croyons en la puissance de la communauté pour faire la différence.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/features-3.jpg" alt="Soutenez des projets porteurs de sens" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane" id="tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <h3>Accompagnement personnalisé</h3>
                <p class="fst-italic">
                  Notre équipe est là pour vous aider à chaque étape de votre parcours d'investissement.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> Des conseils d'experts pour vous guider dans vos choix d'investissement.</li>
                  <li><i class="bi bi-check2-all"></i> Assistance personnalisée pour répondre à vos questions et préoccupations.</li>
                  <li><i class="bi bi-check2-all"></i> Accès à des ressources éducatives pour améliorer vos connaissances en investissement.</li>
                  <li><i class="bi bi-check2-all"></i> Suivi régulier de vos investissements et ajustements en fonction de votre profil et de vos objectifs.</li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="assets/img/features-4.jpg" alt="Accompagnement personnalisé" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->          

        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Témoignages</h2>
          <p>Découvrez ce que nos clients disent de nous. Nous sommes fiers de partager leurs expériences et de leur fournir des services de qualité.</p>
        </div>
        <div class="slides-2 swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>PDG et Fondateur</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Je suis très satisfait des services offerts par cette entreprise. Leur équipe a été très professionnelle et compétente. Ils ont su répondre à tous mes besoins et ont livré un travail de grande qualité. Je les recommande vivement à tous ceux qui recherchent des services fiables et efficaces.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- Fin de l'élément de témoignage -->
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    J'ai été impressionnée par le talent et la créativité de cette équipe de designers. Ils ont su donner vie à mes idées et créer des designs exceptionnels. Leur professionnalisme et leur souci du détail sont remarquables. Je recommande vivement leurs services à tous ceux qui recherchent des designs de qualité.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- Fin de l'élément de témoignage -->
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Propriétaire de magasin</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    J'ai été agréablement surpris par l'efficacité de cette entreprise. Leur équipe a travaillé avec diligence pour répondre à mes besoins et a fourni un excellent service. Je suis très satisfait de leur professionnalisme et de leur réactivité. Je recommande vivement leurs services à tous les propriétaires de magasins à la recherche de solutions efficaces.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- Fin de l'élément de témoignage -->
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    J'ai été impressionné par le professionnalisme et le talent de Matt Brandon en tant que freelancer. Son expertise et sa capacité à livrer des résultats de haute qualité sont inégalées. C'est un plaisir de travailler avec lui et je le recommande vivement pour tout projet.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- Fin de l'élément de témoignage -->
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Je suis ravi d'avoir travaillé avec John Larson en tant qu'entrepreneur. Sa passion pour l'innovation et sa vision stratégique ont été essentielles pour le succès de notre projet. Son engagement envers l'excellence et sa capacité à résoudre les problèmes en font un partenaire de confiance. Je le recommande vivement pour toute entreprise.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- Fin de l'élément de témoignage -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->
  </main><!-- End #main -->

  <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
    ?>

