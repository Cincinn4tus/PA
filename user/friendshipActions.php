<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/conf.inc.php";
require $_SERVER['DOCUMENT_ROOT'] . "/core/functions.php";

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'sendFriendRequest') {
        if (isset($_POST['user_id'])) {
            $currentUserId = $_SESSION['id'];
            $friendId = $_POST['user_id'];

            try {
                $connection = connectDB();
                $stmt = $connection->prepare("INSERT INTO friendship (user1_id, user2_id, status) VALUES (?, ?, 'pending')");
                $stmt->execute([$currentUserId, $friendId]);

                // Rediriger vers la page précédente avec un message de succès
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=success&message=Demande d\'ami envoyée avec succès');
                exit();
            } catch (PDOException $e) {
                // Rediriger vers la page précédente avec un message d'erreur
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=Erreur lors de l\'envoi de la demande d\'ami');
                exit();
            }
        } else {
            // Rediriger vers la page précédente avec un message d'erreur
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=L\'ID de l\'utilisateur destinataire n\'a pas été fourni');
            exit();
        }
    } elseif ($action === 'acceptFriendRequest') {
        if (isset($_POST['request_id'])) {
            $requestId = $_POST['request_id'];
            $currentUserId = $_SESSION['id'];

            try {
                $connection = connectDB();
                $stmt = $connection->prepare("UPDATE friendship SET status = 'accepted' WHERE id = ? AND user2_id = ?");
                $stmt->execute([$requestId, $currentUserId]);

                // Rediriger vers la page précédente avec un message de succès
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=success&message=Demande d\'ami acceptée avec succès');
                exit();
            } catch (PDOException $e) {
                // Rediriger vers la page précédente avec un message d'erreur
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=Erreur lors de l\'acceptation de la demande d\'ami');
                exit();
            }
        } else {
            // Rediriger vers la page précédente avec un message d'erreur
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=L\'ID de la demande d\'ami n\'a pas été fourni');
            exit();
        }
    } elseif ($action === 'declineFriendRequest') {
        if (isset($_POST['request_id'])) {
            $requestId = $_POST['request_id'];
            $currentUserId = $_SESSION['id'];

            try {
                $connection = connectDB();
                $stmt = $connection->prepare("DELETE FROM friendship WHERE id = ? AND user2_id = ?");
                $stmt->execute([$requestId, $currentUserId]);

                // Rediriger vers la page précédente avec un message de succès
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=success&message=Demande d\'ami refusée avec succès');
                exit();
            } catch (PDOException $e) {
                // Rediriger vers la page précédente avec un message d'erreur
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=Erreur lors du refus de la demande d\'ami');
                exit();
            }
        } else {
            // Rediriger vers la page précédente avec un message d'erreur
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=L\'ID de la demande d\'ami n\'a pas été fourni');
            exit();
        }
    } elseif ($action === 'removeFriend') {
        if (isset($_POST['friend_id'])) {
            $friendId = $_POST['friend_id'];
            $currentUserId = $_SESSION['id'];

            try {
                $connection = connectDB();
                $stmt = $connection->prepare("DELETE FROM friendship WHERE (user1_id = ? AND user2_id = ?) OR (user1_id = ? AND user2_id = ?)");
                $stmt->execute([$currentUserId, $friendId, $friendId, $currentUserId]);

                // Rediriger vers la page précédente avec un message de succès
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=success&message=Ami supprimé avec succès');
                exit();
            } catch (PDOException $e) {
                // Rediriger vers la page précédente avec un message d'erreur
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=Erreur lors de la suppression de l\'ami');
                exit();
            }
        } else {
            // Rediriger vers la page précédente avec un message d'erreur
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=L\'ID de l\'ami n\'a pas été fourni');
            exit();
        }
    } elseif ($action === 'blockUser') {
        if (isset($_POST['user_id'])) {
            $currentUserId = $_SESSION['id'];
            $userIdToBlock = $_POST['user_id'];

            try {
                $connection = connectDB();
                $stmt = $connection->prepare("UPDATE friendship SET blocked_status = 'blocked' WHERE (user1_id = ? AND user2_id = ?) OR (user1_id = ? AND user2_id = ?)");
                $stmt->execute([$currentUserId, $userIdToBlock, $userIdToBlock, $currentUserId]);

                // Rediriger vers la page précédente avec un message de succès
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=success&message=Utilisateur bloqué avec succès');
                exit();
            } catch (PDOException $e) {
                // Rediriger vers la page précédente avec un message d'erreur
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=Erreur lors du blocage de l\'utilisateur');
                exit();
            }
        } else {
            // Rediriger vers la page précédente avec un message d'erreur
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=L\'ID de l\'utilisateur n\'a pas été fourni');
            exit();
        }
    } elseif ($action === 'unblockUser') {
        if (isset($_POST['user_id'])) {
            $currentUserId = $_SESSION['id'];
            $userIdToUnblock = $_POST['user_id'];

            try {
                $connection = connectDB();
                $stmt = $connection->prepare("UPDATE friendship SET blocked_status = '' WHERE (user1_id = ? AND user2_id = ?) OR (user1_id = ? AND user2_id = ?)");
                $stmt->execute([$currentUserId, $userIdToUnblock, $userIdToUnblock, $currentUserId]);

                // Rediriger vers la page précédente avec un message de succès
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=success&message=Utilisateur débloqué avec succès');
                exit();
            } catch (PDOException $e) {
                // Rediriger vers la page précédente avec un message d'erreur
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=Erreur lors du déblocage de l\'utilisateur');
                exit();
            }
        } else {
            // Rediriger vers la page précédente avec un message d'erreur
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?status=error&message=L\'ID de l\'utilisateur n\'a pas été fourni');
            exit();
        }
    }
}
?>
