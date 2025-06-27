<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function AttendValidation() {

    $id = ValidatePost('id');
    $user_id = GetUserId();

    Required([$id, $user_id]);

    Exist('id', 'EVENTS', $id, 'Vous faites déjà partie de cet évènement.');

    return [
        'user_id' => $user_id,
        'event_id' => $id,
        'talk_id' => GetEvent('talk_id', $id)['talk_id']
    ];
}