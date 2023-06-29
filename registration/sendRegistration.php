<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Inscription";
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>




<?php
if($_SESSION['scope'] == 1){
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/investor-register.php";
}
else if($_SESSION['scope'] == 2){
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/enterprise-register.php";
}
?>

<script src="/assets/js/verify.js"></script>


  <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
    ?>
