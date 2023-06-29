<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Connexion";
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Membre</h2>
            <ol>
                <li><a href="/">Accueil</a></li>
                <li>Membre</li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

<div class="container-fluid">
    <?php
        $connection = connectDB();
        $results = $connection->query("SELECT * FROM ".DB_PREFIX."user");
        $results = $results->fetchAll();

    ?>

    <table id="user-array" class="table col-lg-12">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>
        </thead>

        <tbody id="results">
            <?php
                foreach ($results as $user) {
                    echo "<tr>";
                        echo "<td>".$user["lastname"]."</td>";
                        echo "<td>".$user["firstname"]."</td>";
                        echo "<td>
                            <a href='voirprofile.php?id=".$user["id"]."' class='btn btn-secondary'>Voir Profil</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
