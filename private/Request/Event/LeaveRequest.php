<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function LeaveValidation() {

    $id = ValidatePost('id');

    Required([$id]);

    Exist('id', 'EVENTS', $id);

    return [
        'event_id' => $id,
        'talk_id' => GetEvent('talk_id', $id)['talk_id']
    ];
}