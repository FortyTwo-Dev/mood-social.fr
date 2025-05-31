<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function StoreValidation() {

    $receiver_user_id = ValidatePost('receiver_user_id');
    $sender_user_id = GetUserId();
    $content = ValidatePost('content');

    Required([$content, $receiver_user_id, $sender_user_id]);

    return [
        'receiver_user_id' => $receiver_user_id,
        'sender_user_id' => $sender_user_id,
        'content' => $content,
        'file_path' => NULL,
    ];
}
