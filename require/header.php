<?php

function mainHeader(){
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    getUserInfos();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
}

function mainFooter(){
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
}


function adminHeader(){
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    getUserInfos();
    adminPages();   
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
}