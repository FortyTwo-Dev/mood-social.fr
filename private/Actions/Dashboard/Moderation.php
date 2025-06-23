<?php

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Request/Requester.php');


function UnbanUser() {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (!$email) {
        ToRoute(Back(), "Utilisateur invalide", "error");
    }

    $stmt = Connection()->prepare("UPDATE USERS SET status = NULL, banned_until = NULL, ban_duration = NULL, ban_reason = NULL WHERE email = :email");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    ToRoute(Back(), "Utilisateur débanni avec succès", "success");
}

include_once($root . '/private/Request/Requester.php');

function BanUser() {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $banDuration = filter_input(INPUT_POST, 'ban_duration', FILTER_VALIDATE_INT);
    $banReason = filter_input(INPUT_POST, 'ban_reason', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$email || !$banDuration || !$banReason) {
        var_dump($_POST); die('email, durée ou raison manquante');
        ToRoute(Back(), "Utilisateur invalide", "error");
    }

    $banDurationSeconds = $banDuration * 3600;
    $bannedUntil = time() + $banDurationSeconds;

    $stmt = Connection()->prepare("UPDATE USERS SET status = 'banned', banned_until = :banned_until, ban_duration = :ban_duration, ban_reason = :ban_reason WHERE email = :email");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':banned_until', $bannedUntil, PDO::PARAM_INT);
    $stmt->bindValue(':ban_duration', $banDurationSeconds, PDO::PARAM_INT);
    $stmt->bindValue(':ban_reason', $banReason, PDO::PARAM_STR);
    $stmt->execute();

    if (isset($_SESSION['email']) && $_SESSION['email'] === $email) {
        Banned($_SESSION['email'], "Votre compte a été banni.");
    }

    ToRoute(Back(), "Utilisateur banni avec succès", "success");
} 

function UnbanVerification($user) {
    if (
        isset($user->status, $user->banned_until) &&
        $user->status === 'banned' &&
        $user->banned_until < time()
    ) {
        $stmt = Connection()->prepare("UPDATE USERS SET status = NULL, banned_until = NULL, ban_duration = NULL, ban_reason = NULL WHERE email = :email");
        $stmt->bindValue(':email', $user->email, PDO::PARAM_STR);
        $stmt->execute();
    
        $user->status = null;
        $user->banned_until = null;
        $user->ban_duration = null;
        $user->ban_reason = null;
    }
}

function DeleteUser($email) {
    $stmt = Connection()->prepare("DELETE FROM USERS WHERE email = :email");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
}


