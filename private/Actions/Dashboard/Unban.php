<?php

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function UnbanUser() {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (!$email) {
        ToRoute(Back(), "Utilisateur invalide", "error");
    }

    $stmt = Connection()->prepare("UPDATE USERS SET status = NULL, banned_until = NULL WHERE email = :email");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    ToRoute(Back(), "Utilisateur débanni avec succès", "success");
}