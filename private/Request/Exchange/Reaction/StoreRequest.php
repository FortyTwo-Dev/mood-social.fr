<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function StoreValidation() {

    $name = ValidatePost('name');
    $emoji = ValidatePost('emoji');

    Required([$name, $emoji]);

    Unique('name', 'REACTIONS', $name);

    return [
        'name' => $name,
        'emoji' => $emoji
    ];
}
