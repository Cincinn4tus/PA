<?php

    session_start();
    $pageTitle = "Analytics";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";

    $ip_visiteur = $_SERVER['REMOTE_ADDR'];
    $ipinfo = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip_visiteur));

    echo 'Pays: ' . $ipinfo->geoplugin_countryName . "\n";
    echo 'Ville: ' . $ipinfo->geoplugin_city . "\n";
    echo 'Continent: ' . $ipinfo->geoplugin_continentName . "\n";

include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>

