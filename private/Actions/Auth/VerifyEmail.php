<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Email/Email.php');

function VerifyEmail() {
    $token = $_GET['token'] ?? null;
    $id = $_GET['id'] ?? null;

    if ($token === null || $id === null) {
        ToRoute('/auth/login/', 'Invalid token or email.', 'error');
    }

    $user = SelectUserWithId('email_verification_token');
    if (!$user) {
        ToRoute('/auth/login/', 'Invalid token or email.', 'error');
    }

    if (hash_equals(hash_hmac('sha256', $user->email_verification_token, APP_KEY), $token)) {
        $stmt = Connection()->prepare("UPDATE USERS SET email_verified_at = NOW(), email_verification_token = NULL, email_verification_expiration = NULL WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        ToRoute('/auth/login/', 'Ton addresse e-mail a été vérifié.', 'success');
    } else {
        ToRoute('/auth/login/', 'Invalid token or email.', 'error');
    }
}