<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function ShowValidation() {

    $username = ValidateGet('username');

    Required([$username]);

    Exist('username', 'USERS', $username, "L'utilisateur n'existe pas.", PDO::PARAM_STR);

    $query = "SELECT id FROM USERS WHERE username = :username;";
    $stmt = Connection()->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return [
        'user_id' => $user['id'],
    ];
}
