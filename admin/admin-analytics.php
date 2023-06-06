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

    <!--
    <div class="progress-bar">
      <div class="progress"></div>
    </div>
-->


    <div class="container">
      <div class="row">
        <div id="day-analytics" class="col-lg-8">
          <table class="table mt-5">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Utilisateur</th>
                    <th>Adresse IP</th>
                    <th>date</th>
                    <th>heure</th>
                    <th>page visitée</th>
                </tr>
            </thead>
            <tbody class="table_odd">
                      <?php
                        $connection = connectDB();
                        $results = $connection->query("SELECT * FROM pa_logs WHERE visit_date = CURDATE() ORDER BY visit_hour DESC");
                        $results = $results->fetchAll();
                      foreach ($results as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['visit_date'] . "</td>";
                        echo "<td>" . $row['visit_hour'] . "</td>";
                        echo "<td>" . $row['ip'] . "</td>";
                        echo "<td>" . $row['page_visited'] . "</td>";
                        echo "<td>" . $row['user'] . "</td>";
                        echo "</tr>";
                      }
                      ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";?>