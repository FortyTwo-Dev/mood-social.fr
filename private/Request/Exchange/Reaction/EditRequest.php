<?php
include_once($root . '/private/Request/Requester.php');

include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function EditValidation(string $id) {

    Required([$id]);

    Exist('id', 'REACTIONS', $id);

    return [
        'id' => $id,
    ];
}
