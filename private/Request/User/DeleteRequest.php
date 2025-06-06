<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');
include_once($root . '/private/Actions/Database/Query/User.php');



function DeleteValidation()
{
    

    $user_id = GetUserId();
    Required([$user_id]);
    Exist('id', 'USERS', $user_id, "Does not exist", PDO::PARAM_INT);

    return[
        'id' => $user_id
    ];
}



