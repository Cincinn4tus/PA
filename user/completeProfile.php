<?php
    session_start();
    $pageTitle = "Profil";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    ?>


    <?php
            if(isset($_GET["email"])){
                $_SESSION["email"] = $_GET["email"];
            } else {
                header("Location: /user/login.php");
            }

            $pdo = connectDB();
            $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
            $queryPrepared->execute(["email"=>$_SESSION["email"]]);
            $user = $queryPrepared->fetch();
        ?>


        



<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>