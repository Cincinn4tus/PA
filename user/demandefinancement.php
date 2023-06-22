<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Demande de financement";
  saveLogs();
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demande de financement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<header>
    <!-- Votre header ici -->
</header>

<body>
    <div class="container">
        <h1 class="my-5">Formulaire de demande de financement</h1>
        <?php if (isset($_SESSION['listOfErrors'])) { ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                            <?php

                                            foreach ($_SESSION['listOfErrors'] as $error) {
                                                echo "<li>" . $error . "</li>";
                                            }
                                            unset($_SESSION['listOfErrors']);
                                            ?>



                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

        <form action="../core/financementadd.php" method="POST">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="projectTitle" class="form-label">Titre du projet</label>
                    <input type="text" class="form-control" name="projectTitle" id="projectTitle" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="companyName" class="form-label">Nom de l'entreprise</label>
                    <input type="text" class="form-control" name="companyName" id="companyName" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="requestedAmount" class="form-label">Montant demandé</label>
                    <input type="number" class="form-control" name="requestedAmount" id="requestedAmount" min="0" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="contactInfo" class="form-label">Informations de contact</label>
                    <input type="text" class="form-control" name="contactInfo" id="contactInfo" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="projectDescription" class="form-label">Description du projet</label>
                    <textarea class="form-control" name="projectDescription" id="projectDescription" rows="4" required></textarea>
                </div>
                <div class="form-group col-md-12 mb-4">
                    <label for="fundingGoals" class="form-label">Objectifs de financement</label>
                    <textarea class="form-control" name="fundingGoals" id="fundingGoals" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Envoyer la demande</button>
            </div>
        </form>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB5IXcHZ5jHvkDrIefweleph5W8W8zv/2d3t0Nl5YjK8npj5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r