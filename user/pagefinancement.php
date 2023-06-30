<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Financements";
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

if (!isset($_SESSION['last_project_id'])) {
    die("Projet introuvable.");
}
ini_set('display_errors', 1);
error_reporting(E_ALL);

$projectId = $_SESSION['last_project_id'];
$connection = connectDB();
$queryPrepared = $connection->prepare("SELECT * FROM " . DB_PREFIX . "financement WHERE id=:projectId");
$queryPrepared->execute(["projectId" => $projectId]);
$project = $queryPrepared->fetch();

if (!$project) {
    die("Projet introuvable.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donation = $_POST['donation'];
    $queryPrepared = $connection->prepare("UPDATE " . DB_PREFIX . "financement SET argentactuel = IFNULL(argentactuel,0) + :donation WHERE id=:projectId");
    $queryPrepared->execute(["donation" => $donation, "projectId" => $projectId]);
}

$queryPrepared = $connection->prepare("SELECT * FROM " . DB_PREFIX . "financement WHERE id=:projectId");
$queryPrepared->execute(["projectId" => $projectId]);
$project = $queryPrepared->fetch();

if (!isset($project['argentactuel'])) {
    $project['argentactuel'] = 0;
}


?>


<body>

    <main>
        <section class="featured-project py-5">
            <div class="container">
                <h2 class="text-center mb-4">Projet mis en avant</h2>
                <div class="row">
                    <div class="col-md-6">
                        <img src="crowdfunding-Fotolia_74821971_XS.jpg" alt="Image du projet" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h3><?php echo htmlspecialchars($project['projectTitle']); ?></h3>
                        <p><?php echo htmlspecialchars($project['companyName']); ?></p>
                        <p>Description du projet: <?php echo htmlspecialchars($project['projectDescription']); ?></p>
                        <p>Montant demandé: €<?php echo htmlspecialchars($project['requestedAmount']); ?></p>
                        <p>Objectifs de financement: <?php echo htmlspecialchars($project['fundingGoals']); ?></p>
                        <p>Informations de contact: <?php echo htmlspecialchars($project['contactInfo']); ?></p>
                        <form method="post">
                            <label for="donation">Donation:</label>
                            <input type="number" id="donation" name="donation" min="0" required>
                            <button type="submit" id="donate-button">Faire un don</button>
                        </form>
                        <p>Montant actuel: €<?php echo htmlspecialchars($project['argentactuel']); ?></p>
                        <div class="progress">
                            <?php
                            $percent = 0;
                            if ($project['requestedAmount'] > 0) {
                                $percent = ($project['argentactuel'] / $project['requestedAmount']) * 100;
                            }
                            ?>
                            <div class="progress-bar" role="progressbar" style="width: <?php echo $percent; ?>%;" aria-valuenow="<?php echo $project['argentactuel']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $project['requestedAmount']; ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://js.stripe.com/v3/%22%3E"></script>

    <script>
    var stripe = Stripe('pk_test_51NMwrfICe4bkMjF5qhnUJJErh2MUR8eWkluA5GZa9hLiMkhIdyfM4Q2Cu4Sd1D0BWDeGVTltZWw8BKRsDYni8mlb00QHCFqaA6');

    var donateButton = document.getElementById('donate-button');
    donateButton.addEventListener('click', function(event) {
    event.preventDefault();
    // Créer une nouvelle session de paiement
    fetch('/create-checkout-session', {
        method: 'POST',
    })
    .then(function(response) {
        return response.json();
    })
    .then(function(session) {
        return stripe.redirectToCheckout({ sessionId: session.id });
    })
    .then(function(result) {
        if (result.error) {
        alert(result.error.message);
        }
    })
    .catch(function(error) {
        console.error('Error:', error);
    });
    });
</script>

    


<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>