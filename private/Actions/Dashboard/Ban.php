<?php

include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Database.php');

function BanUser() {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $banDuration = filter_input(INPUT_POST, 'ban_duration', FILTER_VALIDATE_INT);

    if (!$email || !$banDuration) {
        var_dump($_POST); die('email ou durée manquante');
        ToRoute(Back(), "Utilisateur invalide", "error");
    }

    $bannedUntil = time() + ($banDuration * 3600);

    $stmt = Connection()->prepare("UPDATE USERS SET status = 'banned', banned_until = :banned_until WHERE email = :email");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':banned_until', $bannedUntil, PDO::PARAM_INT);
    $stmt->execute();

    if (isset($_SESSION['email']) && $_SESSION['email'] === $email) {
        Banned($_SESSION['email'], "Votre compte a été banni.");
    }

    ToRoute(Back(), "Utilisateur banni avec succès", "success");
}