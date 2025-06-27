<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function ShowValidation() {

    $id = ValidateGet('id');

    Required([$id]);

    Exist('id', 'EVENTS', $id);

    return [
        'id' => $id,
        'users' => GetAllUserInEvent($id)
    ];
}