<?php
    session_start();
    $pageTitle = "Analytics";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    ?>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Créer une newsletter</h2>
                <ol>
                <li><a href="/admin/admin-dashboard.php">Administration</a></li>
                <li>Newsletter</li>
                </ol>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Formulaire d'écriture de la newsletter ======= -->

        <div class="container mt-5" id="profile-form">
            <div class="mx-auto col-lg-6">
                <h2 class="text-center">Créer une newsletter</h2>
            </div>
            <div class="col-lg-5 mx-auto">
                <form action="/core/newsletterCreate.php" method="post">
                    <input type="text" class="form-control" name="title" placeholder="Titre de la newsletter"><br>
                    <textarea class="form-control" name="content" placeholder="Contenu de la newsletter"></textarea><br>
                    Envoyer à
                    <select class="form-control" name="recipient">
                        <option value="0">Tous</option>
                        <option value="1">Investisseurs</option>
                        <option value="2">Entreprises</option>
                        <option value="3">Administrateurs</option>
                    </select><br>
                    Date d'envoi
                    <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>"><br>
                    <input type="submit" class="btn btn-primary" value="Envoyer">
                </form>
            </div>
        </div>




