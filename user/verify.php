<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Vérification";
  saveLogs();
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

<?php
    if(isset($_GET['scope'])) {
        $_SESSION['scope'] = $_GET['scope'];
    } else {
        header ('Location : ../user/getregistration.php');
    }
    ?>

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Vérification</h2>
                <p>Nous devons vérifier que vous n'êtes pas un robot</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center mt-3">
                <div class="preview"></div>
            </div>
            <div class="col-md-6 text-center">
                <div class="containers"></div>
            </div>
        </div>
    </div>

<script src="../assets/js/captcha.js"></script>

  <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
    ?>