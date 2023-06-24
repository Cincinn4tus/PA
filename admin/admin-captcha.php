<?php 
    session_start();
    $pageTitle = "Captchas";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>


<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h2 class="text-center">Liste des images</h2>
        </div>
    </div>


    <!-- button to add a new captcha -->
    <div class="row mb-5 text-center">
        <div class="col-lg-6 mx-auto">
            <button class="btn btn-primary" onclick="addCaptcha()">Ajouter un captcha</button>
        </div>
    </div>

    <?php
        // for each image in /assets/img/captcha folder, display it (3 images per row for large screens, 2 for medium screens, 1 for small screens)
        // in each image, display a remove button that will delete the image from the folder
        $dir = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/captcha";
        $files = scandir($dir);
        $files = array_diff(scandir($dir), array('.', '..'));
        $i = 0;
        foreach($files as $file) {
            if($i == 0) {
                echo "<div class='row'>";
            }
            echo "<div class='col-lg-4 col-md-6 col-sm-12'>";
            echo "<img src='/assets/img/captcha/$file' class='img-fluid'>";
            echo "<button class='btn btn-danger mt-2' onclick='removeCaptcha(\"$file\")'>Supprimer</button>";
            echo "</div>";
            $i++;
            if($i == 3) {
                echo "</div>";
                $i = 0;
            }
        }
    ?>
</div>



<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>