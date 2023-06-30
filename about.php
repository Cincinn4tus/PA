<?php 
    session_start();
    $pageTitle = "À propos de nous";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

<!-- ======= Section À propos ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">
    <div class="row position-relative">
      <div class="col-lg-7 about-img" style="background-image: url(assets/img/about.jpg);"></div>
      <div class="col-lg-7">
        <h2>Notre histoire et notre mission</h2>
        <div class="our-story">
          <h4>Fondé en 2023</h4>
          <h3>Notre histoire</h3>
          <p>Nous sommes une plateforme de financement participatif qui encourage l'innovation et soutient les projets créatifs. Notre mission est de connecter les porteurs de projets talentueux avec des donateurs passionnés pour les aider à réaliser leurs rêves. Nous croyons en l'importance de l'entrepreneuriat et de l'économie collaborative.</p>
          <ul>
            <li><i class="bi bi-check-circle"></i> <span>Offrir des opportunités aux créateurs et aux entrepreneurs</span></li>
            <li><i class="bi bi-check-circle"></i> <span>Promouvoir l'innovation et la créativité</span></li>
            <li><i class="bi bi-check-circle"></i> <span>Soutenir des projets à fort potentiel</span></li>
          </ul>
          <p>Nous croyons que chaque idée mérite d'être soutenue et que l'union fait la force. Rejoignez-nous dans notre mission de donner vie aux projets innovants et de créer un impact positif dans la société.</p>

          <div class="watch-video d-flex align-items-center position-relative">
            <i class="bi bi-play-circle"></i>
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox stretched-link">Regarder la vidéo</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End About Section -->


<!-- ======= Section Statistiques ======= -->
<section id="stats-counter" class="stats-counter section-bg">
  <div class="container">

  <div class="row gy-4">

<div class="col-lg-3 col-md-6">
  <div class="stats-item d-flex align-items-center w-100 h-100">
    <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
    <div>
      <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
      <p>Clients Satisfaits</p>
    </div>
  </div>
</div><!-- Fin de l'élément de statistiques -->

<div class="col-lg-3 col-md-6">
  <div class="stats-item d-flex align-items-center w-100 h-100">
    <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
    <div>
      <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
      <p>Projets</p>
    </div>
  </div>
</div><!-- Fin de l'élément de statistiques -->

<div class="col-lg-3 col-md-6">
  <div class="stats-item d-flex align-items-center w-100 h-100">
    <i class="bi bi-headset color-green flex-shrink-0"></i>
    <div>
      <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
      <p>Heures de Support</p>
    </div>
  </div>
</div><!-- Fin de l'élément de statistiques -->

<div class="col-lg-3 col-md-6">
  <div class="stats-item d-flex align-items-center w-100 h-100">
    <i class="bi bi-people color-pink flex-shrink-0"></i>
    <div>
      <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
      <p>Travailleurs Acharnés</p>
    </div>
  </div>
</div><!-- Fin de l'élément de statistiques -->

</div>
</div>
</section><!-- Fin de la section Statistiques -->



<!-- ======= Section Services Alternatifs ======= -->
<section id="alt-services" class="alt-services">
  <div class="container" data-aos="fade-up">
  <div class="row justify-content-around gy-4">
  <div class="col-lg-6 img-bg" style="background-image: url(assets/img/alt-services.jpg);" data-aos="zoom-in" data-aos-delay="100"></div>

  <div class="col-lg-5 d-flex flex-column justify-content-center">
    <h3>Une autre approche pour vos besoins</h3>
    <p>Nous offrons une expérience unique pour répondre à vos besoins spécifiques. Notre approche personnalisée vous permet d'obtenir les résultats que vous souhaitez. Nous mettons à votre disposition une équipe d'experts dévoués pour vous accompagner tout au long de votre projet.</p>

    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
      <i class="bi bi-easel flex-shrink-0"></i>
      <div>
        <h4><a href="" class="stretched-link">Créativité</a></h4>
        <p>Nous vous offrons des solutions créatives pour atteindre vos objectifs. Faites confiance à notre expertise pour créer des expériences uniques et engageantes.</p>
      </div>
    </div><!-- Fin de la boîte d'icône -->

    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
      <i class="bi bi-patch-check flex-shrink-0"></i>
      <div>
        <h4><a href="" class="stretched-link">Performance</a></h4>
        <p>Nous mettons tout en œuvre pour vous offrir des résultats exceptionnels. Notre équipe qualifiée travaille avec passion pour répondre à vos attentes et dépasser vos objectifs.</p>
      </div>
    </div><!-- Fin de la boîte d'icône -->

    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
      <i class="bi bi-brightness-high flex-shrink-0"></i>
      <div>
        <h4><a href="" class="stretched-link">Innovation</a></h4>
        <p>Nous vous proposons une approche innovante pour améliorer votre expérience utilisateur. Grâce à nos solutions avancées, vous pouvez offrir une expérience de qualité supérieure à vos clients.</p>
      </div>
    </div><!-- Fin de la boîte d'icône -->

    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
      <i class="bi bi-brightness-high flex-shrink-0"></i>
      <div>
        <h4><a href="" class="stretched-link">Accompagnement</a></h4>
        <p>Nous vous accompagnons dans l'élaboration de stratégies gagnantes pour votre entreprise. Notre approche axée sur les résultats vous permet d'atteindre vos objectifs commerciaux de manière efficace et durable.</p>
      </div>
    </div><!-- Fin de la boîte d'icône -->
  </div>
</div>
</div>
</section><!-- Fin de la section Services Alternatifs -->

<!-- ======= Section Services Alternatifs 2 ======= -->
<section id="alt-services-2" class="alt-services section-bg">
  <div class="container" data-aos="fade-up">

    <div class="row justify-content-around gy-4">
      <div class="col-lg-5 d-flex flex-column justify-content-center">
        <h3>Une autre approche pour vos besoins</h3>
        <p>Nous offrons une expérience unique pour répondre à vos besoins spécifiques. Notre approche personnalisée vous permet d'obtenir les résultats que vous souhaitez. Nous mettons à votre disposition une équipe d'experts dévoués pour vous accompagner tout au long de votre projet.</p>

        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
          <i class="bi bi-easel flex-shrink-0"></i>
          <div>
            <h4><a href="" class="stretched-link">Service Créatif</a></h4>
            <p>Nous vous offrons des solutions créatives pour atteindre vos objectifs. Faites confiance à notre expertise pour créer des expériences uniques et engageantes.</p>
          </div>
        </div><!-- Fin de la boîte d'icône -->

        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-patch-check flex-shrink-0"></i>
          <div>
            <h4><a href="" class="stretched-link">Satisfaction Garantie</a></h4>
            <p>Nous mettons tout en œuvre pour vous offrir des résultats exceptionnels. Notre équipe qualifiée travaille avec passion pour répondre à vos attentes et dépasser vos objectifs.</p>
          </div>
        </div><!-- Fin de la boîte d'icône -->

        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-brightness-high flex-shrink-0"></i>
          <div>
            <h4><a href="" class="stretched-link">Expérience Utilisateur</a></h4>
            <p>Nous vous proposons une approche innovante pour améliorer votre expérience utilisateur. Grâce à nos solutions avancées, vous pouvez offrir une expérience de qualité supérieure à vos clients.</p>
          </div>
        </div><!-- Fin de la boîte d'icône -->

        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-brightness-high flex-shrink-0"></i>
          <div>
            <h4><a href="" class="stretched-link">Stratégie Gagnante</a></h4>
            <p>Nous vous accompagnons dans l'élaboration de stratégies gagnantes pour votre entreprise. Notre approche axée sur les résultats vous permet d'atteindre vos objectifs commerciaux de manière efficace et durable.</p>
          </div>
        </div><!-- Fin de la boîte d'icône -->
      </div>

      <div class="col-lg-6 img-bg" style="background-image: url(assets/img/alt-services-2.jpg);" data-aos="zoom-in" data-aos-delay="100"></div>
    </div>

  </div>
</section>




    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimonials</h2>
          <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia reprehenderit sunt deleniti</p>
        </div>

        <div class="slides-2 swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

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
                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

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
                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

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
                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>UpConstruction</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li><a href="#">Marketing</a></li>
              <li><a href="#">Graphic Design</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Hic solutasetp</h4>
            <ul>
              <li><a href="#">Molestiae accusamus iure</a></li>
              <li><a href="#">Excepturi dignissimos</a></li>
              <li><a href="#">Suscipit distinctio</a></li>
              <li><a href="#">Dilecta</a></li>
              <li><a href="#">Sit quas consectetur</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nobis illum</h4>
            <ul>
              <li><a href="#">Ipsam</a></li>
              <li><a href="#">Laudantium dolorum</a></li>
              <li><a href="#">Dinera</a></li>
              <li><a href="#">Trodelas</a></li>
              <li><a href="#">Flexo</a></li>
            </ul>
          </div><!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>UpConstruction</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>