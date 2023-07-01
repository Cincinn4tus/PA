<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "403";
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

<div class="container mt-5 mb-5" id="error">
  <div class="row">
    <div class="col-md-12">
      <h1>403</h1>
      <p>Vous n'avez pas les droits pour accéder à cette page.</p>
    </div>
  </div>
</div>

<div class="fixed-bottom">
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
    ?>
</div>
