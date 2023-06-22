<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Connexion";
  saveLogs();
  getUserInfos();

if (!isset($_SESSION['last_project_id'])) {
    die("Projet introuvable.");
}

$projectId = $_SESSION['last_project_id'];
$connection = connectDB();
$queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."financement WHERE id=:projectId");
$queryPrepared->execute(["projectId" => $projectId]);
$project = $queryPrepared->fetch();

if (!$project) {
    die("Projet introuvable.");
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrowdHub - Projet mis en avant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include "../assets/templates/header.php"; ?>

<main>
    <section class="featured-project py-5">
        <div class="container">
            <h2 class="text-center mb-4">Projet mis en avant</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="assets/images/project-image.jpg" alt="Image du projet" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h3><?php echo htmlspecialchars($project['projectTitle']); ?></h3>
                    <p><?php echo htmlspecialchars($project['companyName']); ?></p>
                    <p>Description du projet: <?php echo htmlspecialchars($project['projectDescription']); ?></p>
                    <p>Montant demandé: €<?php echo htmlspecialchars($project['requestedAmount']); ?></p>
                    <p>Objectifs de financement: <?php echo htmlspecialchars($project['fundingGoals']); ?></p>
                    <p>Informations de contact: <?php echo htmlspecialchars($project['contactInfo']); ?></p>
                    <a href="#" class="btn btn-primary">Participer au financement</a>
                </div>
            </div>
        </div>
    </section>
</main>
    
        <?php include "../assets/templates/footer.php"; ?>