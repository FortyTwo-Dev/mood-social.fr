<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Actions/Database/Query/User.php');
include_once($root . '/private/Actions/Database/Query/Mood.php');

function ShowValidation() {

    $id = ValidateGet('id', FILTER_SANITIZE_NUMBER_INT);

    Required([$id]);

    Exist('id', 'USERS', $id, "L'utilisateur n'existe pas.", PDO::PARAM_STR);

    return [
        'user_id' => $id
    ];
}
