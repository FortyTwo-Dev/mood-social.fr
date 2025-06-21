<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

function DeleteValidation() {

    $id = ValidateGet('id', FILTER_VALIDATE_INT);

    Required([$id]);

    Exist('id', 'CUSTOMS', $id, "L'image choisie n\'existe pas.");

    return [
        'id' => $id,
    ];
}