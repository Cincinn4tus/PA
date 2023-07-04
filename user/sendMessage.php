<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = connectDB();
    $senderId = $_SESSION['id'];
    $receiverId = $_POST['recipient_id'];
    $message = $_POST['message'];
    $isRead = 0;

    try {
        $stmt = $connection->prepare("INSERT INTO ".DB_PREFIX."messages (sender_id, recipient_id, content, sent_at, is_read) VALUES (?, ?, ?, NOW(), ?)");
        $stmt->execute([$senderId, $receiverId, $message, $isRead]);

        // Redirection vers la messagerie avec un message de succès
        header('Location: messagerie.php?status=success&message=Message envoyé avec succès');
        exit();
    } catch (PDOException $e) {
        // Redirection vers la messagerie avec un message d'erreur
        header('Location: messagerie.php?status=error&message=Erreur lors de l\'envoi du message');
        exit();
    }
} else {
    // Redirection vers la messagerie avec un message d'erreur
    header('Location: messagerie.php?status=error&message=Méthode non autorisée');
    exit();
}
?>