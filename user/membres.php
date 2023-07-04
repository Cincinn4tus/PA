<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
$pageTitle = "Membres";
saveLogs();
getUserInfos();
include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>


    <div class="container-fluid">
        <?php
        $currentUserId = $_SESSION['id']; // L'utilisateur actuellement connecté

        try {
            $connection = connectDB();
            $stmt = $connection->prepare("SELECT * FROM ".DB_PREFIX."user");
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
