<?php
session_start();
require "../conf.inc.php";
require "../core/functions.php";
$pageTitle = "Demandes d'amis";
saveLogs();
getUserInfos();
include "../assets/templates/header.php";
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('../assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Demandes d'amis</h2>
            <ol>
                <li><a href="/admin/admin-dashboard.php">Administration</a></li>
                <li>Profil</li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container-fluid">
        <?php
        $currentUserId = $_SESSION['id'];

        try {
            $connection = connectDB();
            $stmt = $connection->prepare("SELECT * FROM ".DB_PREFIX."friendship WHERE user2_id = ? AND status = 'pending'");
            $stmt->execute([$currentUserId]);

            while ($request = $stmt->fetch()) {
                $userStmt = $connection->prepare("SELECT firstname, lastname FROM ".DB_PREFIX."user WHERE id = ?");
                $userStmt->execute([$request['user1_id']]);
                $user = $userStmt->fetch();

                echo "<div id='request-" . $request['id'] . "'>";
                echo "Vous avez une demande d'ami de " . htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']);
                echo "<form action='friendshipActions.php' method='post'>";
                echo "<input type='hidden' name='action' value='acceptFriendRequest'>";
                echo "<input type='hidden' name='request_id' value='" . $request['id'] . "'>";
                echo "<button type='submit'>Accepter</button>";
                echo "</form>";
                echo "<form action='friendshipActions.php' method='post'>";
                echo "<input type='hidden' name='action' value='declineFriendRequest'>";
                echo "<input type='hidden' name='request_id' value='" . $request['id'] . "'>";
                echo "<button type='submit'>Refuser</button>";
                echo "</form>";
                echo "</div>";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des demandes d'ami: " . $e->getMessage();
        }
        ?>
    </div>

    <?php include "../assets/templates/footer.php"; ?>
