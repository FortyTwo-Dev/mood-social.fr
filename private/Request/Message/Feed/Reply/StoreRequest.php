<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation()
{
    $content = ValidatePost('content');
    $user_id = GetUserId();
    $message_id = ValidatePost('message_id');

    Required([$content, $user_id, $message_id]);

    return [
        'content' => $content,
        'user_id' => $user_id,
        'message_id' => $message_id
    ];
}
