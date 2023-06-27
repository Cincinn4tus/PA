<?php
    session_start();
    $pageTitle = "Analytics";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

    
	$connection = connectDB();
	$results = $connection->query("SELECT * FROM ".DB_PREFIX."logs");
	$results = $results->fetchAll();
?>


<h2 class="text-center">Visites récentes</h2>

<!-- card visites aujourd'hui -->
<div class="container mt-5 mb-5">
        <div class="row">

            <div class="col-lg-4 col-md-6 col-sm-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h4>Visites</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            <ul>
                                <li><?php todayLogs(); ?></li>
                                <li><?php countLogs();?></li>
                            </ul>
                            <?php 
                           
                           // compter le nombre de $results dont $results['visit_date'] == date("d/m/Y")
                           ?>
                        </p>
                        <a href="admin-visits.php" class="btn btn-success">Détails</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h4>Performances</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            <ul>
                                <li><?php average_load_time(); ?></li>
                                <li><?php disabled_pages(); ?></li>
                            </ul>
                        </p>
                        <a href="admin-users.php" class="btn btn-success">Détails</a>
                    </div>
                </div>
            </div>

<?php
page_load_time();
include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";
?>

