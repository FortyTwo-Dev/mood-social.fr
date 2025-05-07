<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation() {

    $color = filter_input(INPUT_POST, 'mood', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_id = GetUserId();

    if(empty($color) OR empty($user_id)) {
        ToRoute(Back(), 'Veuillez remplir tous les champs obligatoires.', 'error');
    }

    $query = "SELECT mood_id FROM USER_MOOD WHERE DATE(attached_at) = CURDATE() AND user_id = :user_id ORDER BY attached_at DESC LIMIT 1;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->fetchColumn() !== false) {
        ToRoute(Back(), 'Vous avez déjà choisi votre mood.', 'error');
    }

    return [
        'user_id' => $user_id,
        'color' => $color
    ];
}