<?php
session_start();
require "functions.php";

if (
    count($_POST) != 6 ||
    empty($_POST['projectTitle']) ||
    empty($_POST['companyName']) ||
    empty($_POST['requestedAmount']) ||
    empty($_POST['contactInfo']) ||
    empty($_POST['projectDescription']) ||
    empty($_POST['fundingGoals'])
) {
    die("Tentative de HACK");
}

$projectTitle = $_POST['projectTitle'];
$companyName = $_POST['companyName'];
$requestedAmount = $_POST['requestedAmount'];
$contactInfo = $_POST['contactInfo'];
$projectDescription = $_POST['projectDescription'];
$fundingGoals = $_POST['fundingGoals'];

$listOfErrors = [];

// Vérification si le titre du projet existe déjà
$connection = connectDB();
$queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."financement WHERE projectTitle=:projectTitle");
$queryPrepared->execute(["projectTitle" => $projectTitle]);
$results = $queryPrepared->fetch();

if (!empty($results)) {
    $listOfErrors[] = "Le titre du projet est déjà utilisé";
}

if (empty($listOfErrors)) {
    // Insertion en BDD
    $queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."financement
        (projectTitle, companyName, requestedAmount, contactInfo, projectDescription, fundingGoals)
        VALUES
        (:projectTitle, :companyName, :requestedAmount, :contactInfo, :projectDescription, :fundingGoals)");

    $queryPrepared->execute([
        "projectTitle" => $projectTitle,
        "companyName" => $companyName,
        "requestedAmount" => $requestedAmount,
        "contactInfo" => $contactInfo,
        "projectDescription" => $projectDescription,
        "fundingGoals" => $fundingGoals
    ]);

    // Stocker l'ID du projet inséré dans la session
    $_SESSION['last_project_id'] = $connection->lastInsertId();

    // Redirection sur la page de connexion
    header('location: ../user/pagefinancement.php');
} else {
    // Si NOK
    // On stocke les erreurs et les données
    $_SESSION['listOfErrors'] = $listOfErrors;
    $_SESSION['data'] = $_POST;

    header('location: ../user/demandefinancement.php');
}
