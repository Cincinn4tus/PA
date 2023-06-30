<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
  $pageTitle = "Connexion";
  getUserInfos();
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

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php";
?>
