<?php
    session_start();
    require "../conf.inc.php";
    require "../core/functions.php";
    $pageTitle = "Membres";
    saveLogs();
    getUserInfos();
    include "../assets/templates/header.php";
?>

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
