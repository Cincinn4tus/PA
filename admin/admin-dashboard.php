<?php 
    session_start();
    $pageTitle = "Console d'administration";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

    if($_SESSION['scope'] != 0 || !isConnected())
    {
        header("Location: /404.php");
    }
?>
<h1 class="text-center mt-5" id="main-title">
    Console d'administration
</h1>
<div class="container mt-5">
    <div class="row">
    <h3 class="mt-5">Gestion des données</h3>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Gestion des utilisateurs</h4>
                </div>
                <div class="card-body">
                    <p>
                        Gérer les utilisateurs de la plateforme
                    </p>
                    <a href="admin-users.php" class="btn btn-danger">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Journal des connexions</h4>
                </div>
                <div class="card-body">
                    <p>
                        Voir les statistiques de connexion
                    </p>
                    <a href="admin-logs.php" class="btn btn-danger">Voir</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Captcha</h4>
                </div>
                <div class="card-body">
                    <p>
                        Gérer les paramètres de captcha
                    </p>
                    <a href="admin-captcha.php" class="btn btn-danger">Gérer</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Fréquentation</h4>
                </div>
                <div class="card-body">
                    <p>
                        Gérer les catégories de la plateforme
                    </p>
                    <a href="admin-analytics.php" class="btn btn-warning">Gérer</a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="mt-5">
<div class="container mt-5">
    <div class="row">
        <h3 class="mt-5">Gestion de l'apparence</h3>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Templates d'email</h4>
                </div>
                <div class="card-body">
                    <p>
                        Gérer les templates d'email
                    </p>
                    <a href="admin-emails.php" class="btn btn-primary">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Gestion des avatars</h4>
                </div>
                <div class="card-body">
                    <p>
                        Gérer les avatars
                    </p>
                    <a href="admin-avatars.php" class="btn btn-primary">Gérer</a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="mt-5">
<div class="container mt-5">
    <div class="row mt-5">
        <h3 class="mt-5">Outils de communication</h3>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Créer une newsletter</h4>
                </div>
                <div class="card-body">
                    <p>
                        Créer une newsletter
                    </p>
                    <a href="admin-news.php" class="btn btn-secondary">Créer</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Notifications</h4>
                </div>
                <div class="card-body">
                    <p>
                        Gérer les notifications
                    </p>
                    <a href="admin-notifications.php" class="btn btn-secondary">Voir</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Gestion des messages</h4>
                </div>
                <div class="card-body">
                    <p>
                        Gérer les messages
                    </p>
                    <a href="admin-messages.php" class="btn btn-secondary">Consulter</a>
                </div>
            </div>
    </div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>