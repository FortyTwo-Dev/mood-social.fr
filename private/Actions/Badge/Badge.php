<?php
include_once($root . '/private/Actions/Database/Database.php');
include_once($root . '/private/Actions/Routing/Route.php');

include_once($root . '/private/Actions/Database/Query/Badge.php');


function Profil() {

    return [
        'data' => GetBadge(GetUserId()),
    ];
}
