<?php
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";
  $pageTitle = "Connexion";
  saveLogs();
  getUserInfos();
  include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php";
?>

<div class="container-fluid">
    <h2>Mes messages</h2>

    <?php
    $connection = connectDB();
    $id = $_SESSION['id'];

    try {
        // Vérifier s'il y a de nouveaux messages non lus pour l'utilisateur connecté
        $newMessageStmt = $connection->prepare("SELECT COUNT(*) FROM ".DB_PREFIX."messages WHERE recipient_id = :id AND is_read = 0");
        $newMessageStmt->bindParam(':id', $id);
        $newMessageStmt->execute();
        $newMessageCount = $newMessageStmt->fetchColumn();

        // Afficher la notification ou le compteur de nouveaux messages
        if ($newMessageCount > 0) {
            echo "<div class='notification'>Vous avez $newMessageCount nouveau(x) message(s) non lu(s).</div>";
        }

        // Récupérer les messages de l'utilisateur connecté
        $stmt = $connection->prepare("SELECT messages.*, sender.firstname AS sender_firstname, sender.lastname AS sender_lastname, recipient.firstname AS recipient_firstname, recipient.lastname AS recipient_lastname FROM ".DB_PREFIX."messages
                                    INNER JOIN ".DB_PREFIX."user AS sender ON sender.id = messages.sender_id
                                    INNER JOIN ".DB_PREFIX."user AS recipient ON recipient.id = messages.recipient_id
                                    WHERE (messages.sender_id = :id OR messages.recipient_id = :id)
                                    ORDER BY messages.sent_at DESC");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $messages = $stmt->fetchAll();

        if (empty($messages)) {
            echo "Aucun message trouvé.";
        } else {
            foreach ($messages as $message) {
                $senderId = $message['sender_id'];
                $recipientId = $message['recipient_id'];
                $content = $message['content'];
                $sentAt = $message['sent_at'];
                $senderFirstname = $message['sender_firstname'];
                $senderLastname = $message['sender_lastname'];
                $recipientFirstname = $message['recipient_firstname'];
                $recipientLastname = $message['recipient_lastname'];
                $isRead = $message['is_read'];

                // Marquer le message comme lu s'il a été envoyé à l'utilisateur connecté
                if ($recipientId == $id && !$isRead) {
                    $markAsReadStmt = $connection->prepare("UPDATE ".DB_PREFIX."messages SET is_read = 1 WHERE id = :message_id");
                    $markAsReadStmt->bindParam(':message_id', $message['id']);
                    $markAsReadStmt->execute();
                }

                echo "<div class='message'>";
                echo "<p>De: " . htmlspecialchars($senderFirstname) . " " . htmlspecialchars($senderLastname) . "</p>";
                echo "<p>Pour: " . htmlspecialchars($recipientFirstname) . " " . htmlspecialchars($recipientLastname) . "</p>";
                echo "<p>Message: " . htmlspecialchars($content) . "</p>";
                echo "<p>Date d'envoi: " . htmlspecialchars($sentAt) . "</p>";
                echo "</div>";
            }
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des messages: " . $e->getMessage();
    }
    ?>

    <!-- Formulaire pour envoyer un message -->
    <form action="sendMessage.php" method="post">
        <h2>Envoyer un message</h2>
        <div>
            <label for="recipient_id">Destinataire :</label>
            <select name="recipient_id" id="recipient_id">
                <?php
                $usersStmt = $connection->prepare("SELECT id, firstname, lastname FROM ".DB_PREFIX."user WHERE id != :id");
                $usersStmt->bindParam(':id', $id);
                $usersStmt->execute();
                $users = $usersStmt->fetchAll();

                foreach ($users as $user) {
                    echo "<option value='" . $user['id'] . "'>" . $user['firstname'] . " " . $user['lastname'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="message">Message :</label>
            <textarea name="message" id="message" placeholder="Votre message"></textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>
</div>

</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php"; ?>