<?php
function UpdatePassword($userId, $currentPassword, $newPassword)
{
    try {
        $conn = Connection();

        $query = "SELECT password FROM USERS WHERE id = :id;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return [
                'success' => false,
                'error' => 'USER_NOT_FOUND',
                'message' => 'Utilisateur non trouvé'
            ];
        }

        if (!password_verify($currentPassword, $user['password'])) {
            return [
                'success' => false,
                'error' => 'INVALID_CURRENT_PASSWORD',
                'message' => 'Mot de passe actuel incorrect'
            ];
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $updateQuery = "UPDATE USERS SET password = :password WHERE id = :id;";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $updateStmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $updateStmt->execute();

        if ($updateStmt->rowCount() > 0) {
            return [
                'success' => true,
                'message' => 'Mot de passe mis à jour avec succès'
            ];
        } else {
            return [
                'success' => false,
                'error' => 'UPDATE_FAILED',
                'message' => 'Erreur lors de la mise à jour'
            ];
        }
    } catch (Exception $e) {
        return [
            'success' => false,
            'error' => 'DATABASE_ERROR',
            'message' => 'Erreur de base de données: ' . $e->getMessage()
        ];
    }
}

function ValidatePasswordData($data)
{
    $errors = [];

    if (empty($data['current-password'])) {
        $errors[] = 'Le mot de passe actuel est requis';
    }

    if (empty($data['new-password'])) {
        $errors[] = 'Le nouveau mot de passe est requis';
    }

    if (empty($data['confirm-password'])) {
        $errors[] = 'La confirmation du mot de passe est requise';
    }

    if (!empty($data['new-password']) && !empty($data['confirm-password'])) {
        if ($data['new-password'] !== $data['confirm-password']) {
            $errors[] = 'Les nouveaux mots de passe ne correspondent pas';
        }
    }

    if (!empty($data['new-password'])) {
        if (strlen($data['new-password']) < 8) {
            $errors[] = 'Le mot de passe doit contenir au moins 8 caractères';
        }
    }

    return [
        'valid' => empty($errors),
        'errors' => $errors
    ];
}

function CheckAuthSession()
{
    if (!isset($_SESSION['auth']) || !isset($_SESSION['id'])) {
        return [
            'authenticated' => false,
            'redirect' => '/login/'
        ];
    }

    return [
        'authenticated' => true,
        'user_id' => $_SESSION['id']
    ];
}
