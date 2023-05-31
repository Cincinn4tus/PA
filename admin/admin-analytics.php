<?php
    session_start();
    $pageTitle = "Analytics";
    require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
    saveLogs();
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
    ?>


    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Analytics</h2>
        <ol>
          <li><a href="/admin/admin-dashboard.php">Administration</a></li>
          <li>Analytics</li>
        </ol>
      </div>
    </div><!-- End Breadcrumbs -->

<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>