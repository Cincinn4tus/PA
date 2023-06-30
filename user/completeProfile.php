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
        if(!isset($_GET['email'] ) || count($_GET) !=1){
            header("Location: /index.php");
            exit();
        }


        $email = $_GET['email'];

        $connect = connectDB();
        $queryPrepared = $connect->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
        $queryPrepared->execute(["email" => $email]);
        $results = $queryPrepared->fetch();
        


        if($results['scope'] == 1 || $results['scope'] == 2){
            include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/complete-profile-investor.php";
        } else {
            header("Location: /index.php");
            exit();
        }
        ?>
<script src="/assets/js/verify.js"></script>


<div class="fixed-bottom">
<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
?>
</div>