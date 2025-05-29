<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function AcceptValidation() {

    $current_user_id = GetUserId();
    $user_id = ValidatePost('user_id');

    Required([$current_user_id, $user_id]);

    return [
        'current_user_id' => $current_user_id,
        'user_id' => $user_id
    ];
}