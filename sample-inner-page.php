<?php 
    session_start();
    $pageTitle = "Services";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

    <section class="sample-page">
      <div class="container">

        <p>
          You can duplicate this sample page and create any number of inner pages you like!
        </p>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/assets/templates/footer.php";
    page_load_time();
    ?>