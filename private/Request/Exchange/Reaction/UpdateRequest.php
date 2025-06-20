<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');

function UpdateValidation() {

    $name = ValidatePost('name');
    $emoji = ValidatePost('emoji');
    $id = ValidateGET('id', FILTER_VALIDATE_INT);

    Required([$name, $emoji, $id]);

    UniqueExept('name', 'REACTIONS', $name, 'name', $name);

    return [
        'name' => $name,
        'emoji' => $emoji,
        'id' => $id,
    ];
}
