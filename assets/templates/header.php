<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UpConstruction Bootstrap Template - Projects</title>
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
          <li><a href="/projects.php">Projets</a></li>
          <li><a href="/blog.php">Blog</a></li>
          <?php
                if (isConnected()){
                    if ($_SESSION['scope'] == 0){
                        echo '<li class="nav-item">
                            <a class="nav-link" href="/admin/admin-dashboard.php">Administration</a>
                        </li>';
                    } else if($_SESSION['scope'] == 1){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="/user/enterprise-board.php">Entreprise</a>
                        </li>';
                    } else if($_SESSION['scope'] == 2){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="/user/view-projects.php">Utilisateur</a>
                        </li>';
                    }
                } else {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="/user/register.php">Non connecté</a>
                    </li>';
                } 
                ?>
          <li><a href="contact.html">Contact</a></li>
          <?php if (isConnected()){
                    echo '
                    <li class="dropdown">
                      <a href="#"><span>Mon compte</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                      <ul>
                        <li><a href="/user/profile.php">Mon Profil</a></li>
                        <li><a href="#">Mes Commandes</a></li>
                        <li><a href="#">Mes Favoris</a></li>
                        <li><a href="#">Mes Messages</a></li>
                        <li><a href="#">Paramètres</a></li>
                        <li><a href="/user/logout.php" class="btn btn-started ms-2 mt-1">Déconnexion</a></li>
                      </ul>
                    </li>
                    ';
                } else {
                    echo '<a href="/user/login.php"> <button class="btn btn-primary ms-2 mt-1"> Connexion </button> </a>';
                } ?>
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->  