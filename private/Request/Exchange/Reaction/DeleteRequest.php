<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function DeleteValidation() {

    $id = ValidateGET('id', FILTER_VALIDATE_INT);

    Required([$id]);

    Exist('id', 'REACTIONS', $id, 'La réaction choisie n\'existe pas.');

    return [
        'id' => $id,
    ];
}