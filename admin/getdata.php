<?php
// Connexion à la base de données
$connection = connectDB();

// Récupération de l'e-mail envoyé en paramètre
$email = $_GET['email'];

// Requête pour récupérer les utilisateurs correspondant à l'e-mail
$query = "SELECT * FROM " . DB_PREFIX . "user WHERE email LIKE '%" . $email . "%'";
$results = $connection->query($query);
$results = $results->fetchAll();

// Génération du contenu HTML pour les résultats de la recherche
ob_start();
foreach ($results as $user) {
    echo "<tr>";
    echo "<td>".$user["id"]."</td>";
    echo "<td>".$user["lastname"]."</td>";
    echo "<td>".$user["firstname"]."</td>";
    echo "<td>".$user["email"]."</td>";
    echo "<td>".$user["address"]."</td>";
    echo "<td>".$user["postal_code"]."</td>";
    echo "<td>".$user["scope"]."</td>";
    echo "<td>".$user["created_at"]."</td>";
    echo "<td>".$user["updated_at"]."</td>";
    echo "<td>
        <a href='admin-modify-user.php?id=".$user["id"]."' class='btn btn-primary'>Modifier</a>
        <a href='admin-delete-user.php?id=".$user["id"]."' class='btn btn-danger'>Supprimer</a>
        <a href='admin-details-user.php?id=".$user["id"]."' class='btn btn-secondary'>Détails</a>
        </td>";
    echo "</tr>";
}
$html = ob_get_clean();

// Renvoi du contenu HTML en réponse
echo $html;
?>
