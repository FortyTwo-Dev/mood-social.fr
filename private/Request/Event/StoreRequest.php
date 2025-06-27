<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function StoreValidation() {

    $title = ValidatePost('title');
    $description = ValidatePost('description');

    Required([$description, $title]);

    Unique('title', 'EVENTS', $title);

    return [
        'title' => $title,
        'description' => $description,
    ];
}