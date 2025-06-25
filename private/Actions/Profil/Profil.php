<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Request/Profil/ShowRequest.php');

include_once($root . '/private/Actions/Badge/Badge.php');

function Show() {
    $request = ShowValidation();
    return [
        GetUserProfile($request['user_id']),
        GetBadge($request['user_id']) 
    ];
}
