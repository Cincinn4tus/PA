<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Connexion";
  saveLogs();
  getUserInfos();

$connection = connectDB();
$queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."financement");
$queryPrepared->execute();
$projects = $queryPrepared->fetchAll();

?>

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
