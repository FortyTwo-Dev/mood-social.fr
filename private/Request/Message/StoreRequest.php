<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation() {

    $content = ValidatePost('content');
    $user_id = GetUserId();
    $talk_id = ValidatePost('talk_id');

    Required([$content, $user_id]);

    return [
        'content' => $content,
        'path' => NULL,
        'user_id' => $user_id,
        'talk_id' => $talk_id
    ];
}