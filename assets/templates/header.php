<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "CrowdHub - " . $pageTitle; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <meta name="description" content="CrowdHub est une plateforme de financement participatif.">
</head>



<header>
    <nav class="navbar navbar-expand-lg bg-light rounded" aria-label="main navigation">
        <div class="container">
            <a href="/">
                <img src="/assets/img/logo/logo.png" alt="Logo" class="logo" height="44px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/mail.php">Mail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Projets</a>
                </li>

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
            


                <li class="nav-item">
                    <a class="nav-link" href="/#contact-form">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                </ul>

                <?php if (isConnected()){
                    echo '<a href="/user/logout.php" class="btn btn-primary ms-2 mt-1">Déconnexion</a>';
                    
                } else {
                    echo '<a href="/user/login.php"> <button class="btn btn-primary ms-2 mt-1"> Connexion </button> </a>';
                } ?>
                </a>
            </div>
        </div>
    </nav>
</header>


<body>
