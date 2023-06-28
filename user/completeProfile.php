<?php
    session_start();
    $pageTitle = "Profil";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    ?>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 33%;" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="alert alert-danger text-center" id="errors" style="display: none;"></div>
            </div>
        </div>
    </div>

    <?php
            if(isset($_GET["email"])){
                $_SESSION["email"] = $_GET["email"];

                $pdo = connectDB();
                $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
                $queryPrepared->execute(["email"=>$_SESSION["email"]]);
                $user = $queryPrepared->fetch();
                include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/complete-profile-investor.php";

            } else if(isset($_GET["siren"])){

                $_SESSION["siren"] = $_GET["siren"];
                $pdo = connectDB();
                $queryPrepared = $pdo->prepare("SELECT * FROM ".DB_PREFIX."company WHERE siren=:siren");
                $queryPrepared->execute(["siren"=>$_SESSION["siren"]]);
                $user = $queryPrepared->fetch();
                include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/complete-profile-company.php";

            } else {
                header("Location: /user/login.php");
            }
            
        ?>



<script src="/assets/js/verify.js"></script>



<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>