<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
$pageTitle = "Amis";
saveLogs();
getUserInfos();
include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('../assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Amis</h2>
            <ol>
                <li><a href="/admin/admin-dashboard.php">Administration</a></li>
                <li>Profil</li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container-fluid">
        <h2>Amis</h2>
        <?php
        $currentUserId = $_SESSION['id'];  // l'utilisateur actuellement connecté

        try {
            $connection = connectDB();
            $stmt = $connection->prepare("SELECT * FROM friendship WHERE (user1_id = ? OR user2_id = ?) AND status = 'accepted' AND blocked_status != 'blocked'");
            $stmt->execute([$currentUserId, $currentUserId]);

            while ($friendship = $stmt->fetch()) {
                $friendId = ($friendship['user1_id'] == $currentUserId) ? $friendship['user2_id'] : $friendship['user1_id'];
                $friendStmt = $connection->prepare("SELECT firstname, lastname FROM pa_user WHERE id = ?");
                $friendStmt->execute([$friendId]);
                $friend = $friendStmt->fetch();

                echo "<div id='friend-" . $friendId . "'>";
                echo "Ami: " . htmlspecialchars($friend['firstname']) . " " . htmlspecialchars($friend['lastname']);
                echo "<form action='friendshipActions.php' method='post'>";
                echo "<input type='hidden' name='action' value='removeFriend'>";
                echo "<input type='hidden' name='friend_id' value='" . $friendId . "'>";
                echo "<button type='submit'>Supprimer l'ami</button>";
                echo "</form>";
                echo "<a href='voirprofile.php?id=" . $friendId . "'>Voir profil</a>";
                echo "</div>";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de la liste d'amis: " . $e->getMessage();
        }
        ?>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>
