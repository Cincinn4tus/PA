<?php
    session_start();
    $pageTitle = "Analytics";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    ?>


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




