<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo "CrowdHub | " . $pageTitle; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <h1>Crowdhub<span>.</span></h1>
      </a>
      
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/" class="active">Accueil</a></li>
          <li><a href="/about.php">À propos</a></li>
          <li><a href="/services.php">Services</a></li>
          <li><a href="/blog.php">Blog</a></li>
          <?php
                if (isConnected()){
                    if ($user['scope'] == 0){
                        echo '<li class="nav-item">
                            <a class="nav-link" href="/admin/admin-dashboard.php">Administration</a>
                        </li>';
                    } else if($user['scope'] == 2){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="/user/demandefinancement.php">Créer un projet</a>
                        </li>';
                    } else{
                        echo '<li class="nav-item">
                        <a class="nav-link" href="/user/listefinancement.php">Projets</a>
                        </li>';
                    }
                } else {
                    echo '<li class="nav-item">
                        <a class="nav-link" href="/user/login.php">Projets</a>
                    </li>';
                }
                ?>
          <li><a href="/user/membres.php">Membres</a></li>
          <?php if (isConnected()){
                    echo '
                    <li class="dropdown">
                      <a href="#"><span>Mon compte</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                      <ul>
                        <li><a href="/user/profile.php">Mon Profil</a></li>
                        <li><a href="/user/membres.php">Membres</a></li>
                        <li><a href="/user/demandes.php">Mes Demandes';

                        // Afficher le compteur des demandes d'amis
                        if (isConnected()) {
                            $currentUserId = $_SESSION['id'];
                            $friendRequestCount = getFriendRequestCount($currentUserId);

                            if ($friendRequestCount > 0) {
                                echo '<span class="friend-request-counter">' . $friendRequestCount . '</span>';
                            }
                        }
                        '<li><a href="/user/amis.php">Mes Amis</a></li>
                        <li><a href="/user/logout.php" class="btn btn-started ms-2 mt-1">Déconnexion</a></li>
                      </ul>
                    </li>
                    ';
                } else {
                    echo '<a href="/user/login.php"> <button class="btn btn-primary ms-2 mt-1"> Connexion </button> </a>';
                } ?>
          <li><button id="theme-button">Passer en mode sombre</button></li>
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->  


<?php
  if($pageTitle !== "Accueil"){ ?>
  <main id="main">
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
    <h2><?php echo $pageTitle; ?></h2>
    <ol>
      <li><a href="/">Accueil</a></li>
      <li><?php echo $pageTitle; ?></li>
    </ol>
  </div>
</div><!-- End Breadcrumbs -->

<?php } ?>
<script>
  document.querySelector('#theme-button').addEventListener('click', function() {
    if (document.documentElement.getAttribute('data-theme') === 'dark') {
      document.documentElement.setAttribute('data-theme', 'light');
      this.textContent = 'Passer en mode sombre';
    } else {
      document.documentElement.setAttribute('data-theme', 'dark');
      this.textContent = 'Passer en mode clair';
    }
  });
</script>