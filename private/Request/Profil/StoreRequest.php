<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation() {

    $email = ValidatePost('email');
    $user_id = GetUserId();

    Required([$email, $user_id]);

    return [
        'email' => $email,
        'user_id' => $user_id,
    ];
}