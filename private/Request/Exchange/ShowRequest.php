<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function ShowValidation() {

    $id = ValidateGet('exchange_id');

    Required([$id]);

    Exist('id', 'USERS', $id, "L'utilisateur n'existe pas.", PDO::PARAM_STR);

    if (!CheckFriendExists(GetUserId(), $id)) { ToRoute(Back()); };
    
    return [
        'id' => $id,
    ];
}
