<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Connexion";
  saveLogs();
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Membres</h2>
            <ol>
                <li><a href="/">Accueil</a></li>
                <li>Membres</li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container-fluid">
        <?php
        $currentUserId = $_SESSION['id'];  // l'utilisateur actuellement connecté

        try {
            $connection = connectDB();
            $stmt = $connection->prepare("SELECT * FROM pa_user WHERE id != ? AND id NOT IN (SELECT user1_id FROM friendship WHERE user2_id = ? AND blocked_status = 'blocked')");
            $stmt->execute([$currentUserId, $currentUserId]);

            $members = $stmt->fetchAll();

            if (empty($members)) {
                echo "Aucun membre trouvé.";
            } else {
                echo "<table id='members-array' class='table col-lg-12'>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Profil</th>
                        </tr>
                    </thead>
                    <tbody id='results'>";

                foreach ($members as $member) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($member["lastname"]) . "</td>";
                    echo "<td>" . htmlspecialchars($member["firstname"]) . "</td>";
                    echo "<td><a href='voirprofile.php?id=" . $member["id"] . "'>Voir profil</a></td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de la liste des membres: " . $e->getMessage();
        }
        ?>
    </div>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>
