<?php

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Email/Email.php');

function VerifyEmail() {
    $conn = Connection();
    $token = $_GET['token'] ?? null;
    $id = $_GET['id'] ?? null;
    var_dump($token);
    if ($token === null || $id === null) {
        GoToRoute('/auth/login/', 'Invalid token or email 1.', 'error');
    }

    $user = SelectUserWithId('email_verification_token');
    if (!$user) {
        GoToRoute('/auth/login/', 'Invalid token or email 2.', 'error');
    }

    if (hash_equals(hash_hmac('sha256', $user->email_verification_token, APP_KEY), $token)) {
        $stmt = $conn->prepare("UPDATE users SET email_verified_at = NOW(), email_verification_token = NULL WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        GoToRoute('/auth/login', 'Your email has been verified. You can now log in.', 'success');
    } else {
        GoToRoute('/auth/login', 'Invalid token or email 3.', 'error');
    }
}