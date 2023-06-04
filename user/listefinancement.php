<?php
session_start();
include "../core/functions.php";

$connection = connectDB();
$queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."financement");
$queryPrepared->execute();
$projects = $queryPrepared->fetchAll();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrowdHub - Financements en cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include "../assets/templates/header.php"; ?>

<main>
    <section class="current-funding py-5">
        <div class="container">
            <h2 class="text-center mb-4">Financements en cours</h2>
            <div class="row">
                <?php foreach ($projects as $project): ?>
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="assets/images/project-image.jpg" class="img-fluid" alt="Image du projet">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($project['projectTitle']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($project['companyName']); ?></p>
                                    <p class="card-text">Description du projet: <?php echo htmlspecialchars($project['projectDescription']); ?></p>
                                    <p class="card-text">Montant demandé: €<?php echo htmlspecialchars($project['requestedAmount']); ?></p>
                                    <p class="card-text">Objectifs de financement: <?php echo htmlspecialchars($project['fundingGoals']); ?></p>
                                    <a href="pagefinancement.php?id=<?php echo $project['id']; ?>" class="btn btn-primary">Participer au financement</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
    
    <?php include "../assets/templates/footer.php"; ?>
</body>
</html>
