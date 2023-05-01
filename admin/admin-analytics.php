<?php
    session_start();
    $pageTitle = "Analytics";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";


    // création d'un graphique en utilisant GD
$width = 600;
$height = 400;
$image = imagecreatetruecolor($width, $height);

// définition des couleurs
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 255, 0, 0);
$green = imagecolorallocate($image, 0, 255, 0);
$blue = imagecolorallocate($image, 0, 0, 255);

// remplissage de l'image avec la couleur blanche
imagefilledrectangle($image, 0, 0, $width, $height, $white);

// récupération des données de la base de données
$connection = connectDB();
$results = $connection->query("SELECT visit_hour, COUNT(*) as nb_visits FROM ".DB_PREFIX."logs GROUP BY visit_hour ORDER BY visit_hour");
$results = $results->fetchAll();

// recherche du maximum de visites pour une heure donnée
$max_visits = 0;
foreach($results as $row){
    if($row["nb_visits"] > $max_visits){
        $max_visits = $row["nb_visits"];
    }
}

// définition des dimensions du graphique
$graph_width = $width - 100;
$graph_height = $height - 100;

// dessin des axes
imageline($image, 50, $height - 50, 50, 50, $black);
imageline($image, 50, $height - 50, $width - 50, $height - 50, $black);

// dessin des graduations sur l'axe des abscisses
for($i = 0; $i < 24; $i++){
    $x = 50 + ($i / 24) * $graph_width;
    $label = sprintf("%02d", $i);
    imagestring($image, 5, $x - 7, $height - 30, $label, $black);
}

// dessin des graduations sur l'axe des ordonnées
for($i = 0; $i <= $max_visits; $i += 5){
    $y = $height - 50 - ($i / $max_visits) * $graph_height;
    imagestring($image, 5, 20, $y - 7, $i, $black);
    imageline($image, 50, $y, $width - 50, $y, $black);
}

// dessin du graphe
$previous_x = 0;
$previous_y = 0;
foreach($results as $row){
    $hour = (int)substr($row["visit_hour"], 0, 2);
    $x = 50 + ($hour / 24) * $graph_width;
    $y = $height - 50 - ($row["nb_visits"] / $max_visits) * $graph_height;
    if($previous_x != 0 && $previous_y != 0){
        imageline($image, $previous_x, $previous_y, $x, $y, $red);
    }
    $previous_x = $x;
    $previous_y = $y;
}

// envoi de l'image dans le navigateur
header('Content-type: image/png');
imagepng($image);




include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";

?>