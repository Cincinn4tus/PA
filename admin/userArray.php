<div class="container-fluid">
    <?php
        $connection = connectDB();
        $results = $connection->query("SELECT * FROM ".DB_PREFIX."user");
        $results = $results->fetchAll();
    ?>

    <table id="user-array" class="table col-lg-12">
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Rôle</th>
                <th>Date de création</th>
                <th>Date de modification</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody id="results">
            <?php
                foreach ($results as $user) {
                    if($user["scope"] == 1){
                        $user["scope"] = "Investisseur";
                    } else if($user["scope"] == 2){
                        $user["scope"] = "Entreprise";
                    } else if($user["scope"] == 0){
                        $user["scope"] = "Administrateur";
                    } else {
                        $user["scope"] = "Inconnu";
                    }
                    if ($user["email"] != $_SESSION["email"]){
                        echo "<tr>";
                            echo "<td>".$user["id"]."</td>";
                            echo "<td>".$user["lastname"]."</td>";
                            echo "<td>".$user["firstname"]."</td>";
                            echo "<td>".$user["email"]."</td>";
                            echo "<td>".$user["postal_address"]."</td>";
                            echo "<td>".$user["postal_code"]."</td>";
                            echo "<td>".$user["scope"]."</td>";
                            echo "<td>".$user["created_at"]."</td>";
                            echo "<td>".$user["updated_at"]."</td>";
                            echo "<td>
                                <a href='admin-modify-user.php?id=".$user["id"]."' class='btn btn-primary'>Modifier</a>
                                <a href='admin-delete-user.php?id=".$user["id"]."' class='btn btn-danger'>Supprimer</a>
                                <a href='admin-details-user.php?id=".$user["id"]."' class='btn btn-secondary'>Détails</a></td>";
                        echo "</tr>";
                        }
                }
            ?>
        </tbody>
    </table>
</div>



