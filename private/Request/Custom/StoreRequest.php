<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation()
{
    $user_id = GetUserId();
    $head = ValidatePost('head');
    $beard = ValidatePost('beard');
    $hat = ValidatePost('hat');

    Required([$head, $beard, $hat, $user_id]);

    return [
        'customs' => [$head, $beard, $hat],
        'user_id' => $user_id
    ];
}
