<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation() {

    $content = ValidatePost('content');
    $user_id = GetUserId();

    Required([$content, $user_id]);

    return [
        'content' => $content,
        'path' => NULL,
        'user_id' => $user_id
    ];
}